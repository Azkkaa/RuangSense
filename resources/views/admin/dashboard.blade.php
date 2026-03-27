<x-app-layout>

    <x-sidebar
        :dashboardRoute="route('admin.dashboard')"
        :deviceRoute="route('device.create')"
        />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 sm:ml-16 transition-all duration-300">

        <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 p-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">System Overview</h1>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Manage your IoT devices and monitor user activity.</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="hidden md:block text-right">
                        <p class="text-xs font-semibold text-gray-400 uppercase">System Status</p>
                        <p class="text-sm font-bold text-green-500 flex items-center justify-end gap-1">
                            <span class="w-2 h-2 bg-green-500 rounded-full"></span> All Systems Operational
                        </p>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 group hover:border-blue-500 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Devices</p>
                            <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-1">12</h3>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 text-blue-600 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-microchip text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-blue-500 font-semibold">
                        <i class="fa-solid fa-plus mr-1"></i> 2 New this month
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 group hover:border-green-500 transition-colors">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Online Users</p>
                            <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-1">5</h3>
                        </div>
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 text-green-600 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-users text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center text-xs text-green-500 font-semibold">
                        <i class="fa-solid fa-circle animate-pulse mr-1"></i> Active now
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Requests</p>
                            <h3 class="text-3xl font-bold text-gray-800 dark:text-white mt-1">1.2k</h3>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 text-purple-600 rounded-xl flex items-center justify-center">
                            <i class="fa-solid fa-server text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4 text-xs text-gray-400">
                        JSON POST frequency: <span class="text-gray-600 dark:text-gray-200 font-bold">High</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="p-6 border-b border-gray-100 dark:border-gray-700 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <h2 class="font-bold text-gray-800 dark:text-white flex items-center gap-2">
                        <i class="fa-solid fa-user-clock text-blue-500"></i> User Activity & Last Seen
                    </h2>
                    <div class="relative">
                        <input type="text" placeholder="Search user..." class="pl-10 pr-4 py-2 bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl text-sm focus:ring-2 focus:ring-blue-500 dark:text-white outline-none w-full md:w-64">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 dark:bg-gray-900/50 text-xs uppercase text-gray-500 font-bold">
                            <tr>
                                <th class="px-6 py-4">User</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Associated Devices</th>
                                <th class="px-6 py-4">Last Seen</th>
                                <th class="px-6 py-4 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/20 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="https://ui-avatars.com/api/?name=Admin+IoT" class="w-9 h-9 rounded-full border border-gray-200 dark:border-gray-600" />
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 dark:text-gray-200">Admin IoT</p>
                                            <p class="text-xs text-gray-500">admin@iot.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 rounded-lg text-xs font-bold uppercase tracking-wider">Online</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600 dark:text-gray-400 font-medium">4 Devices</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-800 dark:text-gray-300">Just now</p>
                                    <p class="text-xs text-gray-400 font-mono tracking-tighter">IP: 180.244.xx.xxx</p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button class="p-2 text-gray-400 hover:text-blue-500 transition-colors" title="View Details"><i class="fa-solid fa-eye"></i></button>
                                </td>
                            </tr>

                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/20 transition-colors group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3 opacity-70 group-hover:opacity-100">
                                        <img src="https://ui-avatars.com/api/?name=Guest+User" class="w-9 h-9 rounded-full" />
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 dark:text-gray-200">Guest User</p>
                                            <p class="text-xs text-gray-500">guest@iot.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2.5 py-1 bg-gray-100 text-gray-500 dark:bg-gray-700 dark:text-gray-400 rounded-lg text-xs font-bold uppercase">Offline</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">1 Device</span>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-800 dark:text-gray-300 font-medium">2 hours ago</p>
                                    <p class="text-xs text-gray-400 font-mono tracking-tighter">IP: 114.122.xx.xxx</p>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <button class="p-2 text-gray-400 hover:text-blue-500 transition-colors"><i class="fa-solid fa-eye"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
