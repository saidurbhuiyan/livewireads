<?php

namespace App\Libraries;
use App\Models\SiteApp;
use App\Models\Website;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class AppClass
{
    public function getUserApp()
    {
        return SiteApp::whereHas('website', static function($query) {$query->where('user_id', Auth::id());})->with('website:id,domain_name,is_secure')->paginate(10);
    }

    public function find(int $id): object
    {
        return SiteApp::with('website:id,domain_name,is_secure')->find($id);
    }

    public function getUserWebsite() : object
    {
        return Website::select('id','domain_name')->where('user_id', Auth::id())->get();
    }



    public function domainProtocols(): array
    {
       return [
            0 => 'http://',
            1 => 'https://',
        ];


    }

}

