<?php

namespace App\Http\Livewire\User\Publisher\App;

use App\Libraries\AppClass;
use App\Models\SiteApp;
use Livewire\Component;

class AppEdit extends Component
{
    public array $state = [
        'currency_name' => '',
        'conversion_rate' => '',
        'allow_decimal' => 0,
        'postback_url' => '',
    ];
    public int $site_name;
    public ?string $currency_name = null;
    public ?float $conversion_rate = null;
    public bool $allow_decimal = false;
    public ?string $postback_url = null;
    public string $domain_name;
    public string $secret_key;

    protected array $rules = [
        'currency_name' => 'required|string',
        'conversion_rate' => 'required|numeric|gt:0',
        'postback_url' => 'required|URL',
        'allow_decimal' => 'required|boolean',

    ];

    protected object $site_data;
    public int $app_id;

    public function mount(int $id): void
    {
        $this->app_id = $id;
        $this->site_data = (new AppClass())->find($id);
        $this->currency_name = $this->site_data->currency_name;
        $this->conversion_rate = $this->site_data->conversion_rate;
        $this->allow_decimal = $this->site_data->allow_decimal;
        $this->postback_url = $this->site_data->postback_url;
        $this->site_name =  $this->site_data->site_id;
        $this->domain_name = $this->site_data->website->domain_name;
        $this->secret_key = $this->site_data->private_key;

    }

    public function updateApp(){

        $this->resetErrorBag();
        $this->validate();


       SiteApp::whereId($this->app_id)->update([
            'currency_name' => $this->currency_name,
            'conversion_rate' => $this->conversion_rate,
            'allow_decimal' => $this->allow_decimal,
            'postback_url' => $this->postback_url,
        ]);

       $this->emit('saved');


    }


    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.user.publisher.app.app-edit');
    }
}
