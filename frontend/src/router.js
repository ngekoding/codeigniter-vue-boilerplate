import Vue from 'vue'
import VueRouter from 'vue-router'
import { baseUrl, siteUrl } from '@/helpers/url'

import BasicLayout from '@/layouts/BasicLayout.vue'

import Home from '@/pages/Home.vue'
import About from '@/pages/About.vue'
import NotFound from '@/pages/NotFound.vue'

const routes = [
  {
    path: siteUrl + '/site',
    alias: [
      siteUrl,
      baseUrl
    ],
    component: BasicLayout,
    children: [
      {
        path: '',
        name: 'Home',
        component: Home
      },
      {
        path: 'about',
        name: 'About',
        component: About
      }
    ],
  },
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    component: NotFound
  },
]

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
