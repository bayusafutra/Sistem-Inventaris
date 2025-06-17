<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\SatuanProduk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function masterProduk($slug)
    {
        $user = Auth::user();
        if (!$user->toko_id) {
            return $this->redirectBasedOnRole();
        }
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return $this->redirectBasedOnRole();
        }
        $produk = Produk::where('toko_id', $user->toko_id)->get();
        $satuan = SatuanProduk::where('toko_id', $user->toko_id)->orderBy('name', 'asc')->get();
        return view('toko.manager.produk', [
            'toko' => $toko,
            'produk' => $produk,
            'satuan' => $satuan,
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

    public function storeProduk(Request $request, $slug)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return redirect()->route('manager.master-produk', $toko->slug)->with('message', 'Slug tidak sesuai.');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'stok' => 'required'
        ]);
        try {
            Produk::create([
                'toko_id' => $toko->id,
                'satuan_id' => $request->satuan,
                'name' => $request->name,
                'stok' => $request->stok,
            ]);
            return redirect()->route('manager.master-produk', $toko->slug)->with([
                'message' => 'Produk berhasil ditambahkan.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('manager.master-satuan-produk', $toko->slug)->withErrors([
                'general' => 'Terjadi kesalahan saat menambahkan Produk.',
            ])->with('showAlert', true);
        }
    }

    public function editProduk(Request $request)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        try {
            $produk = Produk::where('id', $request->idproduk)->first();
            $produk->name = $request->name;
            $produk->satuan_id = $request->satuan;
            $produk->save();
            return redirect()->route('manager.master-produk', $toko->slug)->with([
                'message' => 'Produk berhasil diubah.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('manager.master-produk', $toko->slug)->withErrors([
                'general' => 'Terjadi kesalahan saat mengubah produk.',
            ])->with('showAlert', true);
        }
    }

    public function nonaktif($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update([
            'isactive' => false,
        ]);

        return redirect()->back()->with([
            'message' => 'Status Produk telah di-NonAktifkan.',
            'showAlert' => true,
        ]);
    }

    public function aktif($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update([
            'isactive' => true,
        ]);

        return redirect()->back()->with([
            'message' => 'Status Produk telah diAktifkan.',
            'showAlert' => true,
        ]);
    }
}
