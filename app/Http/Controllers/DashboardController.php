<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Toko;
use App\Models\DetailRestock;
use App\Models\DetailPenjualan;
use App\Models\DetailExpired;
use App\Models\DetailReturKonsumen;
use App\Models\DetailReturSupplier;
use App\Models\Expired;
use App\Models\PengadaanRestock;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\Restock;
use App\Models\ReturKonsumen;
use App\Models\ReturSupplier;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function home()
    {
        $user = Auth::user();
        if (!$user->roleuser == 1) {
            return $this->redirectBasedOnRole();
        }

        $pendaftar = [];
        $terverifikasi = [];

        for ($i = 1; $i <= 12; $i++) {
            $pendaftar[$i] = 0;
            $terverifikasi[$i] = 0;
        }

        $pd = Toko::all();
        foreach ($pd as $detail) {
            $month = Carbon::parse($detail->tgl_pendaftaran)->month;
            $pendaftar[$month] += 1;
        }

        $tv = Toko::where('status', 2)->get();
        foreach ($tv as $detail) {
            $month = Carbon::parse($detail->tgl_pendaftaran)->month;
            $terverifikasi[$month] += 1;
        }

        $pendaftarSeries = array_values($pendaftar);
        $terverifikasiSeries = array_values($terverifikasi);

        $toko = $pd->count();
        $pengguna = User::count();
        $produk = Produk::count();
        $restock = Restock::count();
        $penjualan = Penjualan::count();
        $expired = Expired::count();
        $returkonsumen = ReturKonsumen::count();
        $retursupplier = ReturSupplier::count();
        $tmasuk = $restock;
        $tkeluar = $penjualan + $expired + $returkonsumen + $retursupplier;


        return view('general.index', [
            'pendaftar' => $pendaftarSeries,
            'terverifikasi' => $terverifikasiSeries,
            'toko' => $toko,
            'pengguna' => $pengguna,
            'produk' => $produk,
            'tmasuk' => $tmasuk,
            'tkeluar' => $tkeluar,
        ]);
    }

    public function admin()
    {
        $user = Auth::user();
        if (!$user->roleuser == 1) {
            return $this->redirectBasedOnRole();
        }

        // Data untuk grafik tren pendaftar dan terverifikasi
        $pendaftar = [];
        $terverifikasi = [];

        for ($i = 1; $i <= 12; $i++) {
            $pendaftar[$i] = 0;
            $terverifikasi[$i] = 0;
        }

        $pd = Toko::all();
        foreach ($pd as $detail) {
            $month = Carbon::parse($detail->tgl_pendaftaran)->month;
            $pendaftar[$month] += 1;
        }

        $tv = Toko::where('status', 2)->get();
        foreach ($tv as $detail) {
            $month = Carbon::parse($detail->tgl_pendaftaran)->month;
            $terverifikasi[$month] += 1;
        }

        $pendaftarSeries = array_values($pendaftar);
        $terverifikasiSeries = array_values($terverifikasi);

        // Data untuk grafik 2: Distribusi Jenis Usaha
        $tokos = Toko::where('status', 2)->select('jenis_usaha', DB::raw('count(*) as count'))
            ->groupBy('jenis_usaha')
            ->orderBy('count', 'desc')
            ->get();

        $businessSeries = [];
        $businessLabels = [];

        if ($tokos->isEmpty()) {
            // Jika tidak ada toko, set pesan placeholder
            $businessSeries = [0];
            $businessLabels = ["Belum Ada Toko Terverifikasi"];
        } elseif ($tokos->count() > 4) {
            $topBusinesses = $tokos->take(4);
            $otherCount = $tokos->skip(4)->sum('count');

            foreach ($topBusinesses as $business) {
                $businessSeries[] = $business->count;
                $businessLabels[] = ucwords(strtolower($business->jenis_usaha)); // Kapitalisasi huruf pertama
            }
            $businessSeries[] = $otherCount;
            $businessLabels[] = "Lainnya";
        } else {
            foreach ($tokos as $business) {
                $businessSeries[] = $business->count;
                $businessLabels[] = ucwords(strtolower($business->jenis_usaha)); // Kapitalisasi huruf pertama
            }
        }

        // Data untuk grafik 3: Frekuensi Restock (3 bulan terakhir)
        $restockData = [];
        $months = [];

        $endMonth = Carbon::now()->month; // Juni 2025
        $startMonth = $endMonth - 2; // April 2025
        if ($startMonth <= 0) {
            $startMonth += 12; // Handle tahun sebelumnya (opsional)
        }

        for ($i = 0; $i < 3; $i++) {
            $month = ($startMonth + $i - 1) % 12 + 1; // Pastikan 1-12
            $restockData[$month] = 0;
            $months[] = Carbon::create(2025, $month, 1)->format('M'); // "Apr", "May", "Jun"
        }

        $restocksCount = Restock::whereBetween('tgl_restock', [
            Carbon::now()->subMonths(2)->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tgl_restock)->month;
            });

        foreach ($restocksCount as $month => $group) {
            $restockData[$month] = $group->count();
        }

        $restockSeries = [];
        foreach ($months as $index => $month) {
            $monthNum = Carbon::parse("2025-{$month}-01")->month;
            $restockSeries[$index] = $restockData[$monthNum] ?? 0;
        }

        // Data untuk grafik 4: Frekuensi Penjualan (3 bulan terakhir)
        $salesData = [];
        $salesMonths = $months; // Re-use months from restock

        for ($i = 0; $i < 3; $i++) {
            $month = ($startMonth + $i - 1) % 12 + 1; // Pastikan 1-12
            $salesData[$month] = 0;
        }

        $salesCount = Penjualan::whereBetween('tgl_penjualan', [
            Carbon::now()->subMonths(2)->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tgl_penjualan)->month;
            });

        foreach ($salesCount as $month => $group) {
            $salesData[$month] = $group->count();
        }

        $salesSeries = [];
        foreach ($salesMonths as $index => $month) {
            $monthNum = Carbon::parse("2025-{$month}-01")->month;
            $salesSeries[$index] = $salesData[$monthNum] ?? 0;
        }

        // Tambah jumlah restock keseluruhan
        $jumlahrestock = Restock::count();
        $jumlahpenjualan = Penjualan::count();

        // variable ringkasan
        $jumlahproduk = Produk::count();
        $jumlahstgudang = User::where('roleuser', 4)->count();
        $jumlahstpenjualan = User::where('roleuser', 5)->count();
        $topTokoAktif = Toko::withCount(['restock', 'penjualan', 'produk'])
            ->with(['user' => function ($query) {
                $query->whereIn('roleuser', [4, 5]);
            }])
            ->get()
            ->map(function ($toko) {
                $toko->total_aktivitas = $toko->restock_count + $toko->penjualan_count;
                $toko->staff_count = $toko->user->count(); // Jumlah staff role 4 atau 5
                return $toko;
            })
            ->sortByDesc('total_aktivitas')
            ->take(5);

        return view('admin.index', [
            'pendaftar' => $pendaftarSeries,
            'terverifikasi' => $terverifikasiSeries,
            'businessSeries' => $businessSeries,
            'businessLabels' => $businessLabels,
            'restockSeries' => $restockSeries,
            'restockLabels' => $months,
            'salesSeries' => $salesSeries,
            'salesLabels' => $salesMonths,
            'jumlahrestock' => $jumlahrestock,
            'jumlahpenjualan' => $jumlahpenjualan,
            'jumlahproduk' => $jumlahproduk,
            'jumlahstgudang' => $jumlahstgudang,
            'jumlahstpenjualan' => $jumlahstpenjualan,
            'topTokoAktif' => $topTokoAktif,
        ]);
    }

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

        // Data untuk grafik 1: Tren Inflow & Outflow
        $inflowData = [];
        $outflowData = [];

        for ($i = 1; $i <= 12; $i++) {
            $inflowData[$i] = 0;
            $outflowData[$i] = 0;
        }

        $restocks = DetailRestock::whereHas('restock', function ($query) use ($toko) {
            $query->where('toko_id', $toko->id);
        })->with('restock')->get();

        foreach ($restocks as $detail) {
            $month = Carbon::parse($detail->restock->tgl_pengadaan)->month;
            $inflowData[$month] += $detail->total_unit;
        }

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

        $inflowSeries = array_values($inflowData);
        $outflowSeries = array_values($outflowData);

        // Data untuk grafik 2: Stok Produk
        $products = Produk::where('toko_id', $toko->id)->where('isactive', 1)->orderBy('stok', 'desc')->get();
        $stockSeries = [];
        $stockLabels = [];

        if ($products->isEmpty()) {
            $stockSeries = [0];
            $stockLabels = ["Toko Belum Memiliki Produk yang Aktif"];
        } elseif ($products->count() > 4) {
            $topProducts = $products->take(4);
            $otherStock = $products->skip(4)->sum('stok');

            foreach ($topProducts as $product) {
                $stockSeries[] = $product->stok;
                $stockLabels[] = ucwords(strtolower($product->name));
            }
            $stockSeries[] = $otherStock;
            $stockLabels[] = "Lainnya";
        } else {
            foreach ($products as $product) {
                $stockSeries[] = $product->stok;
                $stockLabels[] = ucwords(strtolower($product->name));
            }
        }

        // Data untuk grafik 3: Frekuensi Restock (3 bulan terakhir)
        $restockData = [];
        $months = [];

        $endMonth = Carbon::now()->month; // Juni 2025
        $startMonth = $endMonth - 2; // April 2025
        if ($startMonth <= 0) {
            $startMonth += 12; // Handle tahun sebelumnya (opsional)
        }

        for ($i = 0; $i < 3; $i++) {
            $month = ($startMonth + $i - 1) % 12 + 1; // Pastikan 1-12
            $restockData[$month] = 0;
            $months[] = Carbon::create(2025, $month, 1)->format('M'); // "Apr", "May", "Jun"
        }

        $restocksCount = Restock::where('toko_id', $toko->id)
            ->whereBetween('tgl_restock', [
                Carbon::now()->subMonths(2)->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tgl_restock)->month;
            });

        foreach ($restocksCount as $month => $group) {
            $restockData[$month] = $group->count();
        }

        $restockSeries = [];
        foreach ($months as $index => $month) {
            $monthNum = Carbon::parse("2025-{$month}-01")->month;
            $restockSeries[$index] = $restockData[$monthNum] ?? 0;
        }

        // Data untuk grafik 4: Frekuensi Penjualan (3 bulan terakhir)
        $salesData = [];
        $salesMonths = $months; // Re-use months from restock

        for ($i = 0; $i < 3; $i++) {
            $month = ($startMonth + $i - 1) % 12 + 1; // Pastikan 1-12
            $salesData[$month] = 0;
        }

        $salesCount = Penjualan::where('toko_id', $toko->id)
            ->whereBetween('tgl_penjualan', [
                Carbon::now()->subMonths(2)->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tgl_penjualan)->month;
            });

        foreach ($salesCount as $month => $group) {
            $salesData[$month] = $group->count();
        }

        $salesSeries = [];
        foreach ($salesMonths as $index => $month) {
            $monthNum = Carbon::parse("2025-{$month}-01")->month;
            $salesSeries[$index] = $salesData[$monthNum] ?? 0;
        }

        // Tambah jumlah restock keseluruhan
        $jumlahrestock = Restock::where('toko_id', $toko->id)->count();
        $jumlahpenjualan = Penjualan::where('toko_id', $toko->id)->count();

        // variable ringkasan
        $jumlahproduk = Produk::where('toko_id', $toko->id)->count();
        $jumlahstgudang = User::where('toko_id', $toko->id)->where('roleuser', 4)->count();
        $jumlahstpenjualan = User::where('toko_id', $toko->id)->where('roleuser', 5)->count();
        $produkterendah = Produk::where('toko_id', $toko->id)->orderBy('stok', 'asc')->limit(5)->get();

        return view('toko.manager.index', [
            'toko' => $toko,
            'inflowData' => $inflowSeries,
            'outflowData' => $outflowSeries,
            'stockSeries' => $stockSeries,
            'stockLabels' => $stockLabels,
            'restockSeries' => $restockSeries,
            'restockLabels' => $months,
            'salesSeries' => $salesSeries,
            'salesLabels' => $salesMonths,
            'jumlahrestock' => $jumlahrestock,
            'jumlahpenjualan' => $jumlahpenjualan,
            'jumlahproduk' => $jumlahproduk,
            'jumlahstgudang' => $jumlahstgudang,
            'jumlahstpenjualan' => $jumlahstpenjualan,
            'produkterendah' => $produkterendah,
        ]);
    }

    public function stgudang($slug)
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

        // Inisialisasi array untuk 12 bulan (Jan-Dec)
        for ($i = 1; $i <= 12; $i++) {
            $inflowData[$i] = 0;
        }

        // Query untuk Produk Masuk (Restock)
        $restocks = DetailRestock::whereHas('restock', function ($query) use ($toko) {
            $query->where('toko_id', $toko->id);
        })->with('restock')->get();

        foreach ($restocks as $detail) {
            $month = Carbon::parse($detail->restock->tgl_pengadaan)->month;
            $inflowData[$month] += $detail->total_unit;
        }

        // Konversi ke array untuk grafik
        $inflowSeries = array_values($inflowData);

        // Data untuk grafik 2: Stok Produk
        $products = Produk::where('toko_id', $toko->id)->where('isactive', 1)->orderBy('stok', 'desc')->get();
        $stockSeries = [];
        $stockLabels = [];

        if ($products->isEmpty()) {
            // Jika tidak ada produk, set pesan placeholder
            $stockSeries = [0];
            $stockLabels = ["Toko Belum Memiliki Produk yang Aktif"];
        } elseif ($products->count() > 4) {
            $topProducts = $products->take(4);
            $otherStock = $products->skip(4)->sum('stok');

            foreach ($topProducts as $product) {
                $stockSeries[] = $product->stok;
                $stockLabels[] = ucwords(strtolower($product->name));
            }
            $stockSeries[] = $otherStock;
            $stockLabels[] = "Lainnya";
        } else {
            foreach ($products as $product) {
                $stockSeries[] = $product->stok;
                $stockLabels[] = ucwords(strtolower($product->name));
            }
        }

        // Data untuk grafik 4: Frekuensi Restock (3 bulan terakhir)
        $restockData = [];
        $months = [];

        $endMonth = Carbon::now()->month; // Juni 2025
        $startMonth = $endMonth - 2; // April 2025
        if ($startMonth <= 0) {
            $startMonth += 12; // Handle tahun sebelumnya (opsional)
        }

        for ($i = 0; $i < 3; $i++) {
            $month = ($startMonth + $i - 1) % 12 + 1; // Pastikan 1-12
            $restockData[$month] = 0;
            $months[] = Carbon::create(2025, $month, 1)->format('M'); // "Apr", "May", "Jun"
        }

        $restocksCount = Restock::where('toko_id', $toko->id)
            ->whereBetween('tgl_restock', [
                Carbon::now()->subMonths(2)->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tgl_restock)->month;
            });

        foreach ($restocksCount as $month => $group) {
            $restockData[$month] = $group->count();
        }

        $restockSeries = [];
        foreach ($months as $index => $month) {
            $monthNum = Carbon::parse("2025-{$month}-01")->month;
            $restockSeries[$index] = $restockData[$monthNum] ?? 0;
        }

        // Data untuk grafik 3: Frekuensi Pengadaan Restock (3 bulan terakhir)
        $pengadaanData = [];
        $pengadaanMonths = $months; // Re-use months from restock

        for ($i = 0; $i < 3; $i++) {
            $month = ($startMonth + $i - 1) % 12 + 1; // Pastikan 1-12
            $pengadaanData[$month] = 0;
        }

        $pengadaanCount = PengadaanRestock::where('toko_id', $toko->id)
            ->whereBetween('tgl_pengadaan', [
                Carbon::now()->subMonths(2)->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tgl_pengadaan)->month;
            });

        foreach ($pengadaanCount as $month => $group) {
            $pengadaanData[$month] = $group->count();
        }

        $pengadaanSeries = [];
        foreach ($pengadaanMonths as $index => $month) {
            $monthNum = Carbon::parse("2025-{$month}-01")->month;
            $pengadaanSeries[$index] = $pengadaanData[$monthNum] ?? 0;
        }

        $jumlahrestock = Restock::where('toko_id', $toko->id)->count();
        $jumlahpengadaan = PengadaanRestock::where('toko_id', $toko->id)->count();

        // variable ringkasan
        $jumlahproduk = Produk::where('toko_id', $toko->id)->count();
        $jumlahrtsupplier = ReturSupplier::where('toko_id', $toko->id)->count();
        $jumlahunitrtsupplier = ReturSupplier::where('toko_id', $toko->id)
            ->with('detailretursupplier')
            ->get()
            ->flatMap(function ($retur) {
                return $retur->detailretursupplier;
            })
            ->sum('total_unit');
        $produkterendah = Produk::where('toko_id', $toko->id)->orderBy('stok', 'asc')->limit(5)->get();

        return view('toko.st-gudang.index', [
            'toko' => $toko,
            'inflowData' => $inflowSeries,
            'stockSeries' => $stockSeries,
            'stockLabels' => $stockLabels,
            'pengadaanSeries' => $pengadaanSeries,
            'pengadaanLabels' => $months,
            'restockSeries' => $restockSeries,
            'restockLabels' => $months,
            'jumlahrestock' => $jumlahrestock,
            'jumlahpengadaan' => $jumlahpengadaan,
            'jumlahproduk' => $jumlahproduk,
            'jumlahrtsupplier' => $jumlahrtsupplier,
            'jumlahunitrtsupplier' => $jumlahunitrtsupplier,
            'produkterendah' => $produkterendah,
        ]);
    }

    public function stpenjualan($slug)
    {
        $user = Auth::user();
        if (!$user->toko_id) {
            return $this->redirectBasedOnRole();
        }
        $toko = Toko::where('id', $user->toko_id)->first();
        if (!$toko || $toko->slug !== $slug) {
            return $this->redirectBasedOnRole();
        }

        $outflowData = [];

        // Inisialisasi array untuk 12 bulan (Jan-Dec)
        for ($i = 1; $i <= 12; $i++) {
            $outflowData[$i] = 0;
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
        $outflowSeries = array_values($outflowData);

        // Data untuk grafik 2: Stok Produk
        $products = Produk::where('toko_id', $toko->id)->where('isactive', 1)->orderBy('stok', 'desc')->get();
        $stockSeries = [];
        $stockLabels = [];

        if ($products->isEmpty()) {
            // Jika tidak ada produk, set pesan placeholder
            $stockSeries = [0];
            $stockLabels = ["Toko Belum Memiliki Produk yang Aktif"];
        } elseif ($products->count() > 4) {
            $topProducts = $products->take(4);
            $otherStock = $products->skip(4)->sum('stok');

            foreach ($topProducts as $product) {
                $stockSeries[] = $product->stok;
                $stockLabels[] = ucwords(strtolower($product->name));
            }
            $stockSeries[] = $otherStock;
            $stockLabels[] = "Lainnya";
        } else {
            foreach ($products as $product) {
                $stockSeries[] = $product->stok;
                $stockLabels[] = ucwords(strtolower($product->name));
            }
        }

        // Data untuk grafik 4: Frekuensi Expired (3 bulan terakhir)
        $expiredData = [];
        $months = [];

        $endMonth = Carbon::now()->month; // Juni 2025
        $startMonth = $endMonth - 2; // April 2025
        if ($startMonth <= 0) {
            $startMonth += 12; // Handle tahun sebelumnya (opsional)
        }

        for ($i = 0; $i < 3; $i++) {
            $month = ($startMonth + $i - 1) % 12 + 1; // Pastikan 1-12
            $expiredData[$month] = 0;
            $months[] = Carbon::create(2025, $month, 1)->format('M'); // "Apr", "May", "Jun"
        }

        $expiredCount = Expired::where('toko_id', $toko->id)
            ->whereBetween('tgl_expired', [
                Carbon::now()->subMonths(2)->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tgl_expired)->month;
            });

        foreach ($expiredCount as $month => $group) {
            $expiredData[$month] = $group->count();
        }

        $expiredSeries = [];
        foreach ($months as $index => $month) {
            $monthNum = Carbon::parse("2025-{$month}-01")->month;
            $expiredSeries[$index] = $expiredData[$monthNum] ?? 0;
        }

        // Data untuk grafik 3: Frekuensi Penjualan (3 bulan terakhir)
        $salesData = [];
        $salesMonths = $months; // Re-use months from restock

        for ($i = 0; $i < 3; $i++) {
            $month = ($startMonth + $i - 1) % 12 + 1; // Pastikan 1-12
            $salesData[$month] = 0;
        }

        $salesCount = Penjualan::where('toko_id', $toko->id)
            ->whereBetween('tgl_penjualan', [
                Carbon::now()->subMonths(2)->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->tgl_penjualan)->month;
            });

        foreach ($salesCount as $month => $group) {
            $salesData[$month] = $group->count();
        }

        $salesSeries = [];
        foreach ($salesMonths as $index => $month) {
            $monthNum = Carbon::parse("2025-{$month}-01")->month;
            $salesSeries[$index] = $salesData[$monthNum] ?? 0;
        }

        $jumlahpenjualan = Penjualan::where('toko_id', $toko->id)->count();
        $jumlahexpired = Expired::where('toko_id', $toko->id)->count();

        // variable ringkasan
        $jumlahproduk = Produk::where('toko_id', $toko->id)->count();
        $jumlahrtkonsumen = ReturKonsumen::where('toko_id', $toko->id)->count();
        $jumlahunitrtkonsumen = ReturKonsumen::where('toko_id', $toko->id)
            ->with('detailreturkonsumen')
            ->get()
            ->flatMap(function ($retur) {
                return $retur->detailreturkonsumen;
            })
            ->sum('total_unit');
        $produkterendah = Produk::where('toko_id', $toko->id)->orderBy('stok', 'asc')->limit(5)->get();
        return view('toko.st-penjualan.index', [
            'toko' => $toko,
            'outflowData' => $outflowSeries,
            'stockSeries' => $stockSeries,
            'stockLabels' => $stockLabels,
            'salesSeries' => $salesSeries,
            'salesLabels' => $salesMonths,
            'expiredSeries' => $expiredSeries,
            'expiredLabels' => $months,
            'jumlahpenjualan' => $jumlahpenjualan,
            'jumlahexpired' => $jumlahexpired,
            'jumlahproduk' => $jumlahproduk,
            'jumlahrtkonsumen' => $jumlahrtkonsumen,
            'jumlahunitrtkonsumen' => $jumlahunitrtkonsumen,
            'produkterendah' => $produkterendah,
        ]);
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
