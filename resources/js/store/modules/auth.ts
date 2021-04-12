import { AxiosStatic } from 'axios'
import { API } from '../../api'
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
    },
    user(state: State): User | undefined {
        return state.authUser;
    }
}

// actions
const actions = {
    me ({ commit }: any) {
        return ((window as any).axios as AxiosStatic).get<User>('/api/user').then((response) => {
          commit('SET_USER', response.data);
        }).catch(() => {
          commit('SET_USER', null);
        })
      }
}

// mutations
const mutations = {

    SET_USER (state: State, user: User) {
        state.authUser = user;
    }
}

export default {
  state,
  getters,
  actions,
  mutations
}
