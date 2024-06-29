<div>
    <div class="mb-3">
        <x-jet-secondary-button wire:click="confirmingWebsiteAdd" wire:loading.attr="disabled">
            {{ __('Add Website') }}
        </x-jet-secondary-button>
    </div>

    <x-jet-dialog-modal wire:model="confirmingWebsiteAdd">
        <x-slot name="title">
            {{ __('Add Website') }}
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-6 gap-6">
                <!-- Domain Name -->
                <div class="col-span-6 sm:col-span-4 mb-2">
                    <x-jet-label for="domain_name" value="{{ __('Website Domain') }}" />
                    <div class="flex">
                        <select name="protocol" class="flex-shrink-0 inline-flex items-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 w-1/4 px-3 py-2 mt-1 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200" wire:model.defer="protocol" required>
                            @foreach($domainProtocols as $key => $secure)
                            <option value="{{$key}}" {{$key === $protocol ? 'selected' : ''}}>{{$secure}}</option>
                            @endforeach
                        </select>
                        <x-jet-input id="domain_name" type="text" class="mt-1 w-3/4 rounded-r-lg" wire:model.defer="domain_name" autocomplete="domain_name" required />
                    </div>
                    <x-jet-input-error for="domain_name" class="mt-2" />
                </div>

                <!-- Monthly Traffic -->
                <div class="col-span-6 sm:col-span-4 mb-2">
                    <x-jet-label for="monthly_traffic" value="{{ __('Monthly Traffic') }}" />
                    <x-jet-input id="monthly_traffic" type="number" min="5000" class="mt-1 block w-full" wire:model.defer="monthly_traffic" autocomplete="monthly_traffic" required />
                    <x-jet-input-error for="monthly_traffic" class="mt-2" />
                </div>

                <!-- Traffic Source -->
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="analytic_source" value="{{ __('Analytic Source') }}" />
                    <select name="analytic_source" id="analytic_source" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring focus:ring-indigo-200 focus:border-indigo-300 focus:ring-opacity-50 block w-full px-3 py-2 dark:bg-gray-800 dark:border-gray-700 dark:placeholder-gray-500 dark:text-gray-200 mt-1" wire:model.defer="analytic_source" required>
                        <option value="" disabled>Choose Option</option>
                        @foreach($analytic_sources as $key => $source)
                        <option value="{{$key}}">{{$source}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="analytic_source" class="mt-2" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingWebsiteAdd', false)" wire:loading.attr="disabled">
                {{ __('Never Mind') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-3 bg-sky-500" wire:click="addWebsite" wire:loading.attr="disabled">
                {{ __('Add Website') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
