<?php

namespace App\Http\Livewire\User\Campaign;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class CampaignCreate extends Component
{

    /**
     * @return View
     */
    public function render() : View
    {
        return view('livewire.user.campaign.campaign-create');
    }
}
