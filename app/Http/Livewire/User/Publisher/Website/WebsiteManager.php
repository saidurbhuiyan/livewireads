<?php

namespace App\Http\Livewire\User\Publisher\Website;

use App\Libraries\WebsiteClass;
use Livewire\Component;
use Livewire\WithPagination;

class WebsiteManager extends Component
{
    use WithPagination;
    /**
     * The component's listeners.
     *
     * @var array
     */

    protected $listeners = [
        'refresh-website-manager' => '$refresh',
    ];

    public array $read_able_status;
    public array $domain_protocols;
    public array $is_verified;

    public function mount(){
        $website = new WebsiteClass();
        $this->read_able_status = $website->ReadAbleStatus();
        $this->domain_protocols = $website->domainProtocols();
        $this->is_verified = $website->isVerified();
    }


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.user.publisher.website.website-manager',[
            'site_data' => (new WebsiteClass())->getAll()
        ]);
    }
}
