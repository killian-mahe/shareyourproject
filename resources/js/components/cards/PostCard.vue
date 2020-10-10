<template>
    <div v-if="post !== undefined" class="card md:rounded-lg">
        <div class="card-title">
            <a :href="post.url.author" class="w-auto inline-grid">
                <img class="rounded-full my-auto h-full w-auto hover:shadow-md" src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80"/>
            </a>
            <div class="flex flex-col ml-3 justify-start w-full">
                <div class="font-sans font-bold text-base hover:underline"><a :href="post.url.author">{{ post.author.first_name }} {{post.author.last_name}}</a></div>
                <span class="font-sans italic text-base">{{ post.author.title }}</span>
            </div>
        </div>

        <div class="card-body md:text-lg">
            <p class="mb-4 leading-5 font-normal text-onyx-600">
                {{ post.content }}
            </p>
            <img class="max-w-full rounded" src="https://cdn.pixabay.com/photo/2016/08/10/18/04/eat-1583954_1280.jpg"/>
            <div class="card-tags">
                <span class="tag">Work</span>
                <span class="tag">Team</span>
            </div>
        </div>

        <div class="card-footer">
            <div class="card-link">
                <span v-if="post.liked" @click="like(false)" class="cursor-pointer text-red-600 fill-current"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="true" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg><span class="ml-1 hidden md:inline">Liked</span></span>
                <span v-else @click="like(true)" class="cursor-pointer hover:text-red-600 fill-current"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg><span class="ml-1 hidden md:inline">I like</span></span>
            </div>
            <div class="card-link">
                <span class="hover:text-orange-peel-400 cursor-pointer" @click="first_comment = true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg><span class="ml-1 hidden md:inline">Comment</span></span>
            </div>
            <div class="card-link">
                <span class="hover:text-viridiant-400 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg><span class="ml-1 hidden md:inline">Share</span></span>
            </div>
        </div>
        <div v-if="post.comments_overview.length > 0 || first_comment" class="p-5 mb-2 border-t-0.0625 border-onyx-100">
            <div v-if="auth_user != null" class="mb-3 flex relative items-start">
                <img :src="auth_user.profile_picture" class="h-12 w-12 rounded-full mr-3" alt="profile_picture">
                <text-area class="w-full" child_class="w-full pr-10 overflow-y-hidden resize-none" placeholder="Write a comment..." v-model="newCommentContent"></text-area>
                <svg class="feather feather-send absolute right-4 top-4 cursor-pointer" @click="writeComment" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
            </div>
            <comment-component v-for="comment in post.comments_overview" :key="comment.id" :comment="comment" class="mb-3"></comment-component>
            <button v-if="comments_to_load.length > 0" class="btn-classic w-full font-sans text-sm" @click="addComments">Load more comments</button>
        </div>
    </div>
</template>

<script>
    import CommentComponent from '../posts/CommentComponent.vue';
    import TextArea from '../inputs/TextArea.vue';

    export default {
        components: {
            CommentComponent,
            TextArea
        },
        data() {
            return {
                post: this.post_props,
                comments: this.post_props.comments_overview,
                comments_to_load: [],
                first_comment : false,
                newCommentContent: ""
            }
        },
        props: {
            'post_props': Object,
            'auth_user': Object
        },
        mounted() {
            this.comments_to_load = this.post.comments_ids.filter(comment_id => !this.comments.map(x => x.id).includes(comment_id));
        },
        methods: {
            like: function(like) {
                if (like == true) {
                    axios.get('/api/posts/'+this.post.id+'/like')
                        .then(response => {
                            if (response.status === 200) this.post.liked = true;
                        })
                        .catch(error => {

                        })
                } else {
                    axios.get('/api/posts/'+this.post.id+'/unlike')
                        .then(response => {
                            if (response.status === 200) this.post.liked = false;
                        })
                        .catch(error => {

                        })
                }
            },
            addComments: function() {
                if (this.comments_to_load.length > 0)
                {
                    let ids = this.comments_to_load.slice(0, 3);
                    this.comments_to_load = this.comments_to_load.slice(3);

                    axios.post('/api/comments/get', {
                        comments_ids: ids
                    })
                    .then(response => {
                        if (response.status === 200) {
                            response.data.forEach(data => {
                                this.comments.push(data);
                            });
                        }
                    })
                    .catch(error => {

                    })
                }
            },
            writeComment: function() {
                axios.post('/api/comments', {
                    'content': this.newCommentContent,
                    'post_id': this.post.id
                }).then(response => {
                    if (response.status === 201) {
                        this.comments.push(response.data);
                    }
                }).catch(error => {

                })
            }
        }
    }
</script>
