<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReturKonsumen;

class GambarReturKonsumen extends Model
{
    /** @use HasFactory<\Database\Factories\GambarReturKonsumenFactory> */
    use HasFactory;
    protected $guarded = ['id'];

    public function returkonsumen()
    {
        return $this->belongsTo(ReturKonsumen::class, 'returkonsumen_id');
    }
}
