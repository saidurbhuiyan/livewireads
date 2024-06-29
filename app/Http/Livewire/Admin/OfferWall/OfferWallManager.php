<?php

namespace App\Http\Livewire\Admin\OfferWall;

use App\Models\Offerwall;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class OfferWallManager extends Component
{
    use WithPagination;

    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-offer-wall-manager' => 'mount',
    ];

    /**
     * The component's state on action.
     *
     * @var bool
     */
    public bool $confirmingOfferWallDelete = false;

    public array $readableStatus = [];
    public int $offerWallId;

    /**
     * Mount the component.
     *
     * @return void
     */
    public function mount(): void
    {
        $this->readableStatus = [
            0 => ['text' => 'Enable', 'color' => 'green'],
            1 => ['text' => 'Disable', 'color' => 'red'],
        ];
    }

    /**
     * Render the offer wall manager.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.admin.offerwall.offerwall-manager', [
            'offerWallData' => Offerwall::orderByDesc('id')->paginate(10),
        ]);
    }

    /**
     * Confirm offer wall delete.
     *
     * @param int $id
     * @return void
     */
    public function confirmingOfferWallDelete(int $id): void
    {
        $this->offerWallId = $id;
        $this->confirmingOfferWallDelete = true;
    }

    /**
     * Delete offer wall.
     *
     * @param int $id
     * @return void
     */
    public function deleteOfferWall(int $id): void
    {
        Offerwall::findOrFail($id)->delete();
        $this->confirmingOfferWallDelete = false;
        $this->emit('refresh-offer-wall-manager');
    }
}
