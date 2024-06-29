<?php

namespace App\Http\Livewire\User\Campaign;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class CampaignEdit extends Component
{

    /**
     * @return View
     */
    public function render() : View
    {
        return view('livewire.user.campaign.campaign-edit');
    }
}
