<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function site_app(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SiteApp::class, 'site_app_id');
    }
    public function offerwall(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Offerwall::class,'offerwall_id');
    }
    public function network(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Network::class,'network_id');
    }
}
