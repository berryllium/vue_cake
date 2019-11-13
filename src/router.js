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
      path: '/каталог',
      component: () => import('./views/Catalog.vue')
    },
    {
      path: '/о_нас',
      component: () => import('./views/About.vue')
    },
    {
      path: '/доставка',
      component: () => import('./views/Delivery.vue')
    },
    {
      path: '/контакты',
      component: () => import('./views/Contacts.vue')
    },
    {
      path: '/корзина',
      component: () => import('./views/Cart.vue')
    },
  ]
})