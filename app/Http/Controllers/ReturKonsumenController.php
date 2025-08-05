<?php

namespace App\Http\Controllers;

use App\Models\ReturKonsumen;
use App\Models\Toko;
use App\Models\Produk;
use App\Models\DetailReturKonsumen;
use App\Models\GambarReturKonsumen;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReturKonsumenController extends Controller
{
    public function indexRetur($slug)
    {
        $user = Auth::user();
        if (!$user->toko_id || !in_array($user->roleuser, [3,5])) {
            return $this->redirectBasedOnRole();
        }
        $toko = Toko::where('id', $user->toko_id)->where('status', 2)->first();
        if (!$toko || $toko->slug !== $slug) {
            return $this->redirectBasedOnRole();
        }
        $date = now()->format('dmY');
        $tokoId = $toko->id;
        $lastRetur = ReturKonsumen::where('toko_id', $tokoId)
            ->orderBy('id', 'desc')
            ->first();
        $increment = $lastRetur ? $lastRetur->id + 1 : 1;
        $noseries = "RTRK{$date}{$tokoId}-{$increment}";

        $produk = Produk::where('toko_id', $toko->id)->where('isactive', 1)->get();
        $penjualan = Penjualan::where('toko_id', $toko->id)->where('status', 1)->get();
        $returkonsumen = ReturKonsumen::with('gambar')->where('toko_id', $toko->id)->get();
        return view('toko.st-penjualan.retur-konsumen', [
            'toko' => $toko,
            'noseries' => $noseries,
            'produk' => $produk,
            'penjualan' => $penjualan,
            'returkonsumen' => $returkonsumen,
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
            'penjualan' => 'required|exists:penjualans,noseries', // Validasi penjualan
        ]);

        try {
            // Mulai transaksi database
            DB::beginTransaction();
            $idpenjualan = Penjualan::where('noseries', $request->input('penjualan'))->first();

            $idpenjualan->update([
                'status' => 2,
            ]);

            // Simpan data retur konsumen utama
            $returkonsumen = ReturKonsumen::create([
                'noseries' => $request->noseries,
                'toko_id' => $toko->id,
                'user_id' => $request->user_id,
                'penjualan_id' => $idpenjualan->id,
                'tgl_retur' => $request->tgl_retur,
                'catatan' => $request->catatan,
            ]);

            // Ambil data detail penjualan untuk validasi
            $penjualanDetails = $idpenjualan->detailpenjualan;

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
                    $detailPenjualan = $penjualanDetails->firstWhere('produk_id', $produkId);
                    if (!$detailPenjualan) {
                        throw new \Exception("Produk dengan ID {$produkId} tidak ditemukan di penjualan ini.");
                    }
                    if ($quantity > $detailPenjualan->total_unit) {
                        throw new \Exception("Jumlah retur untuk produk '{$detailPenjualan->produk->name}' melebihi total unit ({$detailPenjualan->total_unit}).");
                    }

                    $details[] = [
                        'returkonsumen_id' => $returkonsumen->id,
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
                DetailReturKonsumen::insert($details);
                $returkonsumen->update([
                    'total_produk' => $totalProducts,
                    'total_unit_produk' => $totalUnits,
                ]);
            }

            // Handle multiple image upload
            if ($request->hasFile('mySecondImage')) {
                foreach ($request->file('mySecondImage') as $image) {
                    $path = $image->store('returkonsumen_images', 'public');
                    GambarReturKonsumen::create([
                        'returkonsumen_id' => $returkonsumen->id,
                        'path' => $path,
                    ]);
                }
            }

            // Commit transaksi
            DB::commit();

            return redirect()->back()->with([
                'message' => 'Retur Konsumen berhasil ditambahkan.',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors([
                'general' => 'Terjadi kesalahan saat menambahkan retur konsumen: ' . $e->getMessage(),
            ])->with('showAlert', true);
        }
    }

    public function getPenjualanDetail($no_series)
    {
        try {
            $penjualan = Penjualan::where('noseries', $no_series)->where('toko_id', Auth::user()->toko_id)->first();
            if (!$penjualan) {
                return response()->json(['success' => false, 'message' => 'Penjualan tidak ditemukan.'], 404);
            }

            $details = $penjualan->detailpenjualan->map(function ($detail) {
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
            3 => redirect()->route('manager.dashboard', ['slug' => Auth::user()->toko->slug]),
            4 => redirect()->route('stgudang.dashboard', ['slug' => Auth::user()->toko->slug]),
            5 => redirect()->route('stpenjualan.dashboard', ['slug' => Auth::user()->toko->slug]),
            default => redirect()->route('home')->with('error', 'Role tidak dikenali.'),
        };
    }
}
