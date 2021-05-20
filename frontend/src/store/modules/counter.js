const namespaced = true

const state = {
  counter: 0
}

const actions = {
  increaseCounter({ commit }) {
    commit('increaseCounter')
  },
  decreaseCounter({ commit }) {
    commit('decreaseCounter')
  }
}

const mutations = {
  increaseCounter(state) {
    state.counter++
  },
  decreaseCounter(state) {
    state.counter--
  }
}

const getters = {
  powerCounter(state) {
    return state.counter * state.counter
  }
}

export default {
  namespaced,
  state,
  actions,
  mutations,
  getters
}