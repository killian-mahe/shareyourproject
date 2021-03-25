import { idText, isThisTypeNode } from "typescript";

class PostLinks {
    author: string;
    post: string;

    constructor(author: string, post: string) {
        this.author = author;
        this.post = post;
    }
}

class ProjectLinks {
    index: string;
    members: string;
    description: string;

    constructor(index: string, members: string, description: string) {
        this.index = index;
        this.members = members;
        this.description = description;
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

class Tag {
    id: number;
    name: string;
    created_at: Date;
    updated_at: Date;

    constructor(id: number, name: string, created_at: Date, updated_at: Date) {
        this.id = id;
        this.name = name;
        this.created_at = created_at;
        this.updated_at = updated_at;
    }
};

class Project {
    id: number;
    description: string;
    formated_description: string;
    name: string;
    is_public: boolean;
    owner_id: number;
    url: ProjectLinks;
    technologies: Array<Technology>;
    members_ids: Array<Number>;
    profile_picture: string;
    banner_picture: string;
    created_at: Date;
    updated_at: Date;

    constructor(id: number, description: string, formated_description: string, name: string, is_public: boolean, owner_id: number, url: ProjectLinks, technologies: Array<Technology>, members_ids: Array<Number>, profile_picture: string, banner_picture: string, created_at: Date, updated_at: Date) {
        this.id = id;
        this.description = description;
        this.formated_description = formated_description;
        this.name = name;
        this.is_public = is_public;
        this.owner_id = owner_id;
        this.url = url;
        this.technologies = technologies;
        this.members_ids = members_ids;
        this.profile_picture = profile_picture;
        this.banner_picture = banner_picture;
        this.created_at = created_at;
        this.updated_at = updated_at;
    }
}

class Comment {
    id: number;
    content: string;
    formated_content: string;
    author: User;
    post_id: number;
    created_at: Date;
    updated_at: Date;

    constructor(id: number, content:string, formated_content: string, author: User, post_id: number, created_at: Date, updated_at: Date) {
        this.id = id;
        this.content = content;
        this.formated_content = formated_content;
        this.author = author;
        this.post_id = post_id;
        this.created_at = created_at;
        this.updated_at = updated_at;
    }
};

class Badge {
    id: number;
    name: string;
    label: string;
    created_at: Date;
    updated_at: Date;

    constructor(id: number, name: string, label: string, created_at: Date, updated_at: Date) {
        this.id = id;
        this.name = name;
        this.label = label;
        this.created_at = created_at;
        this.updated_at = updated_at;
    }
};

class Technology {
    id: number;
    name: string;
    label: string;

    constructor(id: number, name: string, label: string) {
        this.id = id;
        this.name = name;
        this.label = label;
    }
};


export {Post, PostLinks, User, UserLinks, Technology, Badge, Project, Tag};
