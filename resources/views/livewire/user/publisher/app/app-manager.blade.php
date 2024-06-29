<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm-center text-gray-500 dark:text-gray-300">
        <thead class="text-sm text-green-500 uppercase bg-gray-50 dark:bg-gray-700 dark:text-green-500">
        <tr>
            <th scope="col" class="p-3">
                ID
            </th>
            <th scope="col" class="p-3">
                Website Address
            </th>
            <th scope="col" class="p-3">
                Currency Name
            </th>
            <th scope="col" class="p-3">
                Exchange Rate
            </th>
            <th scope="col" class="p-3">
                Created At
            </th>
            <th scope="col" class="p-3">
                Action
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($app_data as $app)
        <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 text-center">
            <td class="p-3">
                {{$app->id}}
            </td>
            <td class="p-3 font-medium hover:text-gray-900 focus:text-gray-900 hover:dark:text-gray-100 focus:dark:text-gray-100 whitespace-nowrap">
                <a href="{{$this->domain_protocols[$app->website->is_secure].$app->website->domain_name}}">{{$app->website->domain_name}}</a>
            </td>
            <td class="p-3">
                {{$app->currency_name}}
            </td>
            <td class="p-3">
                $1 = {{$app->allow_decimal === 1 ? $app->conversion_rate : number_format($app->conversion_rate, 0, ".", "")}}
            </td>
            <td class="p-3">
                {{$app->created_at->toFormattedDateString()}}
            </td>
            <td class="p-4">
                <a class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-bold rounded-md text-xs px-5 py-2.5 text-center mr-2 uppercase tracking-widest transition" href="{{ route('apps.edit',['id'=> $app->id]) }}">
                    {{ __('Edit') }}
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="p-2">
        {{ $app_data->links() }}
    </div>
</div>
