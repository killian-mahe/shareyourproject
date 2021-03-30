import { createStore } from 'vuex'
import auth from './modules/auth'
import feed from './modules/feed'

// Create a new store instance.
export default createStore({
  modules: {
    auth,
    feed
  }
})
