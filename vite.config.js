import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/welcome.css',
                'resources/css/auth.css',
                'resources/css/travels.css',
                'resources/css/travel.css',
                'resources/css/components/modal.css',
                'resources/css/components/travel-element.css',
                'resources/css/components/document-element.css',
                'resources/js/app.js',
                'resources/js/travels.js',
                'resources/js/travel.js',
                'resources/js/components/modal.js',
                'resources/js/components/travel-element.js',
                'resources/js/components/accommodation-element.js',
                'resources/js/components/bus-element.js',
                'resources/js/components/train-element.js',
                'resources/js/components/flight-element.js',
            ],
            refresh: true,
        }),
    ],
});
