<?php

namespace App\Http\Livewire\Admin\Offerwall;

use App\Models\Offerwall;
use Livewire\Component;

class OfferwallCreate extends Component
{ public ?string $display_name = null;
    public ?string $secret = null;
    public ?string $api_key = null;
    public ?int $priority = null;
    public ?int $security_risk = null;
    public int $status = 0;
    public ?string $frame_url = null;

    protected array $rules = [
        'display_name' => 'required|string|unique:offerwalls',
        'secret' => 'alpha_num|nullable',
        'api_key' => 'alpha_num|nullable',
        'priority' => 'required|integer|gte:10|lte:100',
        'security_risk' => 'required|integer|gte:0|lte:100',
        'status' => 'required|boolean',
        'frame_url' => 'string|URL|nullable',

    ];
    public function storeOfferwall(): void
    {

        $this->resetErrorBag();

        $this->validate();

        Offerwall::create([
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
    public function render()
    {
        return view('livewire.admin.offerwall.offerwall-create');
    }
}
