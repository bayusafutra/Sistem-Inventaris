<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\Produk;

class SatuanProduk extends Model
{
    /** @use HasFactory<\Database\Factories\SatuanProdukFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'satuan_id');
    }
}
