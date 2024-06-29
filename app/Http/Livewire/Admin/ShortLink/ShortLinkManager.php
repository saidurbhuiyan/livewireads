<?php

namespace App\Http\Livewire\Admin\ShortLink;

use App\Models\Shortlink;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShortLinkManager extends Component
{
    use WithPagination;

    public bool $confirmingShortLinkDelete = false;
    public array $readable_status;
    public int $short_link_id;

    protected $listeners = [
        'refresh-short-link-manager' => 'mount',
    ];

    /**
     * Render the component.
     * @return View
     */
    public function render(): View
    {
        return view('livewire.admin.shortlink.shortlink-manager', [
            'short_link_data' => Shortlink::orderByDesc('id')->paginate(10),
        ]);
    }

    /**
     * Confirming short link delete Modal.
     * @param int $id
     * @return void
     */
    public function confirmingShortLinkDelete(int $id): void
    {
        $this->short_link_id = $id;
        $this->confirmingShortLinkDelete = true;
    }

    /**
     * Delete short link.
     * @param int $id
     * @return void
     */
    public function deleteShortLink(int $id): void
    {
        Shortlink::where('id', $id)->delete();
        $this->confirmingShortLinkDelete = false;
        $this->emit('refresh-short-link-manager');
    }
}
