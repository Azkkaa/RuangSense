<x-app-layout>
    <x-sidebar/>

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 sm:ml-16 transition-all duration-300">
        <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 p-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">RuangSense IoT Overview</h1>
                    <div class="flex items-center gap-3 mt-1">
                        <p class="text-sm text-gray-500 dark:text-gray-400 border-r pr-3 border-gray-300 dark:border-gray-600">
                            Device: <span class="font-semibold text-gray-700 dark:text-gray-200">{{ $device->name }}</span>
                        </p>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            ID: <span id="apiKey" class="font-mono bg-gray-200 dark:bg-gray-700 px-1 rounded">{{ $device->api_key }}</span>
                        </p>
                    </div>
                </div>

                <div id="statusBadge" class="flex items-center gap-2 px-4 py-2 rounded-full bg-gray-100 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 transition-all duration-500">
                    <span class="relative flex h-3 w-3">
                        <span id="statusPing" class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75 bg-gray-400"></span>
                        <span id="statusDot" class="relative inline-flex rounded-full h-3 w-3 bg-gray-400"></span>
                    </span>
                    <span id="statusText" class="text-xs font-bold uppercase tracking-wider text-gray-500">Connecting...</span>
                </div>
            </div>
        </header>

        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-orange-100 dark:bg-orange-900/30 text-orange-600 rounded-xl">
                            <i class="fa-solid fa-temperature-half text-xl"></i>
                        </div>
                        <span id="tempStatus" class="text-[10px] font-bold text-gray-400 uppercase">Loading...</span>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Current Temperature</p>
                    <h3 id="tempDisplay" class="text-4xl font-bold text-gray-800 dark:text-white transition-all">--°C</h3>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-xl">
                            <i class="fa-solid fa-droplet text-xl"></i>
                        </div>
                        <span id="humStatus" class="text-[10px] font-bold text-gray-400 uppercase">Loading...</span>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Current Humidity</p>
                    <h3 id="humDisplay" class="text-4xl font-bold text-gray-800 dark:text-white transition-all">--%</h3>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div id="gasIconBg" class="p-3 bg-purple-100 dark:bg-purple-900/30 text-purple-600 rounded-xl">
                            <i class="fa-solid fa-wind text-xl"></i>
                        </div>
                        <span id="gasStatus" class="text-[10px] font-bold text-gray-400 uppercase">Loading...</span>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Gas Level</p>
                    <div class="flex items-baseline gap-2">
                        <h3 id="gasDisplay" class="text-4xl font-bold text-gray-800 dark:text-white">--</h3>
                        <span class="text-sm font-normal text-gray-400 uppercase tracking-tighter">ppm</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm">
                    <h3 class="font-bold text-sm text-gray-800 dark:text-white mb-4">Temperature Trend (°C)</h3>
                    <div class="h-64"><canvas id="chartTemp"></canvas></div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm">
                    <h3 class="font-bold text-sm text-gray-800 dark:text-white mb-4">Humidity Trend (%)</h3>
                    <div class="h-64"><canvas id="chartHum"></canvas></div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-4 rounded-2xl border border-gray-200 dark:border-gray-700 shadow-sm">
                    <h3 class="font-bold text-sm text-gray-800 dark:text-white mb-4">Gas Level (PPM)</h3>
                    <div class="h-64"><canvas id="chartGas"></canvas></div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        @vite(['resources/js/listen/listen.js'])
    @endpush
</x-app-layout>
