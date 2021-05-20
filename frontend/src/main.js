import { createApp } from 'vue'
import App from './App.vue'
import { baseUrl, siteUrl } from './helpers/url'
import router from './router'
import store from './store'

import '@/styles/main.sass'

const app = createApp(App)

app.config.globalProperties.$baseUrl = baseUrl
app.config.globalProperties.$siteUrl = siteUrl

app.use(router)
app.use(store)

app.mount('#app')
