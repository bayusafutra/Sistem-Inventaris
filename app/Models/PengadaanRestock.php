<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\User;
use App\Models\DetailPengadaanRestock;

class PengadaanRestock extends Model
{
    /** @use HasFactory<\Database\Factories\PengadaanRestockFactory> */
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

    public function detailpengadaan()
    {
        return $this->hasMany(DetailPengadaanRestock::class, 'pengadaan_id');
    }

    public function restock()
    {
        return $this->hasOne(Restock::class, 'pengadaan_id');
    }
}
