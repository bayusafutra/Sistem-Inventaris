<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Http\Requests\StoreTokoRequest;
use App\Http\Requests\UpdateTokoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;

class TokoController extends Controller
{
    public function daftarToko()
    {
        $toko = auth()->user()->toko;

        return view('general.daftarToko', [
            'toko' => $toko,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tokos,name',
            'jenis_usaha' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ], [
            'name.required' => 'Nama toko wajib diisi.',
            'name.unique' => 'Nama toko sudah terdaftar.',
            'jenis_usaha.required' => 'Jenis usaha wajib diisi.',
            'alamat.required' => 'Alamat wajib diisi.',
            'provinsi.required' => 'Provinsi wajib diisi.',
            'kota.required' => 'Kota/Kabupaten wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib diisi.',
            'kelurahan.required' => 'Kelurahan wajib diisi.',
        ]);

        try {
            $provName = DB::table('ec_provinces')->where('prov_id', $request->provinsi)->value('prov_name');
            $cityName = DB::table('ec_cities')->where('city_id', $request->kota)->value('city_name');
            $districtName = DB::table('ec_districts')->where('dis_id', $request->kecamatan)->value('dis_name');
            $subdistrictName = DB::table('ec_subdistricts')->where('subdis_id', $request->kelurahan)->value('subdis_name');

            $toko = Toko::create([
                'name' => $request->name,
                'jenis_usaha' => $request->jenis_usaha,
                'alamat' => $request->alamat,
                'provinsi' => $provName,
                'kota' => $cityName,
                'kecamatan' => $districtName,
                'kelurahan' => $subdistrictName,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->name) . '-' . Str::random(5),
                'tgl_pendaftaran' => now(),
                'isactive' => false,
            ]);

            $user = auth()->user();
            $user->toko_id = $toko->id;
            $user->save();

            return redirect()->back()->with([
                'message' => 'Pendaftaran toko berhasil diajukan. Menunggu verifikasi admin.',
                'type' => 'success',
                'showAlert' => true,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([
                'general' => 'Terjadi kesalahan saat menyimpan data. Coba lagi.',
            ])->with('showAlert', true);
        }
    }

    public function verifToko()
    {
        $toko = Toko::where('status', 1)->get();
        return view('admin.verifikasi-pendaftaran', [
            'toko' => $toko,
        ]);
    }

    public function approve($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->update([
            'status' => 2,
            'tgl_pengesahan' => now(),
        ]);

        $user = User::where('toko_id', $toko->id)->first();
        if ($user) {
            $user->update(['roleuser' => 3]);
        }

        return redirect()->back()->with([
            'message' => 'Pendaftaran toko telah disetujui.',
            'showAlert' => true,
        ]);
    }

    public function reject($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->update([
            'status' => 3,
            'tgl_pengesahan' => now(),
        ]);

        return redirect()->back()->with([
            'message' => 'Pendaftaran toko telah ditolak.',
            'showAlert' => true,
        ]);
    }

    public function masterToko()
    {
        $toko = Toko::whereIn('status', [2, 3])->get();
        return view('admin.m-toko', [
            'toko' => $toko,
        ]);
    }

    public function nonaktif($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->update([
            'status' => 3,
        ]);

        return redirect()->back()->with([
            'message' => 'Status toko telah di-NonAktifkan.',
            'showAlert' => true,
        ]);
    }

    public function aktif($id)
    {
        $toko = Toko::findOrFail($id);
        $toko->update([
            'status' => 2,
        ]);

        $user = User::where('toko_id', $toko->id)->where('roleuser', 2)->first();
        if ($user) {
            $user->update(['roleuser' => 3]);
        }

        return redirect()->back()->with([
            'message' => 'Status toko telah diAktifkan.',
            'showAlert' => true,
        ]);
    }

    public function getProvinces()
    {
        $provinces = DB::table('ec_provinces')->where('status', 1)->select('prov_id', 'prov_name')->get();
        return response()->json($provinces);
    }

    public function getCities($provId)
    {
        $cities = DB::table('ec_cities')->where('prov_id', $provId)->select('city_id', 'city_name')->get();
        return response()->json($cities);
    }

    public function getDistricts($cityId)
    {
        $districts = DB::table('ec_districts')->where('city_id', $cityId)->select('dis_id', 'dis_name')->get();
        return response()->json($districts);
    }

    public function getSubdistricts($disId)
    {
        $subdistricts = DB::table('ec_subdistricts')->where('dis_id', $disId)->select('subdis_id', 'subdis_name')->get();
        return response()->json($subdistricts);
    }
}
