<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Shortlink') }}
        </h2>
    </x-slot>

    <x-slot name="side_ads">
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @livewire('admin.shortlink.shortlink-create')

    </div>

</x-admin-layout>
