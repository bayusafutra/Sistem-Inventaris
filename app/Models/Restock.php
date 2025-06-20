<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\User;
use App\Models\DetailRestock;
use App\Models\GambarRestock;

class Restock extends Model
{
    /** @use HasFactory<\Database\Factories\RestockFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pengadaan()
    {
        return $this->belongsTo(PengadaanRestock::class, 'pengadaan_id');
    }

    public function detailrestock()
    {
        return $this->hasMany(DetailRestock::class, 'restock_id');
    }

    public function gambar()
    {
        return $this->hasMany(GambarRestock::class, 'restock_id');
    }
}
