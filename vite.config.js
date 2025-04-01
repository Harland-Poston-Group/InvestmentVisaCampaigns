import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/scss/app.scss',
                'resources/scss/chat.scss',
                'resources/js/app.js',
                'resources/js/private-meetings.js',
                'resources/js/campaigns.js',
                'resources/js/residency.js',
                'resources/js/notify.js',
                'resources/css/residency.css',
                'resources/scss/private-meetings.scss',
                'resources/scss/campaigns.scss',
                'resources/scss/always_on.scss',
            ],
            refresh: true,
        }),
    ],
});
