<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;
use App\Models\ReturSupplier;

class DetailReturSupplier extends Model
{
    /** @use HasFactory<\Database\Factories\DetailReturSupplierFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function retursupplier()
    {
        return $this->belongsTo(ReturSupplier::class, 'retursupplier_id');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
