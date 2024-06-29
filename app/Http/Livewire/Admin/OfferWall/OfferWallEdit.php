<?php

namespace App\Http\Livewire\Admin\OfferWall;

use App\Models\Offerwall;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Component;

class OfferWallEdit extends Component
{
    public ?string $display_name = null;
    public ?string $secret = null;
    public ?string $api_key = null;
    public ?int $priority = null;
    public ?int $security_risk = null;
    public int $status = 0;
    public ?string $frame_url = null;

    public int $offerWallId;
    public Offerwall $offerWallData;

    /**
     * Mount the component and initialize the data.
     *
     * @param int $id
     * @return void
     */
    public function mount(int $id): void
    {
        $this->offerWallId = $id;
        $this->offerWallData = Offerwall::findOrFail($id);
        $this->display_name = $this->offerWallData->display_name;
        $this->secret = $this->offerWallData->secret;
        $this->api_key = $this->offerWallData->api_key;
        $this->priority = $this->offerWallData->priority;
        $this->security_risk = $this->offerWallData->security_risk;
        $this->status = $this->offerWallData->status;
        $this->frame_url = $this->offerWallData->frame_url;
    }

    /**
     * Define the validation rules.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'display_name' => ['required', 'string', Rule::unique('offerwalls')->ignore($this->offerWallId)],
            'secret' => 'nullable|alpha_num',
            'api_key' => 'nullable|alpha_num',
            'priority' => 'required|integer|between:10,100',
            'security_risk' => 'required|integer|between:0,100',
            'status' => 'required|boolean',
            'frame_url' => 'nullable|string|url',
        ];
    }

    /**
     * Update the offer wall data.
     *
     * @return void
     */
    public function updateOfferWall(): void
    {
        $this->resetErrorBag();
        $this->validate();

        $this->offerWallData->update([
            'display_name' => $this->display_name,
            'secret' => $this->secret,
            'api_key' => $this->api_key,
            'priority' => $this->priority,
            'security_risk' => $this->security_risk,
            'status' => $this->status,
            'frame_url' => $this->frame_url,
        ]);

        $this->emit('saved');
    }

    /**
     * Render the component view.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.admin.offerwall.offerwall-edit');
    }
}
