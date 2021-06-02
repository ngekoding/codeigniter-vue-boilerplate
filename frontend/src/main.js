import Vue from 'vue'
import App from './App.vue'
import { baseUrl, siteUrl } from './helpers/url'
import router from './router'
import store from './store'

import '@/styles/main.sass'

Vue.prototype.$baseUrl = baseUrl
Vue.prototype.$siteUrl = siteUrl

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
