<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlink extends Model
{
    use HasFactory;

    protected $fillable = [
        'display_name',
        'api_url',
        'api_token',
        'count_limit',
        'site_cpm',
        'actual_cpm',
        'priority',
        'time',
        'status',
        'disable_reason',
        'tag',
    ];



}
