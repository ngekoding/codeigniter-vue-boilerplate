import { createStore } from 'vuex'

import counterModule from './modules/counter'

export default createStore({
  modules: {
    counter: counterModule
  }
})
