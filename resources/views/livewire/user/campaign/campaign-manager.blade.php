<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm-center text-gray-500 dark:text-gray-300">
        <thead class="text-sm text-green-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-green-500">
        <tr>
            <th scope="col" class="p-3">ID</th>
            <th scope="col" class="p-3">Campaign Name</th>
            <th scope="col" class="p-3">Type</th>
            <th scope="col" class="p-3">Created At</th>
            <th scope="col" class="p-3">Status</th>
            <th scope="col" class="p-3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($campaigns as $campaign)
        <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
            <td class="p-3">{{$campaign->id}}</td>
            <td class="p-3">{{$campaign->name}}</td>
            <td class="p-3">{{ucfirst($campaign->type)}}</td>
            <td class="p-3">{{$campaign->created_at->toFormattedDateString()}}</td>
            <td class="p-3">
                <span class="bg-{{$this->campaign_statuses[$campaign->status]}}-500 text-white text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">{{$campaign->status}}</span>
            </td>
            <td class="p-3">
                <a href="{{ route('campaigns.edit', $campaign->id) }}" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-bold rounded-md text-xs px-4 py-2 text-center mr-2 my-2 uppercase tracking-widest transition">Edit</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-2">
        {{ $campaigns->links() }}
    </div>
</div>
