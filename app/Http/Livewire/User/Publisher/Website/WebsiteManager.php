<?php

namespace App\Http\Livewire\User\Publisher\Website;

use App\Libraries\WebsiteClass;
use App\Models\Website;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class WebsiteManager extends Component
{
    use WithPagination;

    protected $listeners = [
        'refresh-website-manager' => '$refresh',
    ];

    public array $read_able_status;
    public array $domain_protocols;

    /**
     * Mount the component.
     * @return void
     */
    public function mount(): void
    {
        $websiteClass = app(WebsiteClass::class);
        $this->read_able_status = $websiteClass->ReadAbleStatus();
        $this->domain_protocols = $websiteClass->domainProtocols();
    }

    /**
     * Render the component.
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user.publisher.website.website-manager', [
            'site_data' => Website::where('user_id',Auth::id())->orderBy('id', 'desc')->paginate(10),
        ]);
    }
}
