import Vue from 'vue'
import Vuex from 'vuex'
import catalog from './modules/catalog'
import cart from './modules/cart'
import contacts from './modules/contacts'
import createPersistedState from 'vuex-persistedstate'
Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    catalog,
    cart,
    contacts
  },
  plugins: [createPersistedState({
    paths: ['cart'],
  })]
})


