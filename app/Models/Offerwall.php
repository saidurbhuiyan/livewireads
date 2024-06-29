<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\hasOne;

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


    public function offerwallHistories(): hasMany
    {
        return $this->hasMany(OfferwallHistory::class, 'offerwall_id');
    }
}
