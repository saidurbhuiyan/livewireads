<?php

namespace App\Http\Livewire\Admin\ShortLink;

use App\Models\Shortlink;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Livewire\Component;

class ShortLinkEdit extends Component
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
        'adult' => false,
    ];

    protected object $short_link_data;
    public int $short_link_id;

    /**
     * @param int $id
     * @return void
     */
    public function mount(int $id): void
    {
        $this->short_link_id = $id;
        $this->short_link_data = Shortlink::find($id);
        $this->display_name = $this->short_link_data->display_name;
        $this->api_url = $this->short_link_data->api_url;
        $this->api_token = $this->short_link_data->api_token;
        $this->count_limit = $this->short_link_data->count_limit;
        $this->site_cpm = $this->short_link_data->site_cpm;
        $this->actual_cpm = $this->short_link_data->actual_cpm;
        $this->priority = $this->short_link_data->priority;
        $this->time = $this->short_link_data->time;
        $this->status = $this->short_link_data->status;
        $this->disable_reason = $this->short_link_data->disable_reason;
        $this->tag = !empty($this->short_link_data->tag) ? unserialize($this->short_link_data->tag, ['allowed_classes' => false]) : $this->tag;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    protected function rules(): array
    {
        return [
            'display_name' => [
                'required',
                'string',
                Rule::unique('shortlinks')->ignore($this->short_link_id),
            ],
            'api_url' => 'required|string|url',
            'api_token' => 'required|alpha_num',
            'count_limit' => 'required|integer|gt:0',
            'site_cpm' => 'required|numeric|gt:0',
            'actual_cpm' => 'required|numeric|gt:0',
            'priority' => 'required|integer|gte:10|lte:100',
            'time' => 'required|integer|gt:0',
            'status' => 'required|boolean',
            'disable_reason' => 'nullable|string',
            'tag.hot' => 'nullable|boolean',
            'tag.pop' => 'nullable|boolean',
            'tag.adult' => 'nullable|boolean',
        ];
    }

    /**
     * Update short link.
     * @return void
     */
    public function updateShortLink(): void
    {
        $this->resetErrorBag();
        $this->validate();

        Shortlink::where('id', $this->short_link_id)->update([
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

    /**
     * @return View
     */
    public function render() : View
    {
        return view('livewire.admin.shortlink.shortlink-edit');
    }
}
