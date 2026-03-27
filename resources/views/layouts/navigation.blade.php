<nav class="fixed w-full z-50 top-0 start-0 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">

        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <div class="w-9 h-9 bg-blue-600 rounded-lg flex items-center justify-center shadow-lg shadow-blue-500/30 text-white">
                <i class="fa-solid fa-bolt-lightning text-lg"></i>
            </div>
            <span class="self-center text-xl font-bold whitespace-nowrap dark:text-white uppercase tracking-tighter">
                IoT<span class="text-blue-600">Core</span>
            </span>
        </a>

        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse gap-3">
            <x-button-theme class="border border-gray-400"/>

            <div class="flex items-center gap-4">
            @if (Auth::check())
                <div class="relative group">
                    <button class="flex items-center gap-3 p-1.5 pr-4 rounded-2xl bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 hover:border-blue-500 transition-all duration-300">
                        <img class="w-8 h-8 rounded-xl object-cover border border-blue-500/50"
                            src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=2563eb&color=fff"
                            alt="User Avatar">
                        <div class="hidden lg:block text-left">
                            <p class="text-xs font-bold text-gray-800 dark:text-white leading-none">{{ Auth::user()->name }}</p>
                            <p class="text-[10px] text-gray-500 dark:text-gray-400 mt-1">Administrator</p>
                        </div>
                        <i class="fa-solid fa-chevron-down text-[10px] text-gray-400 group-hover:rotate-180 transition-transform duration-300"></i>
                    </button>

                    <div class="absolute right-0 mt-2 w-48 py-2 bg-white dark:bg-gray-800 rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                        <a href="{{ route('user.search-device') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 transition">
                            <i class="fa-solid fa-gauge-high w-4"></i> Dashboard
                        </a>
                        <a href="{{ route('profile.edit') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-600 dark:text-gray-300 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 transition">
                            <i class="fa-solid fa-user-gear w-4"></i> Profile
                        </a>
                        <hr class="my-1 border-gray-100 dark:border-gray-700">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center gap-3 px-4 py-2 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition">
                                <i class="fa-solid fa-power-off w-4"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="hidden md:flex items-center gap-2">
                    <a href="{{ route('login') }}" class="px-6 py-2.5 text-sm font-semibold text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-white transition-colors duration-300">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="relative inline-flex items-center justify-center px-6 py-2.5 overflow-hidden font-bold text-white transition-all duration-300 bg-blue-600 rounded-xl hover:bg-blue-700 group shadow-lg shadow-blue-500/30 transform">
                        <span class="relative flex items-center gap-2">
                            Get Started <i class="fa-solid fa-arrow-right text-xs group-hover:translate-x-1 transition-transform"></i>
                        </span>
                    </a>
                </div>
            @endif
            </div>

            <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <i class="fa-solid fa-bars-staggered text-xl"></i>
            </button>
        </div>

        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:border-gray-700">
                <li>
                    <a href="/" class="block py-2 px-3 text-blue-600 md:p-0 font-bold" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#features" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent">Features</a>
                </li>
                <li>
                    <a href="#about" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-600 md:p-0 dark:text-white dark:hover:bg-gray-700 dark:hover:text-blue-500 md:dark:hover:bg-transparent">About</a>
                </li>
                <li class="md:hidden mt-4 pt-4 border-t border-gray-100 dark:border-gray-700">
                    <a href="{{ route('login') }}" class="block py-2 text-center text-gray-700 dark:text-gray-300 font-bold">Login</a>
                </li>
                <li class="md:hidden mt-2">
                    <a href="{{ route('register') }}" class="block py-3 text-center bg-blue-600 text-white rounded-xl font-bold">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
