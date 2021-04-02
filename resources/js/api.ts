import { Post, Project, User, Badge, PaginateResponse } from './models';
import { AxiosPromise, AxiosRequestConfig, AxiosResponse } from 'axios'

const API_URL = "/api";

/**
 *
 * @param method
 * @param path
 * @param data
 * @param headers
 */
const fetchResource = <T = any>(method: string, path: string, data = {}, headers = {}) : Promise<AxiosResponse<T>> => {

    let url = `${ API_URL }${ path }`;
    if(path === '/logout' || path === '/login' || path === '/register') url = path;

    // Variable which will be used for storing response

    return ((window as any).axios({
        method: method,
        url: url,
        data: data,
        headers: headers
    } as AxiosRequestConfig) as AxiosPromise<T>).then(response => {

        return response;

    }).catch(error => {
        if (error.response) {
            /*
             * The request was made and the server responded with a
             * status code that falls out of the range of 2xx
             */
            return error.response;
        }
        throw error;
    })
}

let API = {
    /**
     * Search posts and users from a query
     * @param query
     */
    search: function(query: string){
        const url = `/search/${query}`;
        return fetchResource<Array<User>>('get', url);
    },
    /**
     * Logout the user
     */
    logout: function() {
        const url = '/logout';
        return fetchResource('post', url);
    },
    /**
     * Login the user
     */
    login: function(credentials: object) {
        const url = '/login';
        return fetchResource('post', url, credentials);
    },
    /**
     * Register a new user
     */
    register: function(credentials: object) {
        const url = '/register';
        return fetchResource('post', url, credentials);
    },
    /**
     * Post API wrapper
     */
    Post: {
        /**
         * Base post requests url
         */
        url: '/posts',
        /**
         * Like a post
         * @param id
         */
        like: function(id: number) {
            const url = `${this.url}/${id}/like`;
            return fetchResource('get', url);
        },
        /**
         * Unike a post
         * @param id
         */
        unlike: function(id: number) {
            const url = `${this.url}/${id}/unlike`;
            return fetchResource('get', url);
        },
        /**
         * Create a new post
         * @param content Post content
         * @param project_author Project author id
         * @param reshare Reshared post id
         * @param images Post images
         */
        create: function(content: string, project_author : number | null = null, reshare : number | null = null, images: Array<File> | null = null) {
            const url = `${this.url}`;
            let formData = new FormData();
            // Post content
            formData.append('content', content);

            // Project author (if necessary)
            if (project_author) formData.append('project', String(project_author));

            // Post reshared (if necessary)
            if (reshare) formData.append('reshare', String(reshare));

            // Post images
            if (images) {
                images.forEach((image, index) => {
                    formData.append(`image[${index}]`, image);
                });
            }
            return fetchResource<Post>('post', url, formData, {
                'Content-Type': 'multipart/form-data'
            });
        }
    },
    /**
     * User API wrapper
     */
    User: {
        /**
         * Base user request url
         */
        url: '/users',
        /**
         * Search users that correspond to the given query string
         * @param query Query string
         */
        search: function(query: string) {
            const url = `${this.url}/search/${query}`;
            return fetchResource<Array<User>>('get', url);
        },
        /**
         * Get the corresponding user
         * @param id User id
         */
        get: function(id: string) {
            const url = `${this.url}/${id}`;
            return fetchResource<User>('get', url);
        }
    },
    /**
     * Project API wrapper
     */
    Project: {
        /**
         * Base project requests url
         */
        url: '/projects',
        /**
         * Get a project corresponding to the id passed to the function
         * @param id Project id
         */
        get: function(id: number) {
            const url = `${this.url}/${id}`;
            return fetchResource<Project>('get', url);
        },
        /**
         * Make the authenticated user follows the project
         * @param id Project id
         */
        follow: function(id: number) {
            const url = `${this.url}/${id}/follow`;
            return fetchResource('get', url);
        },
        /**
         * Make the authenticated user unfollows the project
         * @param id Project id
         */
        unfollow: function(id :number) {
            const url = `${this.url}/${id}/unfollow`;
            return fetchResource('get', url);
        },
        /**
         * Get projects corresponding to the ids passed to the function
         * @param projects_ids Project ids to restrieve
         */
        getMany: function(projects_ids: Array<number> = []) {
            const url = `${this.url}/get`;
            return fetchResource<Array<Project>>('post', url, {projects_ids: projects_ids});
        }
    },
    /**
     * Tag API wrapper
     */
    Tag: {
        /**
         * Base tag requests url
         */
        url: '/tags',
        /**
         * Search tags that correspond to the given query string
         * @param {string} query Query string
         * @return {Promise<Array<Tag>>} Tags
         */
        // search: function(query: string) : Promise<Array<Tag>> {
        //     const url = `${this.url}/search/${query}`;
        //     return fetchResource('get', url);
        // }
    },
    /**
     * Badge API wrapper
     */
    Badge: {
        /**
         * Base badge requests url
         */
        url: '/badges',
        /**
         * Search badges that correspond to the given query string
         * @param query Query string
         */
        search: function(query: string) {
            const url = `${this.url}/search/${query}`;
            return fetchResource<Array<Badge>>('get', url);
        }
    },
    /**
     * Comment API wrapper
     */
    Comment: {
        /**
         * Base comment requests url
         */
        url: '/comments',
        /**
         * Get many comments
         * @param ids
         */
        getMany : function(ids: Array<number>) {
            const url = `${this.url}/get`;
            return fetchResource<Array<Comment>>('post', url, {comments_ids: ids});
        },
        /**
         * Create a new comment
         * @param content Comment content
         * @param post Post id
         */
        create: function(content: string, post: number) {
            const url = this.url;
            return fetchResource<Comment>('post', url, {
                content: content,
                post_id: post
            });
        }
    },
    Feed: {
        /**
         * Load user feed and return loaded posts
         * @param page Page to load
         */
        get: function(page: number = 1) {
            const url = `/feed?page=${ page }`;
            return fetchResource<PaginateResponse<Post>>('get', url);
        },
    }
};

export { API };
