<x-app-layout>
    <x-slot name="head">
        <meta name="route" content="{{ route('device.store') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </x-slot>

    <div id="displayDataSuccess">
    </div>

    <x-sidebar :dashboardRoute="route('admin.dashboard')"/>

    <div class="min-h-screen py-10 bg-gray-100 dark:bg-gray-900 font-sans sm:ml-16">
        <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-200 dark:border-gray-700">

            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-6 border-b pb-4 border-gray-200 dark:border-gray-700">
                    <i class="fa-solid fa-microchip mr-2 text-blue-500"></i> Register New Device
                </h2>

                <form id="deviceForm" class="space-y-6">
                    <div>
                        <label for="device_name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Device Name <span class="text-red-500">*</span></label>
                        <input id="device_name" name="device_name" type="text" required
                            class="w-full px-4 py-2 rounded-lg bg-gray-50 dark:bg-gray-900 border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 dark:text-white transition-all"
                            placeholder="e.g. ESP32-Sensor-Suhu">
                    </div>

                    <div>
                        <label for="api_key" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">API Key <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input id="api_key" name="api_key" type="text" readonly required
                                class="w-full px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700 border border-transparent text-gray-500 cursor-not-allowed">
                            <button type="button" id="generateKey" class="absolute right-2 top-1/2 -translate-y-1/2 text-xs bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-md transition">
                                <i class="fa-solid fa-rotate mr-1"></i> Generate
                            </button>
                        </div>
                    </div>

                    <div id="alert-container" class="mt-4"></div>

                    <div class="flex justify-end pt-4">
                        <button type="submit" id="submitBtn" class="flex items-center gap-2 px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-1">
                            Save Device <i class="fa-solid fa-save"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        @vite(['resources/js/device/store.js'])
    @endpush
</x-app-layout>
