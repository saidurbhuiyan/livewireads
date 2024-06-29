<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Advertisement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ptc_id',
        'banner_id',
        'title',
        'description',
        'url',
        'time',
        'geo_filter',
        'target_geo',
        'banner_path',
        'daily_rate',
        'days_view',
        'days_viewed',
        'click',
        'cpm',
        'views',
        'viewed',
        'active',
        'new_tab',
        'status',
    ];

    public function ptc(): BelongsTo
    {
        return $this->belongsTo(PtcOption::class, 'ptc_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function banner(): BelongsTo
    {
        return $this->belongsTo(BannerOption::class,'banner_id');
    }
    public function ads(): HasOne
    {

        return $this->hasOne(AdsHistory::class,'ads_id');
    }

}
