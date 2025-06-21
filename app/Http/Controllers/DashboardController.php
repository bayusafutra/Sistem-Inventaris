<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Toko;
use App\Models\DetailRestock;
use App\Models\DetailPenjualan;
use App\Models\DetailExpired;
use App\Models\DetailReturKonsumen;
use App\Models\DetailReturSupplier;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function manager($slug)
    {
        $user = Auth::user();
        if (!$user->toko_id) {
            return $this->redirectBasedOnRole();
        }
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return $this->redirectBasedOnRole();
        }

        // Ambil data untuk grafik 1: Tren Inflow & Outflow
        $inflowData = []; // Produk Masuk (Restock)
        $outflowData = []; // Produk Keluar (Penjualan, Retur Konsumen, Expired, Retur Supplier)

        // Inisialisasi array untuk 12 bulan (Jan-Dec)
        for ($i = 1; $i <= 12; $i++) {
            $inflowData[$i] = 0;
            $outflowData[$i] = 0;
        }

        // Query untuk Produk Masuk (Restock)
        $restocks = DetailRestock::whereHas('restock', function ($query) use ($toko) {
            $query->where('toko_id', $toko->id);
        })->with('restock')->get();

        foreach ($restocks as $detail) {
            $month = Carbon::parse($detail->restock->tgl_pengadaan)->month;
            $inflowData[$month] += $detail->total_unit;
        }

        // Query untuk Produk Keluar
        $penjualans = DetailPenjualan::whereHas('penjualan', function ($query) use ($toko) {
            $query->where('toko_id', $toko->id);
        })->with('penjualan')->get();
        $returKonsumens = DetailReturKonsumen::whereHas('returkonsumen', function ($query) use ($toko) {
            $query->where('toko_id', $toko->id);
        })->with('returkonsumen')->get();
        $expireds = DetailExpired::whereHas('expired', function ($query) use ($toko) {
            $query->where('toko_id', $toko->id);
        })->with('expired')->get();
        $returSuppliers = DetailReturSupplier::whereHas('retursupplier', function ($query) use ($toko) {
            $query->where('toko_id', $toko->id);
        })->with('retursupplier')->get();

        foreach ($penjualans as $detail) {
            $month = Carbon::parse($detail->penjualan->tgl_penjualan)->month;
            $outflowData[$month] += $detail->total_unit;
        }
        foreach ($returKonsumens as $detail) {
            $month = Carbon::parse($detail->returkonsumen->tgl_retur)->month;
            $outflowData[$month] += $detail->total_unit;
        }
        foreach ($expireds as $detail) {
            $month = Carbon::parse($detail->expired->tgl_expired)->month;
            $outflowData[$month] += $detail->total_unit;
        }
        foreach ($returSuppliers as $detail) {
            $month = Carbon::parse($detail->retursupplier->tgl_retur)->month;
            $outflowData[$month] += $detail->total_unit;
        }

        // Konversi ke array untuk grafik
        $inflowSeries = array_values($inflowData);
        $outflowSeries = array_values($outflowData);

        return view('toko.manager.index', [
            'toko' => $toko,
            'inflowData' => $inflowSeries,
            'outflowData' => $outflowSeries,
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
}
