<?php

namespace App\Http\Controllers;

use App\Models\ReturSupplier;
use App\Models\Toko;
use App\Models\Produk;
use App\Models\DetailReturSupplier;
use App\Models\GambarReturSupplier;
use App\Models\Restock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturSupplierController extends Controller
{
    public function indexRetur($slug)
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
        $lastRetur = ReturSupplier::where('toko_id', $tokoId)
            ->orderBy('id', 'desc')
            ->first();
        $increment = $lastRetur ? $lastRetur->id + 1 : 1;
        $noseries = "RTRS{$date}{$tokoId}-{$increment}";

        $produk = Produk::where('toko_id', $toko->id)->where('isactive', 1)->get();
        $restock = Restock::where('toko_id', $toko->id)->where('status', 1)->get();
        $retursupplier = ReturSupplier::with('gambar')->where('toko_id', $toko->id)->get();
        return view('toko.st-gudang.retur-supplier', [
            'toko' => $toko,
            'noseries' => $noseries,
            'produk' => $produk,
            'restock' => $restock,
            'retursupplier' => $retursupplier,
        ]);
    }

    public function storeRetur(Request $request, $slug)
    {
        $user = Auth::user();
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return redirect()->back()->with('message', 'Slug tidak sesuai.');
        }

        $request->validate([
            'noseries' => 'required|string|max:255',
            'tgl_retur' => 'required|date',
            'catatan' => 'nullable',
            'mySecondImage' => 'nullable|array|max:10', // Max 10 images
            'mySecondImage.*' => 'image|mimes:jpg,jpeg,png|max:10240', // Max 10MB per image
            'id_produk.*' => 'required|exists:produks,id', // Pastikan ini ID, bukan nama
            'quantity.*' => 'required|integer|min:1',
            'restock' => 'required|exists:restocks,noseries', // Validasi restock
        ]);

        try {
            // Mulai transaksi database
            DB::beginTransaction();
            $idrestock = Restock::where('noseries', $request->input('restock'))->first();
            $idrestock->update([
                'status' => 2,
            ]);

            // Simpan data retur konsumen utama
            $retursupplier = ReturSupplier::create([
                'noseries' => $request->noseries,
                'toko_id' => $toko->id,
                'user_id' => $request->user_id,
                'restock_id' => $idrestock->id,
                'tgl_retur' => $request->tgl_retur,
                'catatan' => $request->catatan,
            ]);

            // Ambil data detail penjualan untuk validasi
            $restockDetails = $idrestock->detailrestock;

            // Proses detail retur konsumen
            $produkIds = $request->input('id_produk', []);
            $quantities = $request->input('quantity', []);

            if (count($produkIds) !== count($quantities)) {
                throw new \Exception('Data produk dan jumlah tidak sesuai.');
            }

            $details = [];
            $totalProducts = 0;
            $totalUnits = 0;
            foreach ($produkIds as $index => $produkId) {
                if (!empty($produkId) && !empty($quantities[$index])) {
                    $quantity = (int)$quantities[$index];
                    $detailrestock = $restockDetails->firstWhere('produk_id', $produkId);
                    if (!$detailrestock) {
                        throw new \Exception("Produk dengan ID {$produkId} tidak ditemukan di penjualan ini.");
                    }
                    if ($quantity > $detailrestock->total_unit) {
                        throw new \Exception("Jumlah retur untuk produk '{$detailrestock->produk->name}' melebihi total unit ({$detailrestock->total_unit}).");
                    }

                    $details[] = [
                        'retursupplier_id' => $retursupplier->id,
                        'produk_id' => $produkId,
                        'total_unit' => $quantity,
                    ];
                    $totalProducts++;
                    $totalUnits += $quantity;

                    // Kurangi stok produk
                    $produk = Produk::find($produkId);
                    if ($produk) {
                        $newStok = $produk->stok - $quantity;
                        if ($newStok < 0) {
                            throw new \Exception("Stok produk '{$produk->name}' tidak mencukupi setelah retur. Stok tersisa: {$produk->stok}.");
                        }
                        $produk->update(['stok' => $newStok]);
                    }
                }
            }

            if (!empty($details)) {
                DetailReturSupplier::insert($details);
                $retursupplier->update([
                    'total_produk' => $totalProducts,
                    'total_unit_produk' => $totalUnits,
                ]);
            }

            // Handle multiple image upload
            if ($request->hasFile('mySecondImage')) {
                foreach ($request->file('mySecondImage') as $image) {
                    $path = $image->store('retursupplier_images', 'public');
                    GambarReturSupplier::create([
                        'retursupplier_id' => $retursupplier->id,
                        'path' => $path,
                    ]);
                }
            }

            // Commit transaksi
            DB::commit();

            return redirect()->back()->with([
                'message' => 'Retur Supplier berhasil ditambahkan.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                'general' => 'Terjadi kesalahan saat menambahkan retur supplier: ' . $e->getMessage(),
            ])->with('showAlert', true);
        }
    }

    public function getRestockDetail($no_series)
    {
        try {
            $restock = Restock::where('noseries', $no_series)->where('toko_id', Auth::user()->toko_id)->first();
            if (!$restock) {
                return response()->json(['success' => false, 'message' => 'Restock tidak ditemukan.'], 404);
            }

            $details = $restock->detailrestock->map(function ($detail) {
                return [
                    'produk_id' => $detail->produk_id,
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
