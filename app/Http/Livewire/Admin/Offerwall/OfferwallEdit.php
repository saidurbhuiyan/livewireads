<?php

namespace App\Http\Livewire\Admin\Offerwall;

use App\Libraries\OfferwallClass;
use App\Models\Offerwall;
use Illuminate\Validation\Rule;
use Livewire\Component;

class OfferwallEdit extends Component
{
    public ?string $display_name = null;
    public ?string $secret = null;
    public ?string $api_key = null;
    public ?int $priority = null;
    public ?int $security_risk = null;
    public int $status = 0;
    public ?string $frame_url = null;


    protected object $offerwall_data;
    public int $offerwall_id;

    public function mount(int $id){
        $this->offerwall_id = $id;
        $this->offerwall_data = (new OfferwallClass())->find($id);
        $this->display_name = $this->offerwall_data->display_name;
        $this->secret = $this->offerwall_data->secret;
        $this->api_key = $this->offerwall_data->api_key;
        $this->priority = $this->offerwall_data->priority;
        $this->security_risk = $this->offerwall_data->security_risk;
        $this->status = $this->offerwall_data->status;
        $this->frame_url = $this->offerwall_data->frame_url;

    }

    protected function rules(){

        return[
            'display_name' => 'required|string|'.Rule::unique('offerwalls')->ignore($this->offerwall_id),
            'secret' => 'alpha_num|nullable',
            'api_key' => 'alpha_num|nullable',
            'priority' => 'required|integer|gte:10|lte:100',
            'security_risk' => 'required|integer|gte:0|lte:100',
            'status' => 'required|boolean',
            'frame_url' => 'string|URL|nullable',

        ];

    }


    public function updateOfferwall() : void
    {
        $this->resetErrorBag();
        $this->validate();


        Offerwall::whereId($this->offerwall_id)->update([
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
        return view('livewire.admin.offerwall.offerwall-edit');
    }
}
