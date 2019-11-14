export default {
  mutations: {
    getLocalCart(state, cart) {
      cart = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : []
      state.cart = cart
    },
    clickBuy(state, item) {
      let product = state.cart.find((el) => el.id === item.id)
      if (product) state.cart = state.cart.filter(function(el) {return el !== product})
      else {
        product = Object.assign({count: 1},item)
        state.cart.push(product)
      }
      state.jsonCart=JSON.stringify(state.cart)
    },
    addToCart(state, item) {
      let product = state.cart.find((el) => el.id === item.id)
      if (product) product.count ++
      else {
        product = Object.assign({count: 1},item)
        state.cart.push(product)
      }
      state.jsonCart=JSON.stringify(state.cart)
    },
    removeFromCart(state, item) {
      let product = state.cart.find((el) => el.id === item.id)
      if (product.count > 1) product.count --
      else state.cart = state.cart.filter(function(el) {return el !== product})
      state.jsonCart=JSON.stringify(state.cart)
    },
    setCart(state) {
      state.cart = JSON.parse(state.jsonCart)
    }
  },
  state: {
    cart: [],
    jsonCart: []
  },
  getters: {
    allCart(state) {
      return state.cart
    },
    getJsonCart(state) {
      return state.jsonCart
    },
  }
}




// getters: {
//   getCartItem: state => id => {
//     return state.cart.products.find(item => item.id === id);
//   }
// },
// mutations: {
//   increment(state) {
//     state.count++
//   },
//   fetchGoods(state, goods) {
//     state.goods.products = goods
//     state.goods.loading = false
//   },
//   addToCart(state, item) {
//     let cartItem = state.cart.products.find((el) => el.id === item.id)
//     if (cartItem) cartItem.count++
//     else {
//       let newItem = Object.assign(item,{count: 1})
//       state.cart.products.push(newItem)
//     }

//   },
//   removeFromCart(state, item) {
//     let cartItem = state.cart.products.find((el) => el.id === item.id)
//     if (cartItem.count < 1) {
//       state.cart.products = state.cart.products.filter(el => el != item)
//     } else {
//       cartItem.count --
//     }
//   },
//   clickBuy(state, item) {
//     if(state.cart.products.find((el) => el.id === item.id)) {
//       state.cart.products = state.cart.products.filter(el => el != item)
//     }
//     else this.commit('addToCart',item)
//   },
//   changeCart(state, param) {
//     const id = param.id
//     const action = param.action
//     let item = state.cart.products.find((item) => item.id === id)
//     if (action == 'add') {
//       item.count ++
//     } else if (action == 'sub') {
//       if (item.count > 1) {
//         item.count --
//       } else {
//         state.cart.products = state.cart.products.filter(el => el != item)
//       }
//     }
//   }
// }