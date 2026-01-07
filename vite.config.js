import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/*.css',
                'resources/js/*.js',
            ],
            refresh: [
                'resources/**/*.blade.php',
                'app/Livewire/**/*.php',
                'app/Http/Livewire/**/*.php',
            ],
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
