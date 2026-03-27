<x-guest-layout>
    <div class="relative">
        <div class="mb-8 text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 dark:text-white">
                Create Account
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Join our IoT platform to start monitoring your sensors.
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <div class="group">
                <x-input-label for="name" :value="__('Full Name')" class="group-focus-within:text-blue-500 transition-colors" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <x-text-input id="name"
                        class="block w-full pl-10 bg-gray-50 dark:bg-gray-900/50 border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 rounded-xl transition-all"
                        type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                        placeholder="John Doe" />
                </div>
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs" />
            </div>

            <div class="group">
                <x-input-label for="email" :value="__('Email Address')" class="group-focus-within:text-blue-500 transition-colors" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <x-text-input id="email"
                        class="block w-full pl-10 bg-gray-50 dark:bg-gray-900/50 border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 rounded-xl transition-all"
                        type="email" name="email" :value="old('email')" required autocomplete="username"
                        placeholder="name@company.com" />
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs" />
            </div>

            <div class="group">
                <x-input-label for="password" :value="__('Password')" class="group-focus-within:text-blue-500 transition-colors" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500">
                        <i class="fa-solid fa-lock"></i>
                    </div>
                    <x-text-input id="password"
                        class="block w-full pl-10 bg-gray-50 dark:bg-gray-900/50 border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 rounded-xl transition-all"
                        type="password"
                        name="password"
                        required autocomplete="new-password"
                        placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs" />
            </div>

            <div class="group">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="group-focus-within:text-blue-500 transition-colors" />
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500">
                        <i class="fa-solid fa-shield-check"></i>
                    </div>
                    <x-text-input id="password_confirmation"
                        class="block w-full pl-10 bg-gray-50 dark:bg-gray-900/50 border-gray-300 dark:border-gray-700 focus:ring-blue-500 focus:border-blue-500 rounded-xl transition-all"
                        type="password"
                        name="password_confirmation"
                        required autocomplete="new-password"
                        placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs" />
            </div>

            <div class="pt-4 space-y-4">
                <x-primary-button class="w-full justify-center py-3 bg-blue-600 hover:bg-blue-700 shadow-lg shadow-blue-500/30 rounded-xl text-sm font-bold tracking-widest transition-all transform hover:-translate-y-0.5">
                    {{ __('CREATE ACCOUNT') }}
                    <i class="fa-solid fa-user-plus ms-2"></i>
                </x-primary-button>

                <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Already have an account?') }}
                    <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 font-bold hover:underline">
                        {{ __('Log in') }}
                    </a>
                </p>
            </div>
        </form>
    </div>
</x-guest-layout>
