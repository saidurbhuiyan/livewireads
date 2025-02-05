<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-xs-center text-gray-500 dark:text-gray-300">
        <thead class="text-sm text-green-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-green-500">
        <tr>
            <th scope="col" class="p-3">ID</th>
            <th scope="col" class="p-3">Name</th>
            <th scope="col" class="p-3">Count Limit</th>
            <th scope="col" class="p-3">Actual CPM</th>
            <th scope="col" class="p-3">Timer</th>
            <th scope="col" class="p-3">Created At</th>
            <th scope="col" class="p-3">Status</th>
            <th scope="col" class="p-3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($short_link_data as $short)
        <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
            <td class="p-3">{{ $short->id }}</td>
            <td class="p-3 font-medium hover:text-gray-900 focus:text-gray-900 hover:dark:text-gray-100 focus:dark:text-gray-100 whitespace-nowrap">
                <a href="{{ $short->site_url }}">{{ $short->display_name }}</a>
            </td>
            <td class="p-3">{{ $short->count_limit }}</td>
            <td class="p-3">{{ $short->actual_cpm }}</td>
            <td class="p-3">{{ $short->time }}</td>
            <td class="p-3">{{ $short->created_at->toFormattedDateString() }}</td>
            <td class="p-3">
                    <span class="bg-{{$short->is_enable ? 'green' : 'red' }}-500 text-white text-sm font-bold px-2.5 py-0.5 rounded">
                        {{ $short->is_enable ? 'Enable' : 'Disable' }}
                    </span>
            </td>
            <td class="p-4">
                <a href="{{ route('shortlinks.edit', ['id' => $short->id]) }}"
                   class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-bold rounded-md text-xs px-4 py-2 text-center mr-2 my-2 uppercase tracking-widest transition">
                    Edit
                </a>
                <button type="button"
                        class="text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 font-bold rounded-md text-xs px-4 py-2 text-center mr-2 my-2 uppercase tracking-widest transition"
                        wire:click="confirmingShortLinkDelete({{ $short->id }})" wire:key="{{ $short->id }}"
                        wire:loading.attr="disabled">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-2">
        {{ $short_link_data->links() }}
    </div>

    <x-jet-dialog-modal wire:model="confirmingShortLinkDelete">
        <x-slot name="title">
            Delete Confirmation
        </x-slot>
        <x-slot name="content">
            <p class="text-gray-800 dark:text-gray-200">Are you sure you want to delete?</p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('confirmingShortLinkDelete', false)" wire:loading.attr="disabled">
                Close
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3" wire:click="deleteShortLink({{ $short_link_id }})" wire:loading.attr="disabled">
                Yes, Delete
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
