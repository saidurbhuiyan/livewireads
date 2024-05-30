<x-publisher-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Websites Manager') }}
        </h2>
    </x-slot>


        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-card-section>

                <x-slot name="content">
                    @livewire('user.publisher.website.website-create')
                    @livewire('user.publisher.website.website-manager')


                </x-slot>
            </x-card-section>



        </div>

</x-publisher-layout>
