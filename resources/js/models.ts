export interface Post {

    id : number;
    content: string;
    formated_content: string;
    author: User;
    project: Project;
    images_url : Array<string>;
    tags: Array<Tag>;
    url: {
        author: string;
        post: string;
    };
    reshared_post: number | null;
    liked: boolean;
    stats: {
        comments: number;
        like: number;
    };
    created_at: Date;
    updated_at: Date;
};


export interface User {
    id: number;
    username: string;
    first_name: string;
    last_name: string;
    email: string;
    email_verified_at: string;
    title: string;
    url: {
        index: string;
    };
    profile_picture: string;
    banner_picture: string;
    owned_projects: Array<Project>
    created_at: Date;
    updated_at: Date;
    is_admin: boolean;
    projects: Array<Project>;
    bio: string;
}

export interface PaginateResponse<T = any> {
    data: Array<T>;
    links: {
        first: string;
        last: string;
        next: string;
        prev: string;
    };
    meta: {
        current_page: number;
        from: number;
        last_page: number;
        links: Array<{
            url: string;
            active: boolean;
            label: number;
        }>;
        path: string;
        per_page: number;
        to: number;
        total: number;
    }
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
    url: {
        index: string;
        members: string;
        description: string;
    };
    technologies: Array<Technology>;
    member_ids: Array<number>;
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
