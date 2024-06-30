<?php

namespace App\Http\Livewire\User\Campaign;

use App\Models\Campaign;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class CampaignManager extends Component
{
    use WithPagination;

    protected $listeners = [
        'refresh-campaign-manager' => '$refresh',
    ];

    public array $campaign_statuses;

    public function mount(): void
    {
        $this->campaign_statuses = [
            'pending' => 'yellow',
            'active' => 'green',
            'inactive' => 'pink',
            'rejected' => 'red'
        ];
    }

    /**
     * @return View
     */
    public function render() : View
    {
        return view('livewire.user.campaign.campaign-manager',
             [
                'campaigns' => Campaign::with(['bannerCampaign', 'popCampaign'])
                    ->where('user_id', auth()->user()->id)
                    ->orderByDesc('id')
                    ->paginate(10),
            ]);
    }
}
