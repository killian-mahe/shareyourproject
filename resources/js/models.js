/**
 *
 */
class Post {
    /**
     * @type {Number}
     */
    id;
    /**
     * @type {String}
     */
    content;
    /**
     * @type {String}
     */
    formated_content;
    /**
     * @type {User}
     */
    author;
    /**
     * @type {Project}
     */
    project;
    /**
     * @type {Array<String>}
     */
    images_url;
    /**
     * @type {Array<Tag>}
     */
    tags;
    /**
     * @type {Object}
     */
    url = {
        /**
         * @member {String}
         */
        author,
        post
    };
    /**
     * @type {Post | false}
     */
    reshared_post;
    /**
     * @type {Boolean}
     */
    liked;
    /**
     * @type {Array<Number>}
     */
    comments_overview;
    /**
     * @type {Object}
     */
    stats;
    /**
     * @type {Date}
     */
    created_at;
    /**
     * @type {Date}
     */
    updated_at;
};

class User {
    /**
     * @type {Number}
     */
    id;
    /**
     * @type {String}
     */
    username;
    /**
     * @type {String}
     */
    email;
    /**
     * @type {String}
     */
    title;
    /**
     * @type {Date}
     */
    created_at;
    /**
     * @type {Date}
     */
    updated_at;
    /**
     * @type {String}
     */
    first_name;
    /**
     * @type {String}
     */
    last_name;
    /**
     * @type {String}
     */
    full_name;
    /**
     * @type {Object}
     */
    url = {
        index = ""
    };
    /**
     * @type {String}
     */
    profile_picture;
    /**
     * @type {String}
     */
    banner_picture;
    /**
     * @type {Array<Project>}
     */
    owned_projects;
};

class Project {
    /**
     * @type {Number}
     */
    id;
    /**
     * @type {String}
     */
    description;
    /**
     * @type {String}
     */
    formated_description;
    /**
     * @type {String}
     */
    name;
    /**
     * @type {Boolean}
     */
    public;
    /**
     * @type {Number}
     */
    owner_id;
    /**
     * @type {Object}
     */
    url = {
        index = "",
        mambers = "",
        description = ""
    };
    /**
     * @type {Array<Technology>}
     */
    technologies;
    /**
     * @type {Array<Number>}
     */
    members_ids;
    /**
     * @type {String}
     */
    profile_picture;
    /**
     * @type {String}
     */
    banner_picture;
    /**
     * @type {Date}
     */
    created_at;
    /**
     * @type {Date}
     */
    updated_at;
};

class Comment {
    /**
     * @type {Number}
     */
    id;
    /**
     * @type {String}
     */
    content;
    /**
     * @type {User}
     */
    author;
    /**
     * @type {Number}
     */
    post_id;
    /**
     * @type {Date}
     */
    created_at;
    /**
     * @type {Date}
     */
    updated_at;
};

class Badge {
    /**
     * @type {Number}
     */
    id;
    /**
     * @type {String}
     */
    name;
    /**
     * @type {String}
     */
    label;
    /**
     * @type {Date}
     */
    created_at;
    /**
     * @type {Date}
     */
    updated_at;
};

class Tag {
    /**
     * @type {Number}
     */
    id;
    /**
     * @type {String}
     */
    name;
    /**
     * @type {Date}
     */
    created_at;
    /**
     * @type {Date}
     */
    updated_at;
};

class Technology {
    /**
     * @type {Number}
     */
    id;
    /**
     * @type {String}
     */
    name;
    /**
     * @type {String}
     */
    label;
};

export {Post, User, Project, Comment, Badge, Tag, Technology};
