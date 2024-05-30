<?php

namespace App\Libraries;

class CampaignClass
{
    public function getUserCampaign()
    {
        return SiteApp::whereHas('website', static function($query) {$query->where('user_id', Auth::id());})->with('website:id,domain_name,is_secure')->paginate(10);
    }

}
