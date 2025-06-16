<?php

namespace App\Http\Controllers;

use App\Models\SatuanProduk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SatuanProdukController extends Controller
{
    public function masterSatuan($slug)
    {
        $user = Auth::user();
        if (!$user->toko_id) {
            return $this->redirectBasedOnRole();
        }
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return $this->redirectBasedOnRole();
        }
        $satuanproduk = SatuanProduk::where('toko_id', $user->toko_id)->get();
        return view('toko.manager.satuan-produk', [
            'toko' => $toko,
            'satuanproduk' => $satuanproduk,
        ]);
    }

    private function redirectBasedOnRole()
    {
        $role = auth()->user()->roleuser;
        return match ($role) {
            1 => redirect()->route('admin.dashboard'),
            2 => redirect()->route('home'),
            3 => redirect()->route('manager.dashboard'),
            4 => redirect()->route('stgudang.dashboard'),
            5 => redirect()->route('stpenjualan.dashboard'),
            default => redirect()->route('home')->with('error', 'Role tidak dikenali.'),
        };
    }

    public function storeSatuan(Request $request, $slug)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return redirect()->route('manager.master-satuan-produk', $toko->slug)->with('message', 'Slug tidak sesuai.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            SatuanProduk::create([
                'toko_id' => $toko->id,
                'name' => $request->name,
            ]);
            return redirect()->route('manager.master-satuan-produk', $toko->slug)->with([
                'message' => 'Satuan produk berhasil ditambahkan.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('manager.master-satuan-produk', $toko->slug)->withErrors([
                'general' => 'Terjadi kesalahan saat menambahkan satuan produk.',
            ])->with('showAlert', true);
        }
    }

    public function editSatuan(Request $request)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            $satuan = SatuanProduk::where('id', $request->idsatuan)->first();
            $satuan->name = $request->name;
            $satuan->save();
            return redirect()->route('manager.master-satuan-produk', $toko->slug)->with([
                'message' => 'Satuan produk berhasil ditambahkan.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('manager.master-satuan-produk', $toko->slug)->withErrors([
                'general' => 'Terjadi kesalahan saat mengubah satuan produk.',
            ])->with('showAlert', true);
        }
    }

    public function nonaktif($id)
    {
        $satuan = SatuanProduk::findOrFail($id);
        $satuan->update([
            'isactive' => false,
        ]);

        return redirect()->back()->with([
            'message' => 'Status Satuan Produk telah di-NonAktifkan.',
            'showAlert' => true,
        ]);
    }

    public function aktif($id)
    {
        $satuan = SatuanProduk::findOrFail($id);
        $satuan->update([
            'isactive' => true,
        ]);

        return redirect()->back()->with([
            'message' => 'Status Satuan Produk telah diAktifkan.',
            'showAlert' => true,
        ]);
    }
}
