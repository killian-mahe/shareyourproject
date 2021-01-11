/**
 *
 */
class Post {
    constructor() {
        /**
         * @type {Number}
         */
        this.id;
        /**
         * @type {String}
         */
        this.content;
        /**
         * @type {String}
         */
        this.formated_content;
        /**
         * @type {User}
         */
        this.author;
        /**
         * @type {Project}
         */
        this.project;
        /**
         * @type {Array<String>}
         */
        this.images_url;
        /**
         * @type {Array<Tag>}
         */
        this.tags;
        /**
         * @type {Object}
         */
        this.url = {
            /**
             * @member {String}
             */
            author,
            post
        };
        /**
         * @type {Post | false}
         */
        this.reshared_post;
        /**
         * @type {Boolean}
         */
        this.liked;
        /**
         * @type {Array<Number>}
         */
        this.comments_overview;
        /**
         * @type {Object}
         */
        this.stats;
        /**
         * @type {Date}
         */
        this.created_at;
        /**
         * @type {Date}
         */
        this.updated_at;
    }
};

class User {
    constructor() {
        /**
         * @type {Number}
         */
        this.id;
        /**
         * @type {String}
         */
        this.username;
        /**
         * @type {String}
         */
        this.email;
        /**
         * @type {String}
         */
        this.title;
        /**
         * @type {Date}
         */
        this.created_at;
        /**
         * @type {Date}
         */
        this.updated_at;
        /**
         * @type {String}
         */
        this.first_name;
        /**
         * @type {String}
         */
        this.last_name;
        /**
         * @type {String}
         */
        this.full_name;
        /**
         * @type {Object}
         */
        this.url = {
            index: ""
        };
        /**
         * @type {String}
         */
        this.profile_picture;
        /**
         * @type {String}
         */
        this.banner_picture;
        /**
         * @type {Array<Project>}
         */
        this.owned_projects;
    }
};

class Project {
    constructor() {

        /**
         * @type {Number}
         */
        this.id;
        /**
         * @type {String}
         */
        this.description;
        /**
         * @type {String}
         */
        this.formated_description;
        /**
         * @type {String}
         */
        this.name;
        /**
         * @type {Boolean}
         */
        this.public;
        /**
         * @type {Number}
         */
        this.owner_id;
        /**
         * @type {Object}
         */
        this.url = {
            index: "",
            mambers: "",
            description: ""
        };
        /**
         * @type {Array<Technology>}
         */
        this.technologies;
        /**
         * @type {Array<Number>}
         */
        this.members_ids;
        /**
         * @type {String}
         */
        this.profile_picture;
        /**
         * @type {String}
         */
        this.banner_picture;
        /**
         * @type {Date}
         */
        this.created_at;
        /**
         * @type {Date}
         */
        this.updated_at;
    }
};

class Comment {
    constructor() {
        /**
         * @type {Number}
         */
        this.id;
        /**
         * @type {String}
         */
        this.content;
        /**
         * @type {String}
         */
        this.formated_content;
        /**
         * @type {User}
         */
        this.author;
        /**
         * @type {Number}
         */
        this.post_id;
        /**
         * @type {Date}
         */
        this.created_at;
        /**
         * @type {Date}
         */
        this.updated_at;
    }
};

class Badge {
    constructor() {
        /**
         * @type {Number}
         */
        this.id;
        /**
         * @type {String}
         */
        this.name;
        /**
         * @type {String}
         */
        this.label;
        /**
         * @type {Date}
         */
        this.created_at;
        /**
         * @type {Date}
         */
        this.updated_at;
    }
};

class Tag {
    constructor() {

        /**
         * @type {Number}
         */
        this.id;
        /**
         * @type {String}
         */
        this.name;
        /**
         * @type {Date}
         */
        this.created_at;
        /**
         * @type {Date}
         */
        this.updated_at;
    }
};

class Technology {
    constructor() {

        /**
         * @type {Number}
         */
        this.id;
        /**
         * @type {String}
         */
        this.name;
        /**
         * @type {String}
         */
        this.label;
    }
};

export {Post, User, Project, Comment, Badge, Tag, Technology};
