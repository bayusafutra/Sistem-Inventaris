<?php

namespace App\Http\Controllers;

use App\Models\Restock;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\PengadaanRestock;
use App\Models\DetailRestock;
use App\Models\GambarRestock;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class RestockController extends Controller
{
    public function managerRestock($slug)
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
        $lastRestock = Restock::where('toko_id', $tokoId)
            ->orderBy('id', 'desc')
            ->first();
        $increment = $lastRestock ? $lastRestock->id + 1 : 1;
        $noseries = "RST{$date}{$tokoId}-{$increment}";

        $produk = Produk::where('toko_id', $toko->id)->where('isactive', 1)->get();
        $pengadaanrestock = PengadaanRestock::where('toko_id', $toko->id)->where('status', 1)->get();
        $restock = Restock::with('gambar')->where('toko_id', $toko->id)->get();
        return view('toko.inflow.restock', [
            'toko' => $toko,
            'noseries' => $noseries,
            'produk' => $produk,
            'pengadaanrestock' => $pengadaanrestock,
            'restock' => $restock,
        ]);
    }

    public function storeRestock(Request $request, $slug)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return redirect()->route('manager.restock', $toko->slug)->with('message', 'Slug tidak sesuai.');
        }
        $request->validate([
            'noseries' => 'required|string|max:255',
            'tgl_restock' => 'required|date',
            'catatan' => 'nullable',
            'mySecondImage' => 'nullable|array|max:10', // Max 10 images
            'mySecondImage.*' => 'image|mimes:jpg,jpeg,png|max:10240', // Max 10MB per image
        ]);

        try {
            // Mulai transaksi database
            DB::beginTransaction();
            $idpengadaan = PengadaanRestock::where('noseries', $request->input('pengadaanSelect'))->first();
            // Simpan data restock utama
            $restock = Restock::create([
                'noseries' => $request->noseries,
                'toko_id' => $toko->id,
                'user_id' => $request->user_id,
                'pengadaan_id' => $request->has('restockCheckbox') ? $idpengadaan->id : null,
                'status' => 1,
                'tgl_restock' => $request->tgl_restock,
                'catatan' => $request->catatan,
            ]);

            // Handle list produk (manual atau via pengadaan)
            $details = [];
            $totalProduk = 0;
            $totalUnitProduk = 0;

            if ($request->has('restockCheckbox')) {
                // Ambil data dari pengadaan restock
                $pengadaan = PengadaanRestock::where('noseries', $request->input('pengadaanSelect'))->first();
                if ($pengadaan) {
                    $pengadaan->update([
                        'status' => 3,
                    ]);
                }
                if ($pengadaan) {
                    foreach ($pengadaan->detailpengadaan as $detail) {
                        $details[] = [
                            'restock_id' => $restock->id,
                            'produk_id' => $detail->produk_id,
                            'total_unit' => $detail->total_unit,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                        // Akumulasikan stok produk
                        $produk = Produk::find($detail->produk_id);
                        if ($produk) {
                            $produk->increment('stok', $detail->total_unit);
                        }
                        $totalProduk++;
                        $totalUnitProduk += $detail->total_unit;
                    }
                }
            } else {
                // Ambil data manual dari form
                $produkIds = $request->input('produk', []);
                $quantities = $request->input('quantity', []);

                if (count($produkIds) !== count($quantities)) {
                    throw new \Exception('Data produk dan jumlah tidak sesuai.');
                }

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

                foreach ($uniqueProducts as $produkId => $totalUnit) {
                    $details[] = [
                        'restock_id' => $restock->id,
                        'produk_id' => $produkId,
                        'total_unit' => $totalUnit,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                    // Akumulasikan stok produk
                    $produk = Produk::find($produkId);
                    if ($produk) {
                        $produk->increment('stok', $totalUnit);
                    }
                    $totalProduk++;
                    $totalUnitProduk += $totalUnit;
                }
            }

            if (!empty($details)) {
                DetailRestock::insert($details);
            }

            // Update total_produk dan total_unit_produk
            $restock->update([
                'total_produk' => $totalProduk,
                'total_unit_produk' => $totalUnitProduk,
            ]);

            // Handle multiple image upload
            if ($request->hasFile('mySecondImage')) {
                foreach ($request->file('mySecondImage') as $image) {
                    $path = $image->store('restock_images', 'public'); // Simpan di storage/app/public/restock_images
                    GambarRestock::create([
                        'restock_id' => $restock->id,
                        'path' => $path,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Commit transaksi
            DB::commit();

            return redirect()->route('manager.restock', $toko->slug)->with([
                'message' => 'Restock berhasil ditambahkan.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('manager.restock', $toko->slug)->withErrors([
                'general' => 'Terjadi kesalahan saat menambahkan restock: ' . $e->getMessage(),
            ])->with('showAlert', true);
        }
    }

    public function getPengadaanDetail($no_series)
    {
        try {
            $pengadaan = PengadaanRestock::where('noseries', $no_series)->where('toko_id', Auth::user()->toko_id)->first();
            if (!$pengadaan) {
                return response()->json(['success' => false, 'message' => 'Pengadaan tidak ditemukan.'], 404);
            }

            $details = $pengadaan->detailpengadaan->map(function ($detail) {
                return [
                    'nama_produk' => $detail->produk->name,
                    'total_unit' => $detail->total_unit,
                    'satuan' => $detail->produk->satuan->name ?? 'Satuan',
                ];
            });

            return response()->json(['success' => true, 'data' => $details]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
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
