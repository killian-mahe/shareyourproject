class PostLinks {
    author: string;
    post: string;

    constructor(author: string, post: string) {
        this.author = author;
        this.post = post;
    }
}

class Post {

    id : number;
    content: string;
    formated_content: string;
    author: User;
    project: Project;
    images_url : Array<string>;
    tags: Array<Tag>;
    url: PostLinks;
    reshared_post: Post | false;
    liked: boolean;
    comments_overview: Array<number>;
    stats: object;
    followed_projects: Array<number>;
    created_at: Date;
    updated_at: Date;


    constructor(id: number, content: string, formated_content: string, author: User, project: Project, images_url: Array<string>, tags: Array<Tag>,
                url: PostLinks, reshared_post: Post|false, liked: boolean, comments_overview: Array<number>, stats: object, followed_projects: Array<number>,
                created_at: Date, updated_at: Date) {
        this.id = id;
        this.content = content;
        this.formated_content = formated_content;
        this.author = author;
        this.project = project;
        this.images_url = images_url;
        this.tags = tags
        this.url = url;
        this.reshared_post = reshared_post;
        this.liked = liked;
        this.comments_overview = comments_overview;
        this.stats = stats;
        this.followed_projects = followed_projects;
        this.created_at = created_at
        this.updated_at = updated_at;
    }
};


class UserLinks {
    index: string;
    constructor(index: string) {
        this.index = index;
    }
}

class User {
    id: number;
    username: string;
    firstname: string;
    lastname: string;
    fullname: string;
    email: string;
    title: string;
    url: UserLinks;
    profilePicture: string;
    bannerPicture: string;
    ownedProjects: Array<Project>
    created_at: Date;
    updated_at: Date;

    constructor(id: number, username: string, firstname: string, lastname: string, email: string, title: string,
                fullname: string, url: UserLinks, profilePicture: string, bannerPicture: string, ownedProjects: Array<Project>,
                created_at: Date, updated_at: Date) {
        this.id = id;
        this.username = username;
        this.email = email;
        this.title = title;
        this.created_at = created_at;
        this.updated_at = updated_at;
        this.firstname = firstname;
        this.lastname =lastname;
        this.fullname = fullname;
        this.url = url;
        this.profilePicture = profilePicture;
        this.bannerPicture = bannerPicture;
        this.ownedProjects = ownedProjects;
    }
};

class Project {

};

class Tag {

};

// class Project {
//     constructor() {

//         /**
//          * @type {Number}
//          */
//         this.id;
//         /**
//          * @type {String}
//          */
//         this.description;
//         /**
//          * @type {String}
//          */
//         this.formated_description;
//         /**
//          * @type {String}
//          */
//         this.name;
//         /**
//          * @type {Boolean}
//          */
//         this.public;
//         /**
//          * @type {Number}
//          */
//         this.owner_id;
//         /**
//          * @type {Object}
//          */
//         this.url = {
//             index: "",
//             mambers: "",
//             description: ""
//         };
//         /**
//          * @type {Array<Technology>}
//          */
//         this.technologies;
//         /**
//          * @type {Array<Number>}
//          */
//         this.members_ids;
//         /**
//          * @type {String}
//          */
//         this.profile_picture;
//         /**
//          * @type {String}
//          */
//         this.banner_picture;
//         /**
//          * @type {Date}
//          */
//         this.created_at;
//         /**
//          * @type {Date}
//          */
//         this.updated_at;
//     }
// };

// class Comment {
//     constructor() {
//         /**
//          * @type {Number}
//          */
//         this.id;
//         /**
//          * @type {String}
//          */
//         this.content;
//         /**
//          * @type {String}
//          */
//         this.formated_content;
//         /**
//          * @type {User}
//          */
//         this.author;
//         /**
//          * @type {Number}
//          */
//         this.post_id;
//         /**
//          * @type {Date}
//          */
//         this.created_at;
//         /**
//          * @type {Date}
//          */
//         this.updated_at;
//     }
// };

// class Badge {
//     constructor() {
//         /**
//          * @type {Number}
//          */
//         this.id;
//         /**
//          * @type {String}
//          */
//         this.name;
//         /**
//          * @type {String}
//          */
//         this.label;
//         /**
//          * @type {Date}
//          */
//         this.created_at;
//         /**
//          * @type {Date}
//          */
//         this.updated_at;
//     }
// };

// class Tag {
//     constructor() {

//         /**
//          * @type {Number}
//          */
//         this.id;
//         /**
//          * @type {String}
//          */
//         this.name;
//         /**
//          * @type {Date}
//          */
//         this.created_at;
//         /**
//          * @type {Date}
//          */
//         this.updated_at;
//     }
// };

// class Technology {
//     constructor() {

//         /**
//          * @type {Number}
//          */
//         this.id;
//         /**
//          * @type {String}
//          */
//         this.name;
//         /**
//          * @type {String}
//          */
//         this.label;
//     }
// };

export {Post, PostLinks, User, UserLinks, Project};
