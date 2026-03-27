<x-guest-layout>
    <div class="relative">
        <div class="absolute right-0">
            <x-button-theme class="p-2 rounded-full bg-white dark:bg-gray-800 shadow-sm border border-gray-200 dark:border-gray-700"/>
        </div>

        <div class="mb-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                Welcome Back
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Please enter your details to access IoT Dashboard
            </p>
        </div>

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <div class="group">
                <x-input-label for="email" :value="__('Email Address')" class="group-focus-within:text-blue-500 transition-colors" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <x-text-input id="email"
                        class="block w-full pl-10 bg-gray-50 dark:bg-gray-900/50 border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 rounded-xl transition-all"
                        type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                        placeholder="name@company.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
            </div>

            <div class="group">
                <div class="flex justify-between items-center">
                    <x-input-label for="password" :value="__('Password')" class="group-focus-within:text-blue-500 transition-colors" />
                    @if (Route::has('password.request'))
                        <a class="text-xs text-blue-600 dark:text-blue-400 hover:underline font-medium" href="{{ route('password.request') }}">
                            {{ __('Forgot password?') }}
                        </a>
                    @endif
                </div>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <x-text-input id="password"
                        class="block w-full pl-10 bg-gray-50 dark:bg-gray-900/50 border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 rounded-xl transition-all"
                        type="password"
                        name="password"
                        required autocomplete="current-password"
                        placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
            </div>

            <div class="flex items-center justify-between mt-2">
                <label for="remember_me" class="inline-flex items-center cursor-pointer">
                    <input id="remember_me" type="checkbox" class="w-4 h-4 rounded border-gray-300 dark:border-gray-700 text-blue-600 shadow-sm focus:ring-blue-500 dark:bg-gray-900" name="remember">
                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 transition-colors">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="pt-2">
                <x-primary-button class="w-full justify-center py-3 bg-blue-600 hover:bg-blue-700 active:bg-blue-800 focus:ring-blue-500 shadow-lg shadow-blue-500/30 rounded-xl text-sm font-bold tracking-widest transition-all transform">
                    {{ __('LOG IN') }}
                    <i class="fa-solid fa-arrow-right-to-bracket ms-2"></i>
                </x-primary-button>
            </div>

            <p class="text-center text-sm text-gray-500 dark:text-gray-400 mt-6">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline">Sign Up</a>
            </p>
        </form>
    </div>
</x-guest-layout>
