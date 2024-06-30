<?php

namespace App\Http\Livewire\User\Campaign;

use App\Models\Campaign;
use App\Models\Shortlink;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CampaignDashboardStatistics extends Component
{
    public array $bannerStats = [];
    public array $popStats = [];

    /**
     * @return void
     */
    public function mount(): void
    {
        $campaigns = Campaign::select('status', 'type', DB::raw('count(*) as total'))
            ->groupBy('status', 'type')
            ->get();

        $banner = $campaigns->where('type', 'banner');
        $this->bannerStats = [
            'active' => $banner->where('status', 'active')->first()->total ?? 0,
            'inactive' => $banner->where('status', 'inactive')->first()->total ?? 0,
            'pending' => $banner->where('status', 'pending')->first()->total ?? 0,
            'rejected' => $banner->where('status', 'rejected')->first()->total ?? 0,
        ];

        $pop = $campaigns->where('type', 'pop');
        $this->popStats = [
            'active' => $pop->where('status', 'active')->first()->total ?? 0,
            'inactive' => $pop->where('status', 'inactive')->first()->total ?? 0,
            'pending' => $pop->where('status', 'pending')->first()->total ?? 0,
            'rejected' => $pop->where('status', 'rejected')->first()->total ?? 0,
        ];
    }

    /**
     * Render the component.
     * @return View
     */
    public function render() : View
    {

        return view('livewire.user.campaign.campaign-dashboard-statistics');
    }



}
