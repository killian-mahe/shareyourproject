import { User } from '../../models'
import { AuthState } from './types'

// initial state
const state : AuthState = {
    authUser: undefined
}

type State = typeof state

// getters
const getters = {
    isAuthenticated(state: State): boolean{
        return !!state.authUser;
    }
}

// actions
const actions = {
}

// mutations
const mutations = {
}

export default {
  state,
  getters,
  actions,
  mutations
}
