export interface PostLinks {
    author: string;
    post: string;
}

export interface ProjectLinks {
    index: string;
    members: string;
    description: string;
}

export interface Post {

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
};


export interface UserLinks {
    index: string;
}

export interface User {
    id: number;
    username: string;
    first_name: string;
    last_name: string;
    email: string;
    email_verified_at: string;
    title: string;
    url: UserLinks;
    profile_picture: string;
    banner_picture: string;
    owned_projects: Array<Project>
    created_at: Date;
    updated_at: Date;
    is_admin: boolean;
    bio: string;
}

export interface FeedPage {
    total: number,
    per_page: number,
    current_page: number,
    last_page: number,
    first_page_url: string,
    last_page_url: string,
    next_page_url: string,
    prev_page_url: string,
    path: string,
    from: number,
    to: number,
    data: Array<Post>
}

export interface Tag {
    id: number;
    name: string;
    created_at: Date;
    updated_at: Date;
};

export interface Project {
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
}

export interface Comment {
    id: number;
    content: string;
    formated_content: string;
    author: User;
    post_id: number;
    created_at: Date;
    updated_at: Date;
};

export interface Badge {
    id: number;
    name: string;
    label: string;
    created_at: Date;
    updated_at: Date;
};

export interface Technology {
    id: number;
    name: string;
    label: string;
};
