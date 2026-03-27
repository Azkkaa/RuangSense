<x-guest-layout>
    <div class="min-h-[80vh] flex items-center justify-center px-4">
        <div class="max-w-md w-full text-center">

            <div class="relative mb-8 inline-block">
                <div class="w-24 h-24 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mx-auto text-red-600 animate-pulse">
                    <i class="fa-solid fa-shield-lock text-4xl"></i>
                </div>
                <div class="absolute -top-2 -right-2 w-8 h-8 bg-white dark:bg-gray-900 border-4 border-gray-100 dark:border-gray-800 rounded-full flex items-center justify-center text-red-500">
                    <i class="fa-solid fa-triangle-exclamation text-xs"></i>
                </div>
            </div>

            <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white mb-3">
                Access Restricted
            </h1>
            <p class="text-gray-600 dark:text-gray-400 mb-10 leading-relaxed">
                Oops! It looks like you're trying to access a secure IoT area. You need to be logged in to monitor devices and manage sensors.
            </p>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                <a href="{{ route('login') }}" class="flex items-center justify-center gap-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-xl shadow-lg shadow-blue-500/30 transition-all transform hover:-translate-y-1">
                    <i class="fa-solid fa-right-to-bracket"></i> Login Now
                </a>
                <a href="/" class="flex items-center justify-center gap-2 px-6 py-3 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-all">
                    <i class="fa-solid fa-house"></i> Back Home
                </a>
            </div>

            <p class="mt-10 text-xs text-gray-400">
                Don't have an account yet?
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline font-bold">Register here</a>
            </p>
        </div>
    </div>
</x-guest-layout>
