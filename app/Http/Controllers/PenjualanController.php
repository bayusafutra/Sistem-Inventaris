<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Toko;;

use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function managerPenjualan($slug)
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
        $lastPenjualan = Penjualan::where('toko_id', $tokoId)
            ->orderBy('id', 'desc')
            ->first();
        $increment = $lastPenjualan ? $lastPenjualan->id + 1 : 1;
        $noseries = "PNJ{$date}{$tokoId}-{$increment}";

        $produk = Produk::where('toko_id', $toko->id)->where('isactive', 1)->get();
        $penjualan = Penjualan::where('toko_id', $toko->id)->get();
        return view('toko.outflow.penjualan', [
            'toko' => $toko,
            'noseries' => $noseries,
            'produk' => $produk,
            'penjualan' => $penjualan,
        ]);
    }

    public function storePenjualan(Request $request, $slug)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return redirect()->route('manager.penjualan', $toko->slug)->with('message', 'Slug tidak sesuai.');
        }
        $request->validate([
            'noseries' => 'required|string|max:255',
            'tgl_penjualan' => 'required|date',
            'produk_id.*' => 'required|exists:produks,id',
            'quantity.*' => 'required|integer|min:1',
        ]);
        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Simpan data penjualan utama
            $penjualan = Penjualan::create([
                'noseries' => $request->noseries,
                'status' => 1,
                'toko_id' => $toko->id,
                'user_id' => $request->user_id,
                'tgl_penjualan' => $request->tgl_penjualan,
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
                        $uniqueProducts[$produkId] += $quantities[$index];
                    } else {
                        $uniqueProducts[$produkId] = $quantities[$index];
                    }
                }
            }

            // Buat array detail dari produk unik
            foreach ($uniqueProducts as $produkId => $totalUnit) {
                $details[] = [
                    'penjualan_id' => $penjualan->id,
                    'produk_id' => $produkId,
                    'total_unit' => $totalUnit,
                ];
            }

            if (!empty($details)) {
                DetailPenjualan::insert($details);
            }

            // Update total_produk dan total_unit_produk
            $penjualan->update([
                'total_produk' => count($uniqueProducts),
                'total_unit_produk' => array_sum($quantities),
            ]);

            // Logika pengurangan stok produk
            foreach ($uniqueProducts as $produkId => $totalUnit) {
                $produk = Produk::find($produkId);
                if ($produk) {
                    $newStok = $produk->stok - $totalUnit;
                    if ($newStok < 0) {
                        DB::rollBack();
                        return redirect()->route('manager.penjualan', $toko->slug)->withErrors([
                            'general' => "Stok produk '{$produk->nama}' tidak mencukupi untuk jumlah {$totalUnit}. Stok tersedia: {$produk->stok}.",
                        ])->with('showAlert', true);
                    }
                    $produk->update(['stok' => $newStok]);
                }
            }

            // Commit transaksi
            DB::commit();

            return redirect()->route('manager.penjualan', $toko->slug)->with([
                'message' => 'Penjualan berhasil ditambahkan.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('manager.penjualan', $toko->slug)->withErrors([
                'general' => 'Terjadi kesalahan saat menambahkan Penjualan: ' . $e->getMessage(),
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
}
