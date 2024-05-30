<?php

namespace App\Http\Livewire\Admin\Shortlink;

use App\Libraries\ShortlinkClass;
use App\Models\Shortlink;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ShortlinkEdit extends Component
{
    public ?string $display_name = null;
    public ?string $api_url = null;
    public ?string $api_token = null;
    public ?int $count_limit = null;
    public ?float $site_cpm = null;
    public ?float $actual_cpm = null;
    public ?int $priority = null;
    public ?int $time = null;
    public int $status = 0;
    public ?string $disable_reason = null;
    public array $tag = [
        'hot' => false,
        'pop' => false,
        'adult'=> false
    ];


    protected object $shortlink_data;
    public int $shortlink_id;

    public function mount(int $id){
        $this->shortlink_id = $id;
        $this->shortlink_data = (new ShortlinkClass())->find($id);
        $this->display_name = $this->shortlink_data->display_name;
        $this->api_url = $this->shortlink_data->api_url;
        $this->api_token = $this->shortlink_data->api_token;
        $this->count_limit = $this->shortlink_data->count_limit;
        $this->site_cpm = $this->shortlink_data->site_cpm;
        $this->actual_cpm = $this->shortlink_data->actual_cpm;
        $this->priority = $this->shortlink_data->priority;
        $this->time = $this->shortlink_data->time;
        $this->status = $this->shortlink_data->status;
        $this->disable_reason = $this->shortlink_data->disable_reason;
        $this->tag = !empty($this->shortlink_data->tag)? unserialize($this->shortlink_data->tag,['allowed_classes' => false]):$this->tag;
    }

    protected function rules(){

        return[
        'display_name' => 'required|string|'.Rule::unique('shortlinks')->ignore($this->shortlink_id),
        'api_url' => 'required|string|URL',
        'api_token' => 'required|alpha_num',
        'count_limit' => 'required|integer|gt:0',
        'site_cpm' => 'required|numeric|gt:0',
        'actual_cpm' => 'required|numeric|gt:0',
        'priority' => 'required|integer|gte:10|lte:100',
        'time' => 'required|integer|gt:0',
        'status' => 'required|boolean',
        'disable_reason' => 'string|nullable',
        'tag' => 'required_array_keys:hot,pop,adult',

    ];

    }


    public function updateShortlink() : void
    {
        $this->resetErrorBag();
        $this->validate();


        Shortlink::whereId($this->shortlink_id)->update([
            'display_name' => $this->display_name,
            'api_url' => $this->api_url,
            'api_token' => $this->api_token,
            'count_limit' => $this->count_limit,
            'site_cpm' => $this->site_cpm,
            'actual_cpm' => $this->actual_cpm,
            'priority' => $this->priority,
            'time' => $this->time,
            'status' => $this->status,
            'disable_reason' => $this->disable_reason,
            'tag' => serialize($this->tag),
        ]);

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.shortlink.shortlink-edit');
    }
}
