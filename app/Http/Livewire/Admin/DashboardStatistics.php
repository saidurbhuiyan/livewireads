<?php

namespace App\Http\Livewire\Admin;

use App\Models\Offerwall;
use App\Models\Shortlink;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
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
        $shortLinks = Shortlink::select('is_enable', DB::raw('count(*) as total'))->groupBy('is_enable')->get();

        $total = $shortLinks->sum('total');
        $active = $shortLinks->where('is_enable', true)->sum('total');
        $inactive = $shortLinks->where('is_enable', false)->sum('total');

        return (object)['total'=> $total, 'active' => $active, 'inactive' => $inactive];
    }

    /**
     * Get offer wall stats.
     * @return object
     */
    private function getOfferWallStats(): object
    {
        $offerWalls = Offerwall::select('is_enable', DB::raw('count(*) as total'))->groupBy('is_enable')->get();

        $total = $offerWalls->sum('total');
        $active = $offerWalls->where('is_enable', true)->sum('total');
        $inactive = $offerWalls->where('is_enable', false)->sum('total');

        return (object)['total'=> $total, 'active' => $active, 'inactive' => $inactive];
    }

}
