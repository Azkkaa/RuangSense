@props(['deviceRoute' => null])

<div id="sidebar">
    <aside id="main" class="fixed left-0 top-0 z-30 h-screen w-64 transition-transform -translate-x-full">
        <div class="h-full flex flex-col px-4 py-6 overflow-y-auto bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">

            <div class="flex items-center justify-between gap-3 mb-10 px-2">
                <div class="flex items-center gap-2">
                    <div class="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/30 text-white">
                        <i class="fa-solid fa-bolt-lightning text-xl"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-gray-800 dark:text-white uppercase">
                        IoT<span class="text-blue-600">Core</span>
                    </span>
                </div>

                <div>
                    <button id="menuButton" class="ph-bold ph-list text-2xl dark:text-white hover:bg-blue-800 rounded-full px-1"></button>
                </div>
            </div>

            <nav class="flex-1 space-y-8">

                <div>
                    <p class="px-3 mb-3 text-xs font-semibold text-gray-400 uppercase tracking-wider">Main Menu</p>
                    <ul class="space-y-1">
                        <li>
                            <a href="" class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-blue-900/20 group transition-all {{ request()->routeIs('dashboard') ? 'bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400' : '' }}">
                                <i class="fa-solid fa-chart-pie w-5 h-5 transition duration-75 group-hover:text-blue-600"></i>
                                <span class="ms-3 font-medium">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center p-3 text-gray-700 rounded-xl dark:text-gray-200 hover:bg-blue-50 dark:hover:bg-blue-900/20 group transition-all">
                                <i class="fa-solid fa-microchip w-5 h-5 transition duration-75 group-hover:text-blue-600"></i>
                                <span class="ms-3 font-medium">Devices</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="pt-6 mt-6 border-t border-gray-200 dark:border-gray-700">

                @if (Auth::check())
                    <div class="flex items-center px-2">
                        <div class="flex-shrink-0">
                            <img class="w-10 h-10 rounded-xl border-2 border-blue-500 p-0.5" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D8ABC&color=fff" alt="User image">
                        </div>
                        <div class="ms-3 overflow-hidden">
                            <p class="text-sm font-bold text-gray-800 dark:text-white truncate">{{ Auth::user()->name }}</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400 truncate">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                @else
                    <div class="flex items-center px-2">
                        <a href="{{ route('login') }}" class="font-medium text-lg py-2 hover:dark:bg-blue-600/60 text-white w-full rounded-lg px-3">
                            Login
                        </a>
                    </div>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full flex items-center p-3 text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-xl transition-all font-semibold text-sm">
                        <i class="fa-solid fa-right-from-bracket w-5 h-5"></i>
                        <span class="ms-3">Sign Out</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>
    {{-- <aside id="display" class="fixed left-0 top-0 z-50 h-screen w-16 transition-transform bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 py-5 flex justify-center">
        <div>
            <button class="ph-bold ph-list text-2xl dark:text-white hover:bg-blue-800 rounded-full px-1"></button>
        </div>
    </aside> --}}
</div>
@push('script')
    @vite(['resources/js/sidebar.js'])
@endpush
