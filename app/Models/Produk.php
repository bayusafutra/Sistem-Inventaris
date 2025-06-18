<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\SatuanProduk;
use App\Models\DetailPengadaanRestock;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }

    public function satuan()
    {
        return $this->belongsTo(SatuanProduk::class, 'satuan_id');
    }

    public function detailpengadaan()
    {
        return $this->hasMany(DetailPengadaanRestock::class, 'produk_id');
    }
}
