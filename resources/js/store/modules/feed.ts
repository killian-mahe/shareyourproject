import { AxiosStatic } from 'axios'
import { API } from '../../api'
import { Post, User } from '../../models'
import { FeedState } from './types'

// initial state
const state : FeedState = {
    nextPage: 1,
    lastPage: undefined,
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
        API.Feed.get(state.nextPage).then(response => {
            switch (response.status) {
                case 200:
                    commit('ADD_POSTS', response.data.data);
                    commit('SET_LAST_PAGE', response.data.meta.last_page);
                    commit('INCREMENT_NEXT_PAGE');
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
    SET_NEXT_PAGE(state: State, page: number) {
        state.nextPage = page > 0 ? page : 0;
    },
    INCREMENT_NEXT_PAGE (state: State) {
        state.nextPage ++;
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
