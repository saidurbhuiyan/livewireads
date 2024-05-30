<div>
    <x-form-section submit="storeOfferwall">
        <x-slot name="title">
            {{ __('Add Offerwall') }}
        </x-slot>

        <x-slot name="form">

            <!-- Display name -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="display_name" value="{{ __('Display Name') }}" />
                <x-jet-input id="display_name" type="text" class="mt-1 block w-full"  wire:model.defer="display_name" autocomplete="display_name" required />
                <x-jet-input-error for="display_name" class="mt-2" />
            </div>

            <!-- secret -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="secret" value="{{ __('Secret') }}" />
                <x-jet-input id="secret" type="text" class="mt-1 block w-full" wire:model.defer="secret" autocomplete="secret" />
                <x-jet-input-error for="secret" class="mt-2" />
            </div>

            <!-- api key -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="api_key" value="{{ __('API Key') }}" />
                <x-jet-input id="api_key" type="text" class="mt-1 block w-full" wire:model.defer="api_key" autocomplete="api_key" />
                <x-jet-input-error for="api_key" class="mt-2" />
            </div>

            <!-- priority -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="priority" value="{{ __('Priority') }}" />
                <select id="priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 block w-full px-3 py-3 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200 mt-1" wire:model.defer="priority" required>
                    <option selected>Choose Option</option>
                    @for($i=10; $i<=100; $i+=10)
                        <option value="{{$i}}" wire:key="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <x-jet-input-error for="priority" class="mt-2" />
            </div>

            <!-- Security Risk -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="security_risk" value="{{ __('Security Risk') }}" />
                <select id="security_risk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 block w-full px-3 py-3 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200 mt-1" wire:model.defer="security_risk" required>
                    <option selected>Choose Option</option>
                    @for($i=0; $i<=100; $i+=10)
                        <option value="{{$i}}" wire:key="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <x-jet-input-error for="security_risk" class="mt-2" />
            </div>

            <!-- status -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="status" value="{{ __('Status') }}" />
                <select id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 block w-full px-3 py-3 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200 mt-1" wire:model.defer="status" required>
                    <option value="{{0}}" wire:key="{{0}}">{{'Disable'}}</option>
                    <option value="{{1}}" wire:key="{{1}}">{{'Enable'}}</option>

                </select>
                <x-jet-input-error for="status" class="mt-2" />
            </div>

            <!-- Frame Url -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="frame_url" value="{{ __('Frame URL') }}" />
                <textarea id="frame_url" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200" placeholder="https://example.com/frame?id={id}&api_key={api_key}" wire:model.defer="frame_url" autocomplete="frame_url"></textarea>
                <x-jet-input-error for="frame_url" class="mt-2" />
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
    </x-form-section>

</div>
