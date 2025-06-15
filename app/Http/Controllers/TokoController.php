<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use App\Http\Requests\StoreTokoRequest;
use App\Http\Requests\UpdateTokoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'jenis_usaha' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Toko::create([
            'name' => $request->name,
            'jenis_usaha' => $request->jenis_usaha,
            'alamat' => $request->alamat,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'deskripsi' => $request->deskripsi,
            'slug' => Str::slug($request->name),
            'tgl_pendaftaran' => now(),
        ]);

        return redirect()->back()->with('message', 'Pendaftaran toko berhasil diajukan. Menunggu verifikasi admin.');
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
