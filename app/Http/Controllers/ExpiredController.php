<?php

namespace App\Http\Controllers;

use App\Models\Expired;
use App\Http\Requests\StoreExpiredRequest;
use App\Http\Requests\UpdateExpiredRequest;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Toko;;
use App\Models\DetailExpired;
use Illuminate\Support\Facades\DB;

class ExpiredController extends Controller
{
    public function indexExpired($slug)
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
        $lastExpired = Expired::where('toko_id', $tokoId)
            ->orderBy('id', 'desc')
            ->first();
        $increment = $lastExpired ? $lastExpired->id + 1 : 1;
        $noseries = "EXP{$date}{$tokoId}-{$increment}";
        $produk = Produk::where('toko_id', $toko->id)->where('isactive', 1)->get();
        $expired = Expired::where('toko_id', $toko->id)->get();
        return view('toko.outflow.expired', [
            'toko' => $toko,
            'noseries' => $noseries,
            'produk' => $produk,
            'expired' => $expired,
        ]);
    }

    public function storeExpired(Request $request, $slug)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return redirect()->back()->with('message', 'Slug tidak sesuai.');
        }
        $request->validate([
            'noseries' => 'required|string|max:255',
            'tgl_expired' => 'required|date',
            'produk_id.*' => 'required|exists:produks,id',
            'quantity.*' => 'required|integer|min:1',
        ]);
        try {
            // Mulai transaksi database
            DB::beginTransaction();

            // Simpan data expired utama
            $expired = Expired::create([
                'noseries' => $request->noseries,
                'toko_id' => $toko->id,
                'user_id' => $request->user_id,
                'tgl_expired' => $request->tgl_expired,
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
                    'expired_id' => $expired->id,
                    'produk_id' => $produkId,
                    'total_unit' => $totalUnit,
                ];
            }

            if (!empty($details)) {
                DetailExpired::insert($details);
            }

            // Update total_produk dan total_unit_produk
            $expired->update([
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
                        return redirect()->back()->withErrors([
                            'general' => "Stok produk '{$produk->nama}' tidak mencukupi untuk jumlah {$totalUnit}. Stok tersedia: {$produk->stok}.",
                        ])->with('showAlert', true);
                    }
                    $produk->update(['stok' => $newStok]);
                }
            }

            // Commit transaksi
            DB::commit();

            return redirect()->back()->with([
                'message' => 'Pendataan expired berhasil ditambahkan.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                'general' => 'Terjadi kesalahan saat menambahkan pendataan expired: ' . $e->getMessage(),
            ])->with('showAlert', true);
        }
    }

    private function redirectBasedOnRole()
    {
        $role = auth()->user()->roleuser;
        return match ($role) {
            1 => redirect()->route('admin.dashboard'),
            2 => redirect()->route('home'),
            3 => redirect()->route('manager.dashboard', ['slug' => Auth::user()->toko->slug]),
            4 => redirect()->route('stgudang.dashboard', ['slug' => Auth::user()->toko->slug]),
            5 => redirect()->route('stpenjualan.dashboard', ['slug' => Auth::user()->toko->slug]),
            default => redirect()->route('home')->with('error', 'Role tidak dikenali.'),
        };
    }
}
