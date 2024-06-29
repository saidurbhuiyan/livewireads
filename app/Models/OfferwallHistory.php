<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfferwallHistory extends Model
{
    protected $fillable = [
        'site_app_id',
        'offerwall_id',
        'network_id',
        'sub_id',
        'unique_id',
        'offer_name',
        'usd_amount',
        'currency_amount',
        'status',
    ];

    public function siteApp(): BelongsTo
    {
        return $this->belongsTo(SiteApp::class, 'site_app_id');
    }
    public function offerwall(): BelongsTo
    {
        return $this->belongsTo(Offerwall::class,'offerwall_id');
    }
    public function network(): BelongsTo
    {
        return $this->belongsTo(Network::class,'network_id');
    }
}
