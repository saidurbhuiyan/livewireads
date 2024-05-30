<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerOption extends Model
{
    use HasFactory;

     protected $fillable = [
        'size',
        'minimum_daily_rate',
    ];

     public function Advertisement(): \Illuminate\Database\Eloquent\Relations\BelongsTo
     {
         return $this->belongsTo(Advertisement::class,'banner_id');
     }
}
