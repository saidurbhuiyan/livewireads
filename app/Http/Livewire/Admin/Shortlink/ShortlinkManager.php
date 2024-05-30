<?php

namespace App\Http\Livewire\Admin\Shortlink;


use App\Libraries\ShortlinkClass;
use Livewire\Component;
use Livewire\WithPagination;

class ShortlinkManager extends Component
{
    use WithPagination;

    /**
     * The component's listeners.
     *
     * @var array
     */

    protected $listeners = [
        'refresh-shortlink-manager' => 'mount',
    ];

    /**
     *
     * @var bool
     */
    public bool $confirmingShortlinkDelete = false;

    public array $readable_status;
    public int $shortlink_id;

    public function mount(): void
    {

        $this->readable_status = (new ShortlinkClass())->readAbleStatus();
    }


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.shortlink.shortlink-manager',[
            'shortlink_data' => (new ShortlinkClass())->getAll(),
        ]);
    }

    public function confirmingShortlinkDelete(int $id) : void
    {
        $this->shortlink_id = $id;

        $this->confirmingShortlinkDelete = true;
    }

    public function deleteShortlink(int $id) : void
    {

        (new ShortlinkClass())->delete($id);
        $this->confirmingShortlinkDelete = false;
        $this->emit('refresh-shortlink-manager');
    }


}
