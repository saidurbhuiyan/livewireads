<?php

namespace App\Http\Livewire\User\Publisher;

use App\Libraries\WebsiteClass;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserDashboardStatistics extends Component
{

    /**
     * Render the view
     * @return View
     */
    public function render(): View
    {
        // Fetch user-specific data (e.g., websites) and calculate statistics

         // Assuming user is authenticated
        $readableStatus = app(WebsiteClass::class)->ReadAbleStatus();
        $websiteStats = Auth::user()
            ->websites()
            ->select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get()
            ->map(function ($item) use ($readableStatus) {
                $item->status = $readableStatus[$item->status]['text'];
                return $item;
            })
            ->pluck('total', 'status')
            ->toArray();

        $appStats = Auth::user()
            ->websites()
            ->withCount('apps')
            ->get()
            ->sum('apps_count');

        return view('livewire.user.publisher.user-dashboard-statistics',
             [
                'websiteStats' => $websiteStats,
                'appStats' => $appStats
            ]);
    }
}
