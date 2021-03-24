import { createStore } from 'vuex'
import auth from './modules/auth'

// Create a new store instance.
export default createStore({
  modules: {
    auth
  }
})
