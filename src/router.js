import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/views/Home'
Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      component: Home
    },
    {
      path: '/catalog',
      component: () => import('./views/Catalog.vue')
    },
    {
      path: '/about',
      component: () => import('./views/About.vue')
    },
    {
      path: '/delivery',
      component: () => import('./views/Delivery.vue')
    },
    {
      path: '/contacts',
      component: () => import('./views/Contacts.vue')
    },
  ]
})