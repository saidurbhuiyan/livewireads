<?php

namespace App\Http\Livewire\User\Publisher\App;

use App\Libraries\AppClass;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AppManager extends Component
{
    use WithPagination;

    protected $listeners = [
        'refresh-app-manager' => 'mount',
    ];

    public array $domain_protocols;

    /**
     * Mount the component.
     * @return void
     */
    public function mount(): void
    {
        $this->domain_protocols = app(AppClass::class)->domainProtocols();
    }

    /**
     * Render the component.
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user.publisher.app.app-manager', [
            'app_data' => app(AppClass::class)->getUserApp(),
        ]);
    }
}
