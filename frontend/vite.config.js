import { defineConfig } from 'vite'
import { createVuePlugin } from 'vite-plugin-vue2'
import liveReload from 'vite-plugin-live-reload'
import { resolve } from 'path'

console.log(process.env.APP_ENV);

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    createVuePlugin(),

    // As the app is SPA
    // We only needs to listen the changes on index.vue.php file for reloading
    // Feel free to edit this part to met your needs
    liveReload(__dirname + '/../application/views/index.vue.php')
  ],

  root: 'src',
  base: './',

  build: {
    // output dir for production build
    outDir: resolve(__dirname, '../assets/vue'),
    emptyOutDir: true,

    // emit manifest so PHP can find the hashed files
    manifest: true,

    // esbuild target
    target: 'es2018',

    // our entry
    rollupOptions: {
      input: '/main.js'
    }
  },

  server: {
    // required to load scripts from custom host
    cors: true,

    // we need a strict port to match on PHP side
    // change freely, but update on PHP to match the same port
    strictPort: true,
    port: 3000
  },

  // required for in-browser template compilation
  // https://v3.vuejs.org/guide/installation.html#with-a-bundler
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm.js',
      '@': resolve(__dirname, './src')
    }
  }
})
