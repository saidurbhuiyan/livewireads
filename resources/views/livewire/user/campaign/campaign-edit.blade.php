<div>
    <x-form-section submit="updateCampaign">
        <x-slot name="title" class="capitalize">
            {{ __('Edit '.$campaign->type.' Campaign') }}
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="name" value="{{ __('Campaign Name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="campaign.name" />
                <x-jet-input-error for="campaign.name" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="description" value="{{ __('Description') }}" />
                <textarea id="description" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:autofill:bg-gray-800 dark:text-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" wire:model.defer="campaign.description" rows="3"></textarea>
                <x-jet-input-error for="campaign.description" class="mt-2" />
            </div>
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="target_url" value="{{ __('Target URL') }}" />
                <x-jet-input id="target_url" type="url" class="mt-1 block w-full" wire:model.defer="campaign.target_url" />
                <x-jet-input-error for="campaign.target_url" class="mt-2" />
            </div>
            @if($campaign->type === 'banner')
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="image_path" value="{{ __('Banner Image Path') }}" />
                <x-jet-input id="image_path" type="text" class="mt-1 block w-full" wire:model.defer="image_path" />
                <x-jet-input-error for="image_path" class="mt-2" />
            </div>
            @elseif($campaign->type === 'pop')
            <div class="col-span-6 sm:col-span-4 mb-2">
                <x-jet-label for="pop_code" value="{{ __('Pop Code') }}" />
                <textarea id="pop_code" class="border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:autofill:bg-gray-800 dark:text-gray-200 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" wire:model.defer="pop_code" rows="3"></textarea>
                <x-jet-input-error for="pop_code" class="mt-2" />
            </div>
            @endif
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
