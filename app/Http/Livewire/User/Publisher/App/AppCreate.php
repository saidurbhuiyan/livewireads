<?php

namespace App\Http\Livewire\User\Publisher\App;

use App\Libraries\AppClass;
use App\Models\SiteApp;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;

class AppCreate extends Component
{
    public int $site_name = 0;
    public ?string $currency_name = null;
    public ?float $conversion_rate = null;
    public bool $allow_decimal = false;
    public ?string $postback_url = null;
    public string $secret_key;
    public object $site_name_data;

    /**
     * @throws \Exception
     */
    public function mount(){
        $this->secret_key = bin2hex(random_bytes(20));
        $this->site_name_data = (new AppClass())->getUserWebsite();
    }

    /**
     * @throws \Exception
     */

     protected function rules(): array
    {
        return [
            'site_name' => 'required|integer|unique:site_apps,site_id|exists:websites,id,user_id,'.Auth::id(),
            'currency_name' => 'required|string',
            'conversion_rate' => 'required|numeric|gt:0',
            'postback_url' => 'required|URL',
            'allow_decimal' => 'required|boolean',
        ];
    }

    public function storeApp(){

        $this->resetErrorBag();
        $this->validate();


        SiteApp::create([
            'site_id' => $this->site_name,
            'currency_name' => $this->currency_name,
            'conversion_rate' => $this->conversion_rate,
            'allow_decimal' => $this->allow_decimal,
            'postback_url' => $this->postback_url,
            'private_key' => $this->secret_key,
            'public_key' => bin2hex(random_bytes(15)),
        ]);

        $this->secret_key = bin2hex(random_bytes(20));

        $this->emit('saved');


    }


    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Auth\Access\Response|bool|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.user.publisher.app.app-create');
    }
}
