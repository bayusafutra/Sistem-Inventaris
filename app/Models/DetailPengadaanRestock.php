<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\PengadaanRestock;

class DetailPengadaanRestock extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPengadaanRestockFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function pengadaan()
    {
        return $this->belongsTo(PengadaanRestock::class, 'pengadaan_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
