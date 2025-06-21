<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\ReturKonsumen;

class DetailReturKonsumen extends Model
{
    /** @use HasFactory<\Database\Factories\DetailReturKonsumenFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function returkonsumen()
    {
        return $this->belongsTo(ReturKonsumen::class, 'returkonsumen_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
