<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip','asn','proxy_score','country','isp','expired'
    ];


    public function network_users(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(NetworkUser::class,'network_id');
    }
    public function ads_history(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(AdsHistory::class,'network_id');
    }
    public function network_user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(NetworkUser::class,'network_id');
    }

    public function logins(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(LoginHistory::class,'network_id');
    }
    public function login(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(LoginHistory::class,'network_id');
    }


    public function scopeIp($query, $ip)
    {
        return $query->whereRaw('LOWER(ip) LIKE \'%'.$ip.'%\'');
    }
}
