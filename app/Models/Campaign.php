<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'type', 'name', 'description', 'target_url', 'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function bannerCampaign(): HasOne
    {
        return $this->hasOne(BannerCampaign::class);
    }

    public function popCampaign(): HasOne
    {
        return $this->hasOne(PopCampaign::class);
    }


}
