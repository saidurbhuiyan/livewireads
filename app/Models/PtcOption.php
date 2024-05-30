<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PtcOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'timer',
        'ppv',
        'reward',
        'min_view'
    ];

    public function Advertisement(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Advertisement::class,'ptc_id');
    }
}
