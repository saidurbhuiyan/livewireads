<div>
    <div class="py-8">
        <h3 class="text-lg text-center font-semibold mb-4 text-gray-700 dark:text-gray-200">Shortlink Statistics</h3>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <li class="bg-gradient-to-r from-blue-200 to-blue-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $shortLinkStats->total }}</span>
                <span class="block text-sm text-blue-700">Total Shortlinks</span>
            </li>
            <li class="bg-gradient-to-r from-green-200 to-green-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $shortLinkStats->active }}</span>
                <span class="block text-sm text-green-700">Active Shortlinks</span>
            </li>
            <li class="bg-gradient-to-r from-red-200 to-red-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $shortLinkStats->inactive }}</span>
                <span class="block text-sm text-red-700">Inactive Shortlinks</span>
            </li>
        </ul>
    </div>
    <div class="py-8">
        <h3 class="text-lg text-center font-semibold mb-4 text-gray-700 dark:text-gray-200">Offerwall Statistics</h3>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-3">
            <li class="bg-gradient-to-r from-blue-200 to-blue-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $offerWallStats->total }}</span>
                <span class="block text-sm text-blue-700">Total Offerwalls</span>
            </li>
            <li class="bg-gradient-to-r from-green-200 to-green-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $offerWallStats->active }}</span>
                <span class="block text-sm text-green-700">Active Offerwalls</span>
            </li>
            <li class="bg-gradient-to-r from-red-200 to-red-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $offerWallStats->inactive }}</span>
                <span class="block text-sm text-red-700">Inactive Offerwalls</span>
            </li>
        </ul>
    </div>
</div>
