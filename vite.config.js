import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/main.css',
                'resources/css/admin_customization.css',
                'resources/js/custom.js',
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/panzoom.js'
                // 'resources/img/',
                // 'resources/js/',
            ],
            refresh: [{
                paths: ['resources/**', 'config/**', 'app/Http/Controllers/**'],
                config: {delay: 300}
            }]
        }),
    ],
});
