import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';
import path from 'path';

export default defineConfig({
  plugins: [
    laravel({
      input: [
        'src/resources/assets/js/t-components.js',
        'src/resources/assets/js/t-docs.js',
        'src/resources/assets/sass/t-components.scss',
        'src/resources/assets/sass/tgn-web.scss',
        'src/resources/assets/sass/tgn-site.scss',
        'src/resources/assets/sass/tgn-form.scss'
      ],
      refresh: true,
    }),
    viteStaticCopy({
        targets: [
          { src: 'src/resources/assets/images', dest: 'images' },
          { src: 'fonts', dest: 'fonts' },
          { src: 'images', dest: 'images' },
        ],
    }),
  ],
  resolve: {
    alias: {
        '@': path.resolve(__dirname, 'src/resources/assets'),
    },
},
  css: {
    preprocessorOptions: {
      scss: {
        // additionalData: `@import "bootstrap/scss/functions";`,
        // additionalData: `@use "src/resources/assets/sass/t-variables.scss" as *;`,
        // additionalData: `@import "src/resources/assets/sass/_variables.scss";` // Importa tus variables globales si es necesario
        includePaths: ["node_modules"],
      },
    },
  },
  build: {
    rollupOptions: {
      input: {
        tComponents: 'src/resources/assets/js/t-components.js',
        tDocs: 'src/resources/assets/js/t-docs.js',
        't-components-style': 'src/resources/assets/sass/t-components.scss',
        // 'tgn-web-style': 'src/resources/assets/sass/tgn-web.scss',
        // 'tgn-site-style': 'src/resources/assets/sass/tgn-site.scss',
        // 'tgn-form-style': 'src/resources/assets/sass/tgn-form.scss'
      },
      output: {
        dir: 'public',
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/[name].js',
        assetFileNames: ({ name }) => {
          if (name.endsWith('.css')) {
            return 'css/[name].css';
          }
          if (name.endsWith('.scss')) {
            return 'css/[name].css';
          }
          return 'assets/[name]';
        },
      },
    },
  },
    server: {
        watch: {
            usePolling: true,
        },
    },
});
