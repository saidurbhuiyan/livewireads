<?php

namespace App\Http\Livewire\User\Publisher\App;

use App\Libraries\AppClass;
use App\Models\SiteApp;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
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
     * Initialize component state and generate secret key.
     *
     * @throws Exception
     */
    public function mount(): void
    {
        $this->secret_key = bin2hex(random_bytes(20));
        $this->site_name_data = app(AppClass::class)->getUserWebsite();
    }

    /**
     * Validation rules for form fields.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [
            'site_name' => 'required|integer|unique:site_apps,site_id|exists:websites,id,user_id,'.Auth::id(),
            'currency_name' => 'required|string',
            'conversion_rate' => 'required|numeric|gt:0',
            'postback_url' => 'required|url',
            'allow_decimal' => 'required|boolean',
        ];
    }

    /**
     * Store the app data after validation.
     *
     * @throws Exception
     */
    public function storeApp(): void
    {
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

        // Generate a new secret key for security reasons
        $this->secret_key = bin2hex(random_bytes(20));

        // Emit event to notify successful save
        $this->emit('created');
    }

    /**
     * Render the Livewire component.
     *
     * @return View
     */
    public function render(): View
    {
        return view('livewire.user.publisher.app.app-create');
    }
}
