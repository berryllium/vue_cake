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
    getCountById: state => id => {
      return state.goods.products.find(item => item.id === id);
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
    newBuy(state, id) {
      let item = state.goods.products.find((item) => item.id === id)
      if (item.count) {
        state.cart.products = state.cart.products.filter(el => el != item)
        delete item.count
      } else {
        item.count = 1
        state.cart.products.push(item)
      }
    },
    changeCart(state, param) {
      const id = param.id
      const action = param.action
      console.log(action+id)
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


