<?php

namespace App\Http\Livewire\User\Campaign;

use App\Models\Campaign;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class CampaignEdit extends Component
{
    public Campaign $campaign;
    public ?string $image_path = null; // For banner campaigns
    public ?string $pop_code = null; // For pop campaigns

    protected array $rules = [
        'campaign.name' => 'required|string|max:255',
        'campaign.description' => 'nullable|string',
        'campaign.target_url' => 'required|url',
        'image_path' => 'required_if:campaign.type,banner|nullable|string',
        'pop_code' => 'required_if:campaign.type,pop|nullable|string',
    ];

    /**
     * @param Campaign $campaign
     * @return void
     */
    public function mount(Campaign $campaign): void
    {
        $this->campaign = $campaign;

        if ($campaign->type === 'banner') {
            $this->image_path = $campaign->bannerCampaign->image_path;
        } elseif ($campaign->type === 'pop') {
            $this->pop_code = $campaign->popCampaign->pop_code;
        }
    }

    /**
     * update campaign
     * @return void
     */
    public function updateCampaign() : void
    {
        $this->validate();

        $this->campaign->save();

        if ($this->campaign->type === 'banner') {
            $this->campaign->bannerCampaign->update(['image_path' => $this->image_path]);
        } elseif ($this->campaign->type === 'pop') {
            $this->campaign->popCampaign->update(['pop_code' => $this->pop_code]);
        }

        $this->emit('saved');
    }

    /**
     * @return View
     */
    public function render() : View
    {
        return view('livewire.user.campaign.campaign-edit');
    }
}
