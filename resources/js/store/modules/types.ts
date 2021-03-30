import { Post, User } from "../../models";

export interface AuthState {
    authUser?: User
}

export interface FeedState {
    nextPage: number,
    lastPage: number | undefined,
    posts: Array<Post>
}
