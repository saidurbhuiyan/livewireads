<?php

namespace App\Http\Livewire\Admin\Shortlink;

use App\Models\Shortlink;
use Livewire\Component;

class ShortlinkCreate extends Component
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

    protected array $rules = [
        'display_name' => 'required|string|unique:Shortlinks',
        'api_url' => 'required|string|URL',
        'api_token' => 'required|alpha_num',
        'count_limit' => 'required|integer|gt:0',
        'site_cpm' => 'required|numeric|between:0,99.99',
        'actual_cpm' => 'required|numeric|between:0,99.99',
        'priority' => 'required|integer|gte:10|lte:100',
        'time' => 'required|integer|gt:0',
        'status' => 'required|boolean',
        'disable_reason' => 'string|nullable',
        'tag' => 'required_array_keys:hot,pop,adult',

    ];



    public function storeShortlink(): void
    {

        $this->resetErrorBag();

        $this->validate();

       Shortlink::create([
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
    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.shortlink.shortlink-create');
    }
}
