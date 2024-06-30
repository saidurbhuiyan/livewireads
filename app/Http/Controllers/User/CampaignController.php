<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Contracts\View\View;

class CampaignController extends Controller
{

    /**
     * Campaign management
     * @return View
     */
    public function show(): View
    {
        return view('user.campaign.show');
    }


    /**
     * Edit campaign
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        $campaign = Campaign::with(['bannerCampaign', 'popCampaign'])
            ->where('user_id', auth()->user()->id)
            ->find($id);
        return view('user.campaign.edit', compact('campaign'));
    }
}
