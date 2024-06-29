<div>
    <x-jet-form-section submit="storeApp">
        <x-slot name="title">
            {{ __('Add Apps') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Add your Apps.') }}
        </x-slot>

        <x-slot name="form">
            <!-- Site Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="site_name" value="{{ __('Site Name') }}" />
                <select id="site_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 block w-full px-3 py-3 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200 mt-1" wire:model.defer="site_name" required>
                    <option selected disabled>Choose Option</option>
                    @foreach($site_name_data as $site)
                    <option value="{{ $site->id }}" wire:key="{{ $site->id }}">{{ $site->domain_name }}</option>
                    @endforeach
                </select>
                <x-jet-input-error for="site_name" class="mt-2" />
            </div>

            <!-- Currency name -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="currency_name" value="{{ __('Currency Name') }}" />
                <x-jet-input id="currency_name" type="text" class="mt-1 block w-full" wire:model.defer="currency_name" autocomplete="currency_name" required />
                <x-jet-input-error for="currency_name" class="mt-2" />
            </div>

            <!-- Conversion rate -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="conversion_rate" value="{{ __('Conversion Rate') }}" />
                <x-jet-input id="conversion_rate" type="number" step="0.01" class="mt-1 block w-full" wire:model.defer="conversion_rate" autocomplete="conversion_rate" required />
                <x-jet-input-error for="conversion_rate" class="mt-2" />
            </div>

            <!-- Decimal allow -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <label for="allow_decimal" class="relative inline-flex items-center mb-4 cursor-pointer">
                    <input type="checkbox" id="allow_decimal" class="sr-only peer" wire:model.defer="allow_decimal" autocomplete="allow_decimal">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring peer-focus:ring-indigo-200 peer-focus:border-indigo-300 peer-focus:ring-opacity-50 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-200">Allow Decimal</span>
                </label>
            </div>

            <!-- Postback URL -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="postback_url" value="{{ __('Postback URL') }}" />
                <textarea id="postback_url" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200" placeholder="Postback URL" wire:model.defer="postback_url" autocomplete="postback_url"></textarea>
                <x-jet-input-error for="postback_url" class="mt-2" />
                <small class="text-gray-800 dark:text-gray-400">This is the URL we will send a GET request to when a user withdraws earnings to your website.</small>
            </div>

            <!-- Postback Macro and Security Options -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <!-- Include your macros and security options here -->
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="created">
                {{ __('Created.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Create') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
