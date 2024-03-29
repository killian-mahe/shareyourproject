import { Post, Project, User, Badge, PaginateResponse, Tag } from './models';
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
        like: function(post: Post) {
            const url = `${this.url}/${post.id}/like`;
            return fetchResource<Post>('put', url);
        },
        /**
         * Unike a post
         * @param id
         */
        unlike: function(post: Post) {
            const url = `${this.url}/${post.id}/unlike`;
            return fetchResource<Post>('put', url);
        },
        create: function(files: Array<File>, reshare?: Post, content?: string, project?: Project) {
            const url = `${this.url}/create`;

            let formData = new FormData();

            if (files.length > 0) {
                files.forEach((file, index) => {
                    formData.append(`image[${index}]`, file);
                });
            }

            if (reshare) formData.append('reshare', String(reshare.id));
            if (project) formData.append('project', String(project.id));
            if (content) formData.append('content', content);

            return fetchResource<Post>('post', url, formData, {
                'Content-Type': 'multipart/form-data'
            });
        }
    },
    /**
     * Fedd API wrapper
     */
    Feed: {
        /**
         * Load user feed and return loaded posts
         * @param page Page to load
         */
        get: function(page: number = 1) {
            const url = `/feed?page=${ page }`;
            return fetchResource<PaginateResponse<Post>>('get', url);
        },
    },
    /**
     * Project API wrapper
     */
    Project: {
        /**
         *  Base project requests url
         */
        url: '/projects',
        /**
         * Search projects
         */
        search: function(query: string) {
            const url = `${this.url}/search?query=${query}`;
            return fetchResource<Array<Project>>('get', url);
        },
        /**
         * Get a project
         */
        get: function(projectId: number) {
            const url = `${this.url}/${projectId}`;
            return fetchResource<Project>('get', url);
        },
        posts: function(project: Project, page: number = 1) {
            const url = `${this.url}/${project.id}/posts?page=${page}`;
            return fetchResource<PaginateResponse<Post>>('get', url);
        },
        create: function(name: string, description: string, status: string, start_date: Date, collaborators?: Array<number>, badges?: Array<number>, tags?: Array<number>, end_date?: Date) {
            const url = `${this.url}/create`;
            return fetchResource<Project>('post', url, {name, description, status, collaborators, badges, tags, start_date, end_date});
        }
    },
    User: {
        /**
         * Base user requests url
         */
        url: '/users',
        /**
         * Search users
         */
        search: function(query: string) {
            const url = `${this.url}/search?query=${query}`;
            return fetchResource<Array<User>>('get', url);
        },
        /**
         * Get a user
         */
        get: function(userId: number) {
            const url = `${this.url}/${userId}`;
            return fetchResource<User>('get', url);
        }
    },
    Badge: {
        /**
         * Base badge requests url
         */
        url: '/badges',
        search: function(query: string) {
            const url = `${this.url}/search?query=${query}`;
            return fetchResource<Array<Badge>>('get', url);
        }
    },
    Tag: {
        url: '/tags',
        search: function(query: string) {
            const url = `${this.url}/search?query=${query}`;
            return fetchResource<Array<Tag>>('get', url);
        }
    }
};

export { API, fetchResource };
