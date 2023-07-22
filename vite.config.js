import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
// import jquery from 'jquery';
import * as $ from 'jquery';

export default defineConfig({
  plugins: [
    laravel({
        input: [
            'resources/sass/app.scss',
            'resources/js/app.js',
        ],
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
    // jquery()
],
resolve: {
    alias: {
        vue: 'vue/dist/vue.esm-bundler.js',
    },
},
esbuild: {
    // This will exclude jQuery from the bundle
    // as it will be loaded from the CDN
    external: ['jquery'],
  },
    // ],
    // resolve: {
    //     alias: {
    //         '$': 'jQuery'
    //     },
    // },
});
