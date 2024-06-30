<div>
    <div class="py-8">
        <h3 class="text-lg text-center font-semibold mb-4 text-gray-700 dark:text-gray-200">Banner Campaign Statistics</h3>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-4">
            <li class="bg-gradient-to-r from-green-200 to-green-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $bannerStats['active'] ?? 0 }}</span>
                <span class="block text-sm text-green-700">Active Banners</span>
            </li>
            <li class="bg-gradient-to-r from-yellow-200 to-yellow-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $bannerStats['pending'] ?? 0 }}</span>
                <span class="block text-sm text-yellow-700">Pending Banners</span>
            </li>
            <li class="bg-gradient-to-r from-red-200 to-red-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $bannerStats['rejected'] ?? 0 }}</span>
                <span class="block text-sm text-red-700">Rejected Banners</span>
            </li>
            <li class="bg-gradient-to-r from-gray-200 to-gray-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $bannerStats['inactive'] ?? 0 }}</span>
                <span class="block text-sm text-gray-700">Inactive Banners</span>
            </li>
        </ul>
    </div>

    <div class="py-8">
        <h3 class="text-lg text-center font-semibold mb-4 text-gray-700 dark:text-gray-200">Pop Campaign Statistics</h3>
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-4">
            <li class="bg-gradient-to-r from-green-200 to-green-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $popStats['active'] ?? 0 }}</span>
                <span class="block text-sm text-green-700">Active Pops</span>
            </li>
            <li class="bg-gradient-to-r from-yellow-200 to-yellow-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $popStats['pending'] ?? 0 }}</span>
                <span class="block text-sm text-yellow-700">Pending Pops</span>
            </li>
            <li class="bg-gradient-to-r from-red-200 to-red-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $popStats['rejected'] ?? 0 }}</span>
                <span class="block text-sm text-red-700">Rejected Pops</span>
            </li>
            <li class="bg-gradient-to-r from-gray-200 to-gray-400 shadow-md p-4 rounded-lg text-center">
                <span class="block text-2xl font-bold">{{ $popStats['inactive'] ?? 0 }}</span>
                <span class="block text-sm text-gray-700">Inactive Pops</span>
            </li>
        </ul>
    </div>
</div>
