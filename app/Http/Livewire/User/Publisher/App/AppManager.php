<?php

namespace App\Http\Livewire\User\Publisher\App;

use App\Libraries\AppClass;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AppManager extends Component
{

     use WithPagination;

    /**
     * The component's listeners.
     *
     * @var array
     */

    protected $listeners = [
        'refresh-app-manager' => 'mount',
    ];

    public array $domain_protocols;

    public function mount(): void
    {

        $this->domain_protocols = (new AppClass())->domainProtocols();
    }

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.user.publisher.app.app-manager',  [
            'app_data' => (new AppClass())->getUserApp()
        ]);
    }
}
