<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteApp extends Model
{
    use HasFactory;


    protected $fillable = [
        'site_id',
        'public_key',
        'private_key',
        'currency_name',
        'conversion_rate',
        'allow_decimal',
        'postback_url',
    ];

    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class,'site_id');
    }

}
