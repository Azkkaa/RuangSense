import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/sidebar.js',
                'resources/js/echo.js',

                'resources/js/device/store.js',
                'resources/js/device/search.js',

                'resources/js/theme/darkLight.js',
                'resources/js/listen/listen.js',
            ],
            refresh: true,
        }),
    ],
});
