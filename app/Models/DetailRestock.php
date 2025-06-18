<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\Restock;

class DetailRestock extends Model
{
    /** @use HasFactory<\Database\Factories\DetailRestockFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function restock()
    {
        return $this->belongsTo(Restock::class, 'restock_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
