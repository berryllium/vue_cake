import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    count: 0,
    goods: {
      products: [],
      loading: true
    },
    cart: {
      products: []
    }
  },
  getters: {
    getCartItem: state => id => {
      return state.cart.products.find(item => item.id === id);
    }
  },
  mutations: {
    increment(state) {
      state.count++
    },
    fetchGoods(state, goods) {
      state.goods.products = goods
      state.goods.loading = false
    },
    addToCart(state, item) {
      let cartItem = state.cart.products.find((el) => el.id === item.id)
      if (cartItem) cartItem.count++
      else {
        let newItem = Object.assign(item,{count: 1})
        state.cart.products.push(newItem)
      }

    },
    removeFromCart(state, item) {
      let cartItem = state.cart.products.find((el) => el.id === item.id)
      if (cartItem.count < 1) {
        state.cart.products = state.cart.products.filter(el => el != item)
      } else {
        cartItem.count --
      }
    },
    clickBuy(state, item) {
      if(state.cart.products.find((el) => el.id === item.id)) {
        state.cart.products = state.cart.products.filter(el => el != item)
      }
      else this.commit('addToCart',item)
    },
    changeCart(state, param) {
      const id = param.id
      const action = param.action
      let item = state.cart.products.find((item) => item.id === id)
      if (action == 'add') {
        item.count ++
      } else if (action == 'sub') {
        if (item.count > 1) {
          item.count --
        } else {
          state.cart.products = state.cart.products.filter(el => el != item)
        }
      }
    }
  }
})


