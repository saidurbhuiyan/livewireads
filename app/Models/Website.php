<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Website extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'is_secure',
        'domain_name',
        'monthly_traffic',
        'analytic_source',
        'category',
        'disable_category',
        'verification_code',
        'domain_verified_at',
        'status',
    ];



    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function app(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(SiteApp::class,'site_id');
    }

    public function apps(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SiteApp::class,'site_id');
    }

    public function shortwall(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Shortlink::class, 'shortwall_id');
    }
}
