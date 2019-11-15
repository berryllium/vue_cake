export default {
  actions: {
    fetchCatalog(ctx) {
      fetch("admin/api.php")
        .then(response => response.json())
        .then(json => ctx.commit('updateCatalog', json))
    }
  },
  mutations: {
    updateCatalog(state, catalog) {
      state.catalog = catalog
      state.loading = false
    }
  },
  state: {
    catalog: [],
    loading: true
  },
  getters: {
    allCatalog(state) {
      return state.catalog
    },
    loadingState(state) {
      return state.loading
    }
  }
}