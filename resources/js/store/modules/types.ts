import { Post, User } from "../../models";

export interface AuthState {
    authUser?: User
}

export interface FeedState {
    currentPage: number,
    lastPage: number,
    posts: Array<Post>
}
