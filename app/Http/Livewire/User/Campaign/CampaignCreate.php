<?php

namespace App\Http\Livewire\User\Campaign;

use App\Models\BannerCampaign;
use App\Models\Campaign;
use App\Models\Banner;
use App\Models\PopCampaign;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CampaignCreate extends Component
{
    public string $type = 'banner'; // Default campaign type
    public ?string $name = null;
    public ?string $description = null;
    public ?string $target_url = null;
    public ?string $image_path = null; // For banner campaigns
    public ?string $pop_code = null; // For pop campaigns
    public bool $confirmingCampaignAdd = false;

    /**
     * validation rules
     * @var array|string[]
     */
    protected array $rules = [
        'type' => 'required|string',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'target_url' => 'required|url',
        'image_path' => 'required_if:type,banner|nullable|string',
        'pop_code' => 'required_if:type,pop|nullable|string',
    ];

    /**
     * Create a new campaign.
     * @return void
     */
    public function createCampaign(): void
    {
        $this->validate();

        $campaign = Campaign::create([
            'user_id' => Auth::id(),
            'type' => $this->type,
            'name' => $this->name,
            'description' => $this->description,
            'target_url' => $this->target_url,
        ]);

        if ($this->type === 'banner') {
            BannerCampaign::create([
                'campaign_id' => $campaign->id,
                'image_path' => $this->image_path,
            ]);
        } elseif ($this->type === 'pop') {
            PopCampaign::create([
                'campaign_id' => $campaign->id,
                'pop_code' => $this->pop_code,
            ]);
        }

        $this->reset();
        $this->emit('refresh-campaign-manager');
    }

    /**
     * @return View
     */
    public function render() : View
    {
        return view('livewire.user.campaign.campaign-create');
    }
}
