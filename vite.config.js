import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import { VitePWA } from 'vite-plugin-pwa';

export default defineConfig({
    plugins: [
        laravel({
            input: 'resources/js/app.js',
            ssr: 'resources/js/ssr.js',
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        VitePWA({
            useCredentials: true,
            injectRegister: 'auto',
            registerType: 'autoUpdate',
            devOptions: {
                enabled: true,
            },
            manifest: {
                name: "PokemonCheckList",
                short_name: "PokemonCheckList",
                description: "PokemonCheckList",
                theme_color: '#ffffff',
                background_color: '#ffffff',
                icons: [
                    {
                        src: '/storage/generic/192x192.png',
                        sizes: '192x192',
                        type: 'image/png',
                    },
                    {
                        src: '/storage/generic/512x512.png',
                        sizes: '512x512',
                        type: 'image/png',
                    }
                ],
                start_url: '/build/',
                scope: '/build/',
                // display: 'standalone',
                // lang: 'en',
            },
            strategies: 'generateSW',
            serviceWorker: {
                output: 'sw.js',
                registrationStrategy: 'registerImmediately',
                registerType: 'autoUpdate',
                registration: '/build/sw.js',
            }//     'laravel-vite-plugin-manifest.css',
        }),
    ],
});
