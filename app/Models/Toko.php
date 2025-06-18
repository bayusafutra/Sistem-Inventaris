<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\SatuanProduk;
use App\Models\Produk;
use App\Models\PengadaanRestock;

class Toko extends Model
{
    /** @use HasFactory<\Database\Factories\TokoFactory> */
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class, 'toko_id');
    }

    public function satuanproduk()
    {
        return $this->hasMany(SatuanProduk::class, 'toko_id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'toko_id');
    }

    public function pengadaan()
    {
        return $this->hasMany(PengadaanRestock::class, 'toko_id');
    }
}
