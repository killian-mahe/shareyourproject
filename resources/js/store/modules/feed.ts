import { AxiosStatic } from 'axios'
import { API } from '../../api'
import { Post, User } from '../../models'
import { FeedState } from './types'

// initial state
const state : FeedState = {
    currentPage: 0,
    lastPage: 1,
    posts: []
}

type State = typeof state

// getters
const getters = {
    feedPosts(state: State): Array<Post> {
        return state.posts;
    }
}

// actions
const actions = {
    getNewPosts({commit, state}:any) {
        if (state.currentPage == state.lastPage) return;

        API.Feed.get(state.currentPage+1).then(response => {
            switch (response.status) {
                case 200:
                    commit('ADD_POSTS', response.data.data);
                    commit('SET_LAST_PAGE', response.data.meta.last_page);
                    commit('SET_CURRENT_PAGE', response.data.meta.current_page);
                    break;

                default:
                    break;
            }
        })
    }
}

// mutations
const mutations = {
    ADD_POSTS (state: State, posts: Array<Post>) {
        state.posts.push(...posts);
    },
    SET_CURRENT_PAGE(state: State, page: number) {
        state.currentPage = page;
    },
    SET_LAST_PAGE (state: State, page: number) {
        state.lastPage = page > 0 ? page : 0;
    }
}

export default {
  state,
  getters,
  actions,
  mutations
}
