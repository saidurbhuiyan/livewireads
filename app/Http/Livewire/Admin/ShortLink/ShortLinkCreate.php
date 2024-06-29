<?php

namespace App\Http\Livewire\Admin\ShortLink;

use App\Models\Shortlink;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ShortLinkCreate extends Component
{
    public ?string $display_name = null;
    public ?string $api_url = null;
    public ?string $api_token = null;
    public ?int $count_limit = null;
    public ?float $site_cpm = null;
    public ?float $actual_cpm = null;
    public ?int $priority = null;
    public ?int $time = null;
    public bool $is_enable = false;
    public ?string $disable_reason = null;
    public array $tag = [
        'hot' => false,
        'pop' => false,
        'adult' => false,
    ];

    /**
     * Rules for validation
     * @var array|string[]
     */
    protected array $rules = [
        'display_name' => 'required|string|unique:shortlinks',
        'api_url' => 'required|string|url',
        'api_token' => 'required|alpha_num',
        'count_limit' => 'required|integer|gt:0',
        'site_cpm' => 'required|numeric|between:0,99.99',
        'actual_cpm' => 'required|numeric|between:0,99.99',
        'priority' => 'required|integer|gte:10|lte:100',
        'time' => 'required|integer|gt:0',
        'is_enable' => 'required|boolean',
        'disable_reason' => 'string|nullable',
        'tag' => 'required|array',
        'tag.hot' => 'boolean',
        'tag.pop' => 'boolean',
        'tag.adult' => 'boolean',
    ];

    /**
     * Store shortlink
     * @return void
     */
    public function storeShortLink(): void
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
            'is_enable' => $this->is_enable,
            'disable_reason' => $this->disable_reason,
            'tag' => serialize($this->tag),
        ]);

        $this->emit('created');
    }

    /**
     * Render shortlink create
     * @return View
     */
    public function render(): View
    {
        return view('livewire.admin.shortlink.shortlink-create');
    }
}
