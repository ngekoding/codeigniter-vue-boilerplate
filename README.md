# CodeIgniter 3 + Vue.js 3 + Vite

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
6. Open the browser and go to the project address, e.g. ```http://localhost/codeigniter3-vuejs3-vite-boilerplate/```
7. Enjoy!

## Features / ideas

I try to keep this project as simple as possible, so you can making a changes to suit your needs. No need to install a bunch of libraries for making something simple.

### Restful API support: response helper, ajax request validation ✅
- application/config/routes.php
- application/core/MY_Controller.php
- application/controllers/api/*

### Middlewares
- Not implemented yet!

Powered by [ngekoding.github.io](https://ngekoding.github.io)
