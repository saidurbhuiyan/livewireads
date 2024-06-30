<div>
    <div class="mb-3">
        <x-jet-secondary-button wire:click="$set('confirmingCampaignAdd', true)" wire:loading.attr="disabled">
            {{ __('Create Campaign') }}
        </x-jet-secondary-button>
    </div>

    <x-jet-dialog-modal wire:model="confirmingCampaignAdd">
        <x-slot name="title">
            {{ __('Create Campaign') }}
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4 mb-2">
                    <x-jet-label for="type" value="{{ __('Campaign Type') }}" />
                    <select id="type" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:autofill:bg-gray-800 dark:text-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" wire:model="type">
                        <option value="banner">{{ __('Banner') }}</option>
                        <option value="pop">{{ __('Pop') }}</option>
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-4 mb-2">
                    <x-jet-label for="name" value="{{ __('Campaign Name') }}" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="name" autocomplete="name" />
                    <x-jet-input-error for="name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mb-2">
                    <x-jet-label for="description" value="{{ __('Description') }}" />
                    <textarea id="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:autofill:bg-gray-800 dark:text-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" wire:model.defer="description" rows="3"></textarea>
                    <x-jet-input-error for="description" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mb-2">
                    <x-jet-label for="target_url" value="{{ __('Target URL') }}" />
                    <x-jet-input id="target_url" type="url" class="mt-1 block w-full" wire:model.defer="target_url" />
                    <x-jet-input-error for="target_url" class="mt-2" />
                </div>
                @if($type === 'banner')
                <div class="col-span-6 sm:col-span-4 mb-2">
                    <x-jet-label for="image_path" value="{{ __('Banner Image Path') }}" />
                    <x-jet-input id="image_path" type="text" class="mt-1 block w-full" wire:model.defer="image_path" />
                    <x-jet-input-error for="image_path" class="mt-2" />
                </div>
                @elseif($type === 'pop')
                <div class="col-span-6 sm:col-span-4 mb-2">
                    <x-jet-label for="pop_code" value="{{ __('Pop Code') }}" />
                    <textarea id="pop_code" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:autofill:bg-gray-800 dark:text-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" wire:model.defer="pop_code" rows="3"></textarea>
                    <x-jet-input-error for="pop_code" class="mt-2" />
                </div>
                @endif
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingCampaignAdd', false)" wire:loading.attr="disabled">
                {{ __('Never Mind') }}
            </x-jet-secondary-button>
            <x-jet-button class="ml-3" wire:click="createCampaign" wire:loading.attr="disabled">
                {{ __('Add Campaign') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
