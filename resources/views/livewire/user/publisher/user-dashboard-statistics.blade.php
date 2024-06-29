<div>
    <div class="py-8">
        <h3 class="text-lg text-center font-semibold mb-4 text-gray-700 dark:text-gray-200">Website Statistics</h3>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-4">
            <li class="bg-gradient-to-r from-green-200 to-green-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $websiteStats['active'] ?? 0 }}</span>
                <span class="block text-sm text-green-700">Active Websites</span>
            </li>
            <li class="bg-gradient-to-r from-yellow-200 to-yellow-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $websiteStats['pending'] ?? 0 }}</span>
                <span class="block text-sm text-yellow-700">Pending Websites</span>
            </li>
            <li class="bg-gradient-to-r from-red-200 to-red-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $websiteStats['rejected'] ?? 0 }}</span>
                <span class="block text-sm text-red-700">Rejected Websites</span>
            </li>
            <li class="bg-gradient-to-r from-gray-200 to-gray-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $websiteStats['inactive'] ?? 0 }}</span>
                <span class="block text-sm text-gray-700">Inactive Websites</span>
            </li>
        </ul>
    </div>

    <div class="py-8">
        <h3 class="text-lg text-center font-semibold mb-4 text-gray-700 dark:text-gray-200">
            App Statistics</h3>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-5">
            <li class="sm:col-start-3 bg-gradient-to-r from-blue-200 to-blue-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $appStats}}</span>
                <span class="block text-sm text-blue-700">Total Apps</span>
            </li>

        </ul>
    </div>
</div>
