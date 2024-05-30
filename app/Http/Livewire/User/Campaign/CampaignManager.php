<?php

namespace App\Http\Livewire\User\Campaign;

use Livewire\Component;
use Livewire\WithPagination;

class CampaignManager extends Component
{
    use withPagination;

    public function render()
    {
        return view('livewire.user.campaign.campaign-manager');
    }
}
