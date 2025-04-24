import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/css/styleLandingPage.css',
                'resources/css/menu.css',
                'resources/fonts/stylesheet.css'
            ],
            refresh: true,
        }),
    ],
});
