<?php

namespace App\Http\Livewire\Admin\Offerwall;


use App\Libraries\OfferwallClass;
use Livewire\Component;
use Livewire\WithPagination;

class OfferwallManager extends Component
{
    use WithPagination;
    /**
     * The component's listeners.
     *
     * @var array
     */

    protected $listeners = [
        'refresh-offerwall-manager' => 'mount',
    ];

    /**
     *
     * @var bool
     */
    public bool $confirmingOfferwallDelete = false;

    public array $readable_status;
    public int $offerwall_id;

    public function mount(): void
    {
        $this->readable_status = (new OfferwallClass())->readAbleStatus();
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.offerwall.offerwall-manager',[
            'offerwall_data'=>(new OfferwallClass())->getAll()
        ]);
    }

    public function confirmingOfferwallDelete(int $id) : void
    {
        $this->offerwall_id = $id;

        $this->confirmingOfferwallDelete = true;
    }

    public function deleteOfferwall(int $id) : void
    {

        (new OfferwallClass())->delete($id);
        $this->confirmingOfferwallDelete = false;
        $this->emit('refresh-offerwall-manager');
    }
}
