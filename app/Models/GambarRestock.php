<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restock;

class GambarRestock extends Model
{
    /** @use HasFactory<\Database\Factories\GambarRestockFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function restock()
    {
        return $this->belongsTo(Restock::class, 'restock_id');
    }
}
