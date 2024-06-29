<?php

namespace App\Http\Livewire\User\Publisher\Website;

use App\Libraries\WebsiteClass;
use App\Models\Website;
use Illuminate\Contracts\View\View;
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
     * Confirm that the user wants to add a new website on modal.
     * @var bool
     */
    public bool $confirmingWebsiteAdd = false;

    /**
     * Validation rules for the component.
     * @var array|string[]
     */
    protected array $rules = [
        'protocol' => 'required|integer',
        'domain_name' => 'required|unique:websites,domain_name|domain',
        'monthly_traffic' => 'required|integer|gte:5000',
        'analytic_source' => 'required|integer|gte:0',
    ];

    /**
     * @return void
     */
    public function mount(): void
    {
        $websiteClass = app(WebsiteClass::class);
        $this->analytic_sources = $websiteClass->analyticSources();
        $this->domainProtocols = $websiteClass->domainProtocols();
    }

    /**
     * Confirm that the user wants to add a new website.
     * @return void
     */
    public function confirmingWebsiteAdd(): void
    {
        $this->confirmingWebsiteAdd = true;
    }

    /**
     * Add a new website.
     * @return void
     */
    public function addWebsite(): void
    {
        $this->resetErrorBag();
        $this->validate();

        $website = Website::create([
            "user_id" => Auth::id(),
            "is_secure" => $this->protocol,
            "domain_name" => $this->domain_name,
            "monthly_traffic" => $this->monthly_traffic,
            "analytic_source" => $this->analytic_source,
        ]);

        if ($website) {
            $this->confirmingWebsiteAdd = false;

            $this->protocol = 0;
            $this->domain_name = '';
            $this->monthly_traffic = null;
            $this->analytic_source = null;

            $this->emit('refresh-website-manager');
        }
    }

    /**
     * Render the livewire component.
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user.publisher.website.website-create');
    }
}
