<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AdsHistory;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function show(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {
        $ads_data = AdsHistory::selectRaw('count(*) as total, network_id, clicked')->where('ads_id', 5)->groupBy('network_id', 'clicked')->get();
        return view('user.campaign.show')->with('ads_data',$ads_data);
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {

        return view('user.campaign.create' );
    }


    public function edit(int $id): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {
        return view('user.campaign.edit');
    }
}
