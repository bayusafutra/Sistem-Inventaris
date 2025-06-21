<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Toko;
use App\Models\User;
use App\Models\Restock;
use App\Models\DetailReturSupplier;
use App\Models\GambarReturSupplier;

class ReturSupplier extends Model
{
    /** @use HasFactory<\Database\Factories\ReturSupplierFactory> */
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

    public function restock()
    {
        return $this->belongsTo(Restock::class, 'restock_id');
    }

    public function detailretursupplier()
    {
        return $this->hasMany(DetailReturSupplier::class, 'retursupplier_id');
    }

    public function gambar()
    {
        return $this->hasMany(GambarReturSupplier::class, 'retursupplier_id');
    }
}
