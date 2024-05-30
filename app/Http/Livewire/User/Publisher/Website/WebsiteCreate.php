<?php

namespace App\Http\Livewire\User\Publisher\Website;

use App\Libraries\WebsiteClass;
use App\Models\Website;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WebsiteCreate extends Component
{


    public int $protocol = 0;
    public ?string $domain_name = null;
    public ?int $monthly_traffic = null;
    public ?int $analytic_source = null;
    public array $analytic_sources;
    public array $domainProtocols;

    /**
     *
     * @var bool
     */
    public bool $confirmingWebsiteAdd = false;

    protected array $rules = [
        'protocol' => 'required|integer',
        'domain_name' => 'required|unique:websites,domain_name|domain',
        'monthly_traffic' => 'required|integer|gte:5000',
        'analytic_source' => 'required|integer|gte:0',

    ];



    public function mount(){
        $website_class = new WebsiteClass();
        $this->analytic_sources = $website_class->analyticSources();
        $this->domainProtocols = $website_class->domainProtocols();
    }


    public function confirmingWebsiteAdd():void
    {
        $this->confirmingWebsiteAdd = true;
    }

    public function addWebsite()
    {
        $this->resetErrorBag();
        $this->validate();

       $website = Website::create(
            [
                "user_id" => Auth::id(),
                "is_secure" => $this->protocol,
                "domain_name" => $this->domain_name,
                "monthly_traffic"=>$this->monthly_traffic,
                "analytic_source"=>$this->analytic_source,
            ]
        );

       if ($website){
           $this->confirmingWebsiteAdd = false;

           $this->state = [
               'protocol' => 0,
               'domain_name' => '',
               'monthly_traffic' => '',
               'analytic_source' => '',
           ];

           $this->emit('saved');

           $this->emit('refresh-website-manager');
       }

    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.user.publisher.website.website-create');
    }
}
