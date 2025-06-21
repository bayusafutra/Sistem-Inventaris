<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\User;
use App\Models\Penjualan;
use App\Models\DetailReturKonsumen;
use App\Models\GambarReturKonsumen;

class ReturKonsumen extends Model
{
    /** @use HasFactory<\Database\Factories\ReturKonsumenFactory> */
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

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }

    public function detailreturkonsumen()
    {
        return $this->hasMany(DetailReturKonsumen::class, 'returkonsumen_id');
    }

    public function gambar()
    {
        return $this->hasMany(GambarReturKonsumen::class, 'returkonsumen_id');
    }
}
