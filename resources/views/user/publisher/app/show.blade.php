<x-publisher-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Apps Manager') }}
        </h2>
    </x-slot>


    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <x-card-section>
            <x-slot name="content">
                <div class="mb-4">
                    <a class="inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-900 font-bold rounded-md text-xs px-5 py-2.5 text-center mr-2 uppercase tracking-widest transition" href="{{ route('apps.create') }}">
                        {{ __('Add App') }}
                    </a>
                </div>
                @livewire('user.publisher.app.app-manager')

            </x-slot>
        </x-card-section>



    </div>

</x-publisher-layout>
