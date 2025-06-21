<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReturSupplier;

class GambarReturSupplier extends Model
{
    /** @use HasFactory<\Database\Factories\GambarReturSupplierFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function retursupplier()
    {
        return $this->belongsTo(ReturSupplier::class, 'retursupplier_id');
    }
}
