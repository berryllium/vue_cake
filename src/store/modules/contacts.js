export default {
  actions: {
    fetchContacts(ctx) {
      fetch("admin/api.php?contacts=true")
        .then(response => response.json())
        .then(json => {
          ctx.commit('setContacts', json)
        })
    }
  },
  mutations: {
    setContacts(state, contacts) {
      state.contacts = contacts
    }
  },
  state: {
    contacts: []
  },
  getters: {
    allContacts(state) {
      return state.contacts
    }
  }
}