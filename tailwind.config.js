import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    safelist: [
        // --- Text ---
        'text-red-700',
        'text-green-500',
        'text-green-700',
        'dark:text-red-300',
        'dark:text-green-300',

        // --- Background ---
        'bg-red-50',
        'bg-red-200',
        'bg-green-50',
        'bg-red-500',
        'dark:bg-green-900/30',
        'dark:bg-red-900/30',

        // --- Border ---
        'border-red-200',
        'border-green-200',
        'dark:border-red-800',
        'dark:border-green-800',

        // --- Other ---
        'animate-spin',
        'backdrop-blur-sm',
        'max-w-md',
        'inline-flex',
        'rounded-full',
        'relative',
  ],

    plugins: [forms],

    darkMode: ['selector', '[data-mode="dark"]']
};
