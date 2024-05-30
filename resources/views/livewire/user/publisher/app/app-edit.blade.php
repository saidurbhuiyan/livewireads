<div>
    <x-jet-form-section submit="updateApp">
        <x-slot name="title">
            {{ __('Edit Apps') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Edit your Apps.') }}
        </x-slot>
<x-slot name="form">
            <!-- Site Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="site_name" value="{{ __('Site Name') }}" />
                <select name="site_name" id="site_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 block w-full px-3 py-3 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200 mt-1" wire:model.defer="site_name" autocomplete="site_name" required>
                    <option value="{{$site_name}}" wire:key="{{$site_name}}" selected>{{$domain_name}}</option>
                </select>
                <x-jet-input-error for="site_name" class="mt-2" />
            </div>

            <!-- Currency name -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="currency_name" value="{{ __('Currency Name') }}" />
                <x-jet-input id="currency_name" type="text" class="mt-1 block w-full"  wire:model.defer="currency_name" autocomplete="currency_name" required />
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

                <label for="default-toggle" class="relative inline-flex items-center mb-4 cursor-pointer">
                    <input type="checkbox" name ="allow_decimal" value="" id="default-toggle" class="sr-only peer" wire:model.defer="allow_decimal" autocomplete="allow_decimal" >
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring peer-focus:ring-indigo-200 peer-focus:border-indigo-300 peer-focus:ring-opacity-50 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-200">Allow Decimal</span>
                </label>
            </div>

            <!-- Postback URL -->
            <div class="col-span-6 sm:col-span-4 mb-2">

                <label for="postback_url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Postback URL</label>
                <textarea id="postback_url" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Postback URL" wire:model.defer="postback_url" autocomplete="postback_url"></textarea>
                <small class="text-gray-800 dark:text-gray-400">This is the URL we will send a GET request to when a user withdraws earnings to your website. You can use. If your postback does not return a HTTP 200 OK success status, we will consider it a failure and we will send you a postback failure notification, and you will be able to retry it from the Postback Manager tab.</small>

            </div>

            <!--Postback Macro-->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <h5 class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-200"> Postback Macro</h5>
                <p class="py-2">
                <div class="mb-2"><span class="text-red-600 font-bold">{userID}</span><span class="text-gray-800 dark:text-gray-400 font-medium text-sm ml-3">This is the unique user identifier passed to us in the integration URL</span></div>

                <div class="mb-2"><span class="text-red-600 font-bold">{transactionID}</span><span class="text-gray-800 dark:text-gray-400 font-medium text-sm ml-3">The unique transaction ID for the withdraw. You should never credit the same transactionID twice.</span></div>

                <div class="mb-2"><span class="text-red-600 font-bold">{revenue}</span><span class="text-gray-800 dark:text-gray-400 font-medium text-sm ml-3">This is the gross amount of USD revenue you have earned in the postback</span></div>

                <div class="mb-2"><span class="text-red-600 font-bold">{currencyAmount}</span><span class="text-gray-800 dark:text-gray-400 font-medium text-xs ml-3">This is the amount of currency to award your user.</span></div>

                <div class="mb-2"><span class="text-red-600 font-bold">{hash}</span><span class="text-gray-800 dark:text-gray-400 font-medium text-sm ml-3">(optional)The SHA256 security hash. See the "Postback Security Options" section below for more details.</span></div>

                </p>
            </div>

            <!--Postback Security-->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <h5 class="block mb-2 text-base font-medium text-gray-900 dark:text-gray-200">Postback Security Options:</h5>


                <div class="mb-2"><span class="text-green-600 font-bold">1. Server IP Whitelisting</span>
                    <span class="text-grey-800 dark:text-gray-400 text-sm">You can whitelist requests from this IP only <span class="font-bold">xxxxxxxxxx</span>
                            </span>
                </div>

                <div class="mb-2"><span class="text-green-600 font-bold">2. Postback Hash</span>
                    <span class="text-grey-800 dark:text-gray-400 text-sm">We will send back the following hashed value using the {hash} macro.
                                <br>
                                hash("sha256", userID . revenue . SecretKey)
                                <br>
                                Your Secret Key: <span class="font-bold">{{$secret_key}}</span>
                            </span>
                </div>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

</div>
