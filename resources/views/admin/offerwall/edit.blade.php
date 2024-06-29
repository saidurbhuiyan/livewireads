<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Offerwalls') }}
        </h2>
    </x-slot>

    <x-slot name="side_ads">
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @livewire('admin.offerwall.offerwall-edit', ['id' => $offer_wall_id])
    </div>

</x-admin-layout>
