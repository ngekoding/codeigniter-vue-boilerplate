# CodeIgniter 3 + Vue.js 3 + Vite

## Looking for Vue 2? Please check branch [vue2](https://github.com/ngekoding/codeigniter-vue-boilerplate/tree/vue2)

Just a basic example how to integrating CodeIgniter 3 + Vue.js 3 + Vite with supported Hot Module Replacement (HMR).

If you loves CodeIgniter 3 & Vue.js, you must try this one to make your life easier!

**Some changes to make this works!**
1. application/helpers/vite_helper.php
2. application/controllers/Vue.php
3. application/config/routes.php
4. application/views/index.vue.php
5. frontend/vite.config.js

## Running the project
1. Setting CodeIgniter base_url at application/config/config.php
2. Open Terminal/CMD and enter to ```frontend``` directory
3. Install vue project dependencies: ```npm install```
4. Run for development: ```npm run dev```
5. Run for production: ```npm run build```
6. Open the browser and go to the project address, e.g. ```http://localhost/codeigniter-vue-boilerplate/```
7. Enjoy!

## Features / ideas

I try to keep this project as simple as possible, so you can making a changes to suit your needs. No need to install a bunch of libraries for making something simple.

### Restful API support: response helper, ajax request validation ✅ 
- application/config/routes.php
- application/core/MY_Controller.php
- application/controllers/api/*
- Changes: [b5f80ab](https://github.com/ngekoding/codeigniter-vue-boilerplate/commit/b5f80ab8261ce2e871951a5979b71eab38a903fd) & [88fbda2](https://github.com/ngekoding/codeigniter-vue-boilerplate/commit/88fbda2d5500056c6ae2985a42013baca609702b)

### Middlewares ✅
- application/core/MY_Controller.php
- application/middlewares/*
- application/helpers/auth_helper.php
- application/config/config.php
- application/config/routes.php
- application/config/autoload.php
- application/controllers/api/v1/Auth.php
- application/controllers/api/v1/User.php
- Changes: [03c8145](https://github.com/ngekoding/codeigniter-vue-boilerplate/commit/03c814542611424efd70407f6b4e2e023500cdc4)

Powered by [ngekoding.github.io](https://ngekoding.github.io)
