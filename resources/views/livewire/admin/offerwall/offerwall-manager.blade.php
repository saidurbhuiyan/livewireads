<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm-center text-gray-500 dark:text-gray-300">
        <thead class="text-sm text-green-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-green-500">
        <tr>
            <th scope="col" class="px-6 py-3">ID</th>
            <th scope="col" class="px-6 py-3">Display Name</th>
            <th scope="col" class="px-6 py-3">Priority</th>
            <th scope="col" class="px-6 py-3">Security Risk</th>
            <th scope="col" class="px-6 py-3">Created At</th>
            <th scope="col" class="px-6 py-3">Status</th>
            <th scope="col" class="px-6 py-3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offerWallData as $offer)
        <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
            <td class="px-6 py-4">{{ $offer->id }}</td>
            <td class="px-6 py-4 font-medium hover:text-gray-900 focus:text-gray-900 hover:dark:text-gray-100 focus:dark:text-gray-100 whitespace-nowrap">{{ $offer->display_name }}</td>
            <td class="px-6 py-4">{{ $offer->priority }}</td>
            <td class="px-6 py-4">{{ $offer->security_risk }}</td>
            <td class="px-6 py-4">{{ $offer->created_at->toFormattedDateString() }}</td>
            <td class="px-6 py-4">
                <span class="bg-{{ $this->readableStatus[$offer->status]['color'] }}-500 text-white text-sm font-bold mr-2 px-2.5 py-0.5 rounded">{{ $this->readableStatus[$offer->status]['text'] }}</span>
            </td>
            <td class="p-4">
                <a class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-bold rounded-md text-xs px-4 py-2 text-center mr-2 my-2 uppercase tracking-widest transition" href="{{ route('offerwalls.edit', ['id' => $offer->id]) }}">
                    {{ __('Edit') }}
                </a>
                <button type="button" class="text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 font-bold rounded-md text-xs px-4 py-2 text-center mr-2 my-2 uppercase tracking-widest transition" wire:click="confirmingOfferWallDelete({{ $offer->id }})" wire:key="{{ $offer->id }}" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-2">
        {{ $offerWallData->links() }}
    </div>

    <!-- Modal -->
    <x-jet-dialog-modal wire:model="confirmingOfferWallDelete">
        <x-slot name="title">
            {{ __('Delete Confirmation') }}
        </x-slot>
        <x-slot name="content">
            <p class="text-gray-800 dark:text-gray-200">{{ __('Are you sure you want to delete?') }}</p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingOfferWallDelete', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3" wire:click="deleteOfferWall({{ $offerWallId }})" wire:loading.attr="disabled">
                {{ __('Yes, Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
