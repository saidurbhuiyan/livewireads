<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AdsHistory;
use Illuminate\Contracts\View\View;

class CampaignController extends Controller
{

    /**
     * Campaign management
     * @return View
     */
    public function show(): View
    {
        $ads_data = AdsHistory::selectRaw('count(*) as total, network_id, clicked')->where('ads_id', 5)->groupBy('network_id', 'clicked')->get();

        return view('user.campaign.show')->with('ads_data',$ads_data);
    }

    /**
     * Create new campaign
     * @return View
     */
    public function create(): View
    {

        return view('user.campaign.create' );
    }

    /**
     * Edit campaign
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('user.campaign.edit');
    }
}
