<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offerwall extends Model
{
    use HasFactory;

    protected $fillable = [
        'display_name',
        'secret',
        'api_key',
        'priority',
        'security_risk',
        'frame_url',
        'status',
    ];

    public function offerwall_history(): \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne(OfferwallHistory::class, 'offerwall_id');
    }

    public function offerwall_historys(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(OfferwallHistory::class, 'offerwall_id');
    }
}
