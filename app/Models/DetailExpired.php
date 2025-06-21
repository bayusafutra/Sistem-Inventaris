<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\Expired;

class DetailExpired extends Model
{
    /** @use HasFactory<\Database\Factories\DetailExpiredFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function expired()
    {
        return $this->belongsTo(Expired::class, 'expired_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
