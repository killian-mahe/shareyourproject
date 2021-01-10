const API_URL = "/api";

/**
 *
 * @param {String} method
 * @param {String} path
 * @param {Object} [data]
 * @return {Promise}
 */
const fetchResource = (method, path, data = {}) => {
    // Build Url
    const url = `${ API_URL }${ path }`;

    // Variable which will be used for storing response

    return window.axios({
        method: method,
        url: url,
        data: data
    }).then(response => {
        if (response.status >= 200 && response.status < 300) {
            return response.data;
        } else {
            throw response;
        }
    })
}

let API =  {
    /**
     * Search posts and users from a query
     * @param {String} query
     * @return {Promise}
     */
    search: function(query) {
        const url = `/search/${query}`;
        return fetchResource('get', url);
    },
    /**
     * Logout the user
     * @return {Promise}
     */
    logout: function() {
        const url = '/logout';
        return fetchResource('post', 'url');
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
        like: function(id) {
            const url = `${this.url}/${id}/like`;
            return fetchResource('get', url);
        },
        /**
         * Unike a post
         * @param {Number} id
         * @return {Promise}
         */
        unlike: function(id) {
            const url = `${this.url}/${id}/unlike`;
            return fetchResource('get', url);
        },
        /**
         * Load user feed and return loaded posts
         * @param {?Array<Number>} except_ids Post ids that mustn't be loaded
         * @return {Promise}
         */
        feed: function(except_ids) {
            const url = '/feed';
            return fetchResource('post', url, {except: except_ids});
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
         * @return {Promise} Users
         */
        search: function(query) {
            const url = `${this.url}/search/${query}`;
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
         * @return {Promise}
         */
        get: function(id) {
            const url = `${this.url}/${id}`;
            return fetchResource('get', url);
        },
        /**
         * Get projects corresponding to the ids passed to the function
         * @param {?Array<Number>} projects_ids Project ids to restrieve
         * @return {Promise}
         */
        getMany: function(projects_ids = {}) {
            const url = `${this.url}/get`;
            return fetchResource('post', url, {projects_ids: projects_ids});
        }
    },
    /**
     * Tag API wrapper
     */
    Tags: {
        /**
         * Base tag requests url
         */
        url: '/tags',
        /**
         * Search tags that correspond to the given query string
         * @param {string} query Query string
         * @return {Promise} Tags
         */
        search: function(query) {
            const url = `${this.url}/search/${query}`;
            return fetchResource('get', url);
        }
    }
};

export { API };
