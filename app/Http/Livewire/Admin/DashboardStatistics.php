<?php

namespace App\Http\Livewire\Admin;

use App\Models\Offerwall;
use App\Models\Shortlink;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use JsonException;
use Livewire\Component;

class DashboardStatistics extends Component
{

    /**
     * Render the component.
     * @return View
     */
    public function render() : View
{
    $shortLinkStats = $this->getShortLinkStats();
    $offerWallStats = $this->getOfferWallStats();

    return view('livewire.admin.dashboard-statistics', compact('shortLinkStats', 'offerWallStats'));
}

    /**
     * Get short link stats.
     * @return object
     */
    private function getShortLinkStats(): object
    {
        $shortLinks = Shortlink::select('status', DB::raw('count(*) as total'))->groupBy('status')->get();

        $total = $shortLinks->sum('total');
        $active = $shortLinks->where('status', 1)->sum('total');
        $inactive = $shortLinks->where('status', 0)->sum('total');

        return (object)['total'=> $total, 'active' => $active, 'inactive' => $inactive];
    }

    /**
     * Get offer wall stats.
     * @return object
     */
    private function getOfferWallStats(): object
    {
        $offerWalls = Offerwall::select('status', DB::raw('count(*) as total'))->groupBy('status')->get();

        $total = $offerWalls->sum('total');
        $active = $offerWalls->where('status', 1)->sum('total');
        $inactive = $offerWalls->where('status', 0)->sum('total');

        return (object)['total'=> $total, 'active' => $active, 'inactive' => $inactive];
    }

}
