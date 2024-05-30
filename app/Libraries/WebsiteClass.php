<?php

namespace App\Libraries;

use App\Models\Website;
use Illuminate\Support\Facades\Auth;

class WebsiteClass
{


    public function getAll(): object
    {
        return Website::where('user_id',Auth::id())->paginate(10);
    }


    public function ReadAbleStatus(): array
    {
        return [
            0 => ['text' => 'pending', 'color'=>'yellow'],
            1 => ['text' => 'active', 'color'=>'green'],
            2 => ['text' => 'inactive', 'color'=>'pink'],
            3 => ['text' => 'rejected', 'color'=>'red']
        ];

    }

    public function isVerified(): array
    {
       return [
            0 => ['text' => 'verified', 'color'=>'green'],
            1 => ['text' => 'not verified', 'color'=>'red'],
        ];


    }

    public function analyticSources(): array
    {
        return [
            0 =>'Similar Web',
            1 => 'Google Analytics',
            2 => 'Yandex Metrics',
            3 => 'Other'
        ];

    }

    public function domainProtocols(): array
    {
        return[
            0 => 'http://',
            1 => 'https://',
        ];

    }


}
