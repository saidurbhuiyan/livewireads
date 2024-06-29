<?php

namespace App\Libraries;

use App\Models\SiteApp;
use Illuminate\Support\Facades\Auth;

class CampaignClass
{
    public function getUserCampaign()
    {
        return SiteApp::whereHas('website', static function($query) {$query->where('user_id', Auth::id());})->with('website:id,domain_name,is_secure')->paginate(10);
    }

}
