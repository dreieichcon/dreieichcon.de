import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/',
                'resources/img/',
                'resources/js/',
            ],
            refresh: [{
                paths: ['resources/**', 'config/**', 'app/Http/Controllers/**'],
                config: { delay: 300 }
            }]
        }),
    ],
});
