<div>
    <x-form-section submit="storeShortlink">
        <x-slot name="title">
            {{ __('Add Shortlink') }}
        </x-slot>

        <x-slot name="form">

            <!-- Display name -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="display_name" value="{{ __('Display Name') }}" />
                <x-jet-input id="display_name" type="text" class="mt-1 block w-full"  wire:model.defer="display_name" autocomplete="display_name" required />
                <x-jet-input-error for="display_name" class="mt-2" />
            </div>

            <!-- api url -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="api_url" value="{{ __('API URL') }}" />
                <x-jet-input id="api_url" type="text" class="mt-1 block w-full" wire:model.defer="api_url" autocomplete="api_url" required />
                <x-jet-input-error for="api_url" class="mt-2" />
            </div>

            <!-- api token -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="api_token" value="{{ __('API Token') }}" />
                <x-jet-input id="api_token" type="text" class="mt-1 block w-full" wire:model.defer="api_token" autocomplete="api_token" required />
                <x-jet-input-error for="api_token" class="mt-2" />
            </div>

            <!-- count limit -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="count_limit" value="{{ __('Count Limit') }}" />
                <x-jet-input id="count_limit" type="number" class="mt-1 block w-full" wire:model.defer="count_limit" autocomplete="count_limit" required />
                <x-jet-input-error for="count_limit" class="mt-2" />
            </div>


            <!-- site cpm -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="site_cpm" value="{{ __('Site CPM') }}" />
                <x-jet-input id="site_cpm" type="number" step="0.01" class="mt-1 block w-full" wire:model.defer="site_cpm" autocomplete="site_cpm" required />
                <x-jet-input-error for="site_cpm" class="mt-2" />
            </div>


            <!-- actual cpm -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="actual_cpm" value="{{ __('Actual CPM') }}" />
                <x-jet-input id="actual_cpm" type="number" step="0.01" class="mt-1 block w-full" wire:model.defer="actual_cpm" autocomplete="actual_cpm" required />
                <x-jet-input-error for="actual_cpm" class="mt-2" />
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

            <!-- time -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="time" value="{{ __('Time (In Sec)') }}" />
                <x-jet-input id="time" type="number" class="mt-1 block w-full" wire:model.defer="time" autocomplete="time" required />
                <x-jet-input-error for="time" class="mt-2" />
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

            <!-- disable reason -->
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="disable_reason" value="{{ __('Disable Reason') }}" />
                <textarea id="disable_reason" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200" placeholder="Disable Reason" wire:model.defer="disable_reason" autocomplete="disable_reason"></textarea>
                <x-jet-input-error for="disable_reason" class="mt-2" />
            </div>



            <!-- tag -->
            <div class="col-span-6 mb-2">
                <x-jet-label for="hot_tag" class="mb-3" value="{{ __('Tag') }}" />
                <div class="grid grid-cols-12 gap-6">
                <div class="col-span-1 flex items-center mb-2">
                    <x-jet-checkbox id="hot_tag" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:model.defer="tag.hot" autocomplete="tag.hot"/>
                    <x-jet-label for="hot_tag" class="ml-2" value="{{ __('HOT') }}" />
                </div>

                <div class="col-span-1 flex items-center mb-2">
                    <x-jet-checkbox id="pop_tag" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:model.defer="tag.pop" autocomplete="tag.pop"/>
                    <x-jet-label for="pop_tag" class="ml-2" value="{{ __('POP') }}" />
                </div>

                <div class="col-span-1 flex items-center mb-2">
                    <x-jet-checkbox id="adult_tag" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" wire:model.defer="tag.adult" autocomplete="tag.adult" />
                    <x-jet-label for="adult_tag" class="ml-2" value="{{ __('ADULT') }}" />
                </div>
                <x-jet-input-error for="tag" class="mt-2" />
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
    </x-form-section>

</div>
