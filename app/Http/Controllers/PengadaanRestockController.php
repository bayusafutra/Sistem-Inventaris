<?php

namespace App\Http\Controllers;

use App\Models\PengadaanRestock;
use App\Http\Requests\StorePengadaanRestockRequest;
use App\Http\Requests\UpdatePengadaanRestockRequest;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Toko;;
use App\Models\DetailPengadaanRestock;
use Illuminate\Support\Facades\DB;

class PengadaanRestockController extends Controller
{
    public function managerPengadaan($slug)
    {
        $user = Auth::user();
        if (!$user->toko_id) {
            return $this->redirectBasedOnRole();
        }
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return $this->redirectBasedOnRole();
        }
        $date = now()->format('dmY');
        $tokoId = $toko->id;
        $lastPengadaan = PengadaanRestock::where('toko_id', $tokoId)
            ->whereDate('created_at', now()->today())
            ->orderBy('id', 'desc')
            ->first();
        $increment = $lastPengadaan ? (int)substr($lastPengadaan->noseries, -1) + 1 : 1;
        $noseries = "PGDRST{$date}{$tokoId}-{$increment}";

        $produk = Produk::where('toko_id', $toko->id)->where('isactive', 1)->get();
        $pengadaanrestock = PengadaanRestock::where('toko_id', $toko->id)->get();
        return view('toko.inflow.pengadaan-restock', [
            'toko' => $toko,
            'noseries' => $noseries,
            'produk' => $produk,
            'pengadaanrestock' => $pengadaanrestock,
        ]);
    }

    public function storePengadaan(Request $request, $slug)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return redirect()->route('manager.pengadaan-restock', $toko->slug)->with('message', 'Slug tidak sesuai.');
        }
        $request->validate([
            'noseries' => 'required|string|max:255',
            'tgl_pengadaan' => 'required|date',
            'catatan' => 'nullable',
            'produk_id.*' => 'required|exists:produks,id', // Pastikan produk ada
            'quantity.*' => 'required|integer|min:1', // Minimal 1 unit
        ]);
        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Simpan data pengadaan utama
            $pengadaan = PengadaanRestock::create([
                'noseries' => $request->noseries,
                'status' => 1, // Default aktif
                'toko_id' => $toko->id,
                'user_id' => $request->user_id,
                'tgl_pengadaan' => $request->tgl_pengadaan,
                'catatan' => $request->catatan,
            ]);

            // Ambil data list produk dari form
            $produkIds = $request->input('produk_id', []);
            $quantities = $request->input('quantity', []);

            // Validasi jumlah array
            if (count($produkIds) !== count($quantities)) {
                throw new \Exception('Data produk dan jumlah tidak sesuai.');
            }

            // Akumulasikan quantity untuk produk_id yang duplikat
            $details = [];
            $uniqueProducts = [];
            foreach ($produkIds as $index => $produkId) {
                if (!empty($produkId) && !empty($quantities[$index])) {
                    if (isset($uniqueProducts[$produkId])) {
                        // Jika produk sudah ada, tambah quantity
                        $uniqueProducts[$produkId] += $quantities[$index];
                    } else {
                        // Jika produk baru, inisialisasi quantity
                        $uniqueProducts[$produkId] = $quantities[$index];
                    }
                }
            }

            // Buat array detail dari produk unik
            foreach ($uniqueProducts as $produkId => $totalUnit) {
                $details[] = [
                    'pengadaan_id' => $pengadaan->id,
                    'produk_id' => $produkId,
                    'total_unit' => $totalUnit,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            if (!empty($details)) {
                DetailPengadaanRestock::insert($details);
            }

            // Update total_produk dan total_unit_produk
            $pengadaan->update([
                'total_produk' => count($uniqueProducts), // Jumlah unik produk
                'total_unit_produk' => array_sum($quantities), // Total semua quantity
            ]);

            // Commit transaksi
            DB::commit();

            return redirect()->route('manager.pengadaan-restock', $toko->slug)->with([
                'message' => 'Produk berhasil ditambahkan.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('manager.pengadaan-restock', $toko->slug)->withErrors([
                'general' => 'Terjadi kesalahan saat menambahkan Produk: ' . $e->getMessage(),
            ])->with('showAlert', true);
        }
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

    public function nonaktif($id)
    {
        $pengadaan = PengadaanRestock::findOrFail($id);
        $pengadaan->update([
            'status' => 2,
        ]);

        return redirect()->back()->with([
            'message' => 'Status pengadaan restock telah di-NonAktifkan.',
            'showAlert' => true,
        ]);
    }

    public function aktif($id)
    {
        $pengadaan = PengadaanRestock::findOrFail($id);
        $pengadaan->update([
            'status' => 1,
        ]);

        return redirect()->back()->with([
            'message' => 'Status pengadaan restock telah diAktifkan.',
            'showAlert' => true,
        ]);
    }
}
