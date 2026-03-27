<x-app-layout>

    @include('layouts.navigation')

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 transition-all duration-300 flex justify-center items-center">
        <div class="px-8 w-[80%]">
            <div class="max-w-4xl mx-auto">
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-2">Search Devices</h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-6">Find your registered IoT devices by name or API Key.</p>

                    <form id="searchForm">
                        <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:text-white rounded-lg transition-all flex justify-center items-center">
                            <input type="text" id="searchInput"
                                class="block py-4 bg-transparent w-full rounded-lg"
                                placeholder="Type device API Key...">
                            <button type="submit" id="searchButton"
                                class="flex justify-center items-center px-2 gap-1">
                                <i class="ph-bold ph-magnifying-glass text-xl"></i> <span>Search</span>
                            </button>
                        </div>
                    </form>
                </div>

                <div id="resultsContainer" class="flex justify-center">
                    <div class="col-span-full py-20 text-center">
                        <div class="w-20 h-20 bg-gray-200 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                            <i class="fa-solid fa-microchip text-3xl"></i>
                        </div>
                        <p class="text-gray-500 dark:text-gray-400 font-medium">Start searching for your device</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        @vite(['resources/js/device/search.js'])
    @endpush
</x-app-layout>
