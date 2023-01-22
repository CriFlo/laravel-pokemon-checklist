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
            registerSW: true,
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
                theme_color: '#000000',
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
            },
            strategies: 'autoUpdate',
            // serviceWorker: {
            //     output: 'sw.js',
            //     registrationStrategy: 'registerImmediately',
            //     registerType: 'autoUpdate',
            //     registration: '/build/sw.js',
            // },
        }),
    ],
});
