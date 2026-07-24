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
                'resources/css/components/travel/travel-element.css',
                'resources/css/components/document/document-element.css',
                'resources/js/app.js',
                'resources/js/travels.js',
                'resources/js/travel.js',
                'resources/js/components/modal.js',
                'resources/js/components/travel/travel-element.js',
                'resources/js/components/document/accommodation-element.js',
                'resources/js/components/document/bus-element.js',
                'resources/js/components/document/train-element.js',
                'resources/js/components/document/flight-element.js',
                'resources/js/components/document/ship-element.js',
                'resources/js/components/timeline/timeline.js',
                'resources/css/components/timeline/timeline.css',
                'resources/js/components/timeline/events/bus-departure-event.js',
                'resources/js/components/timeline/events/bus-arrival-event.js',
                'resources/js/components/timeline/events/flight-departure-event.js',
                'resources/js/components/timeline/events/flight-arrival-event.js',
                'resources/js/components/timeline/events/train-departure-event.js',
                'resources/js/components/timeline/events/train-arrival-event.js',
                'resources/js/components/timeline/events/ship-departure-event.js',
                'resources/js/components/timeline/events/ship-arrival-event.js',
                'resources/js/components/timeline/events/accommodation-check-in-event.js',
                'resources/js/components/timeline/events/accommodation-check-out-event.js',
                'resources/js/components/timeline/elements/element-header.js',
                'resources/js/components/timeline/elements/element-dates-container.js',
                'resources/js/components/timeline/elements/element-label.js',

            ],
            refresh: true,
        }),
    ],
});
