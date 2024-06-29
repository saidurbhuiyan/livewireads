<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm-center text-gray-500 dark:text-gray-300">
        <thead class="text-sm text-green-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-green-500">
        <tr>
            <th scope="col" class="p-3">ID</th>
            <th scope="col" class="p-3">Website Address</th>
            <th scope="col" class="p-3">Ownership</th>
            <th scope="col" class="p-3">Created At</th>
            <th scope="col" class="p-3">Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($site_data as $site)
        <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
            <td class="p-3">{{$site->id}}</td>
            <td class="p-3 font-medium hover:text-gray-900 focus:text-gray-900 hover:dark:text-gray-100 focus:dark:text-gray-100 whitespace-nowrap">
                <a href="{{$this->domain_protocols[$site->is_secure].$site->domain_name}}">{{$site->domain_name}}</a>
            </td>
            <td class="p-3">
                <span class="bg-{{!empty($site->created_at) ? 'green' : 'red'}}-500 text-white text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">{{!empty($site->created_at) ? 'Verified' : 'Unverified'}}</span>
            </td>
            <td class="p-3">{{$site->created_at->toFormattedDateString()}}</td>
            <td class="p-3">
                <span class="bg-{{$this->read_able_status[$site->status]}}-500 text-white text-sm font-semibold mr-2 px-2.5 py-0.5 rounded capitalize">{{$site->status}}</span>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-2">
        {{ $site_data->links() }}
    </div>
</div>
