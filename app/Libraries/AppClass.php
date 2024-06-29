<?php

namespace App\Libraries;
use App\Models\SiteApp;
use App\Models\Website;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AppClass
{

    /**
     * get user app data
     * @return mixed
     */
    public function getUserApp(): mixed
    {
        return SiteApp::whereHas('website', static function($query) {$query->where('user_id', Auth::id());})
            ->with('website:id,domain_name,is_secure')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    /**
     * get user website
     * @return mixed
     */
    public function getUserWebsite() : mixed
    {
        return Website::select('id','domain_name')
            ->where('user_id', Auth::id())
            ->get();
    }


    /**
     * get domain protocols
     * @return string[]
     */
    public function domainProtocols(): array
    {
       return [
            0 => 'http://',
            1 => 'https://',
        ];


    }

}

