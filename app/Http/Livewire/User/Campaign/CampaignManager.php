<?php

namespace App\Http\Livewire\User\Campaign;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CampaignManager extends Component
{
    use withPagination;

    /**
     * @return View
     */
    public function render() : View
    {
        return view('livewire.user.campaign.campaign-manager');
    }
}
