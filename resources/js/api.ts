import {Post, Project, User} from './models';
import { AxiosRequestConfig } from 'axios'

const API_URL = "/api";

/**
 *
 * @param {String} method
 * @param {String} path
 * @param {?Object} data
 * @param {?Object} headers
 * @return {Promise}
 */
const fetchResource = (method: string, path: string, data = {}, headers = {}) => {

    let url = `${ API_URL }${ path }`;
    if(path === '/logout') url = path;

    // Variable which will be used for storing response

    return window.axios({
        method: method,
        url: url,
        data: data,
        headers: headers
    } as AxiosRequestConfig).then(response => {

        if (response.status >= 200 && response.status < 300) {
            return response.data;
        } else {
            throw response;
        }
    })
}

let API = {
    /**
     * Search posts and users from a query
     * @param {String} query
     * @return {Promise<Array<User | Project>>}
     */
    search: function(query: string) : Promise<Array<User | Project>>{
        const url = `/search/${query}`;
        return fetchResource('get', url);
    },
    /**
     * Logout the user
     * @return {Promise}
     */
    logout: function() {
        const url = '/logout';
        return fetchResource('post', url);
    },
    /**
     * Login the user
     * @return {Promise<User>}
     */
    login: function(credentials: string) : Promise<User> {
        const url = '/login';
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
         * @param {Number} id
         * @return {Promise}
         */
        like: function(id: number) {
            const url = `${this.url}/${id}/like`;
            return fetchResource('get', url);
        },
        /**
         * Unike a post
         * @param {Number} id
         * @return {Promise}
         */
        unlike: function(id: number) {
            const url = `${this.url}/${id}/unlike`;
            return fetchResource('get', url);
        },
        /**
         * Load user feed and return loaded posts
         * @param {?Array<Number>} except_ids Post ids that mustn't be loaded
         * @return {Promise<Array<Post>>}
         */
        feed: function(except_ids: Array<number>) : Promise<Array<Post>>{
            const url = '/feed';
            return fetchResource('post', url, {except: except_ids});
        },
        /**
         * Create a new post
         * @param {String} content Post content
         * @param {?Number} project_author Project author id
         * @param {?Number} reshare Reshared post id
         * @param {?Array<File>} images Post images
         * @return {Promise<Post>}
         */
        create: function(content: string, project_author : number | null = null, reshare : number | null = null, images: Array<File> | null = null) : Promise<Post> {
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
            return fetchResource('post', url, formData, {
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
         * @param {string} query Query string
         * @return {Promise<Array<User>>} Users
         */
        search: function(query: string) : Promise<Array<User>>{
            const url = `${this.url}/search/${query}`;
            return fetchResource('get', url);
        },
        /**
         * Get the corresponding user
         * @param {!Number} id User id
         * @return {Promise<User>} User
         */
        get: function(id: string) : Promise<User> {
            const url = `${this.url}/${id}`;
            return fetchResource('get', url);
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
         * @param {!Number} id Project id
         * @return {Promise<Project>}
         */
        get: function(id: number) : Promise<Project> {
            const url = `${this.url}/${id}`;
            return fetchResource('get', url);
        },
        /**
         * Make the authenticated user follows the project
         * @param {Number} id Project id
         */
        follow: function(id: number) {
            const url = `${this.url}/${id}/follow`;
            return fetchResource('get', url);
        },
        /**
         * Make the authenticated user unfollows the project
         * @param {Number} id Project id
         */
        unfollow: function(id :number) {
            const url = `${this.url}/${id}/unfollow`;
            return fetchResource('get', url);
        },
        /**
         * Get projects corresponding to the ids passed to the function
         * @param {?Array<Number>} projects_ids Project ids to restrieve
         * @return {Promise<Array<Project>>}
         */
        getMany: function(projects_ids: Array<number> = []) : Promise<Array<Project>> {
            const url = `${this.url}/get`;
            return fetchResource('post', url, {projects_ids: projects_ids});
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
        search: function(query: string) : Promise<Array<Tag>> {
            const url = `${this.url}/search/${query}`;
            return fetchResource('get', url);
        }
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
         * @param {string} query Query string
         * @return {Promise<Array<Badge>>} Badges
         */
        search: function(query: string) {
            const url = `${this.url}/search/${query}`;
            return fetchResource('get', url);
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
         * @param {Array<Number>} ids
         * @return {Promise<Array<Comment>>} Comments
         */
        getMany : function(ids: Array<number>) {
            const url = `${this.url}/get`;
            return fetchResource('post', url, {comments_ids: ids});
        },
        /**
         * Create a new comment
         * @param {!String} content Comment content
         * @param {!Number} post Post id
         * @return {Promise<Comment>} Comment
         */
        create: function(content: string, post: number) {
            const url = this.url;
            return fetchResource('post', url, {
                content: content,
                post_id: post
            });
        }
    }
};

export { API };
