<template>
<!-- delete reshared_post -->
    <div v-if="post !== undefined" class="card md:rounded-lg" :class="{'shadow-md mb-6': !reshared_post, 'border border-gray-400 hover:bg-cultured-300': reshared_post}">
        <div v-if="post.project" class="card-title justify-between">
            <div class="flex items-center">
                <a :href="post.project.url.index" class="w-auto inline-grid">
                    <img class="rounded-full my-auto h-12 w-12 object-cover hover:shadow-md" :src="post.project.profile_picture"/>
                </a>
                <div class="flex flex-col ml-3 justify-start">
                    <a class="font-semibold leading-tight" :href="post.project.url.index">{{ post.project.name}}</a>
                    <span class="text-xs font-light leading-tight">{{timeSinceCreation}}</span>
                </div>
            </div>

            <span class="my-auto relative" @click="on_options = !on_options" v-click-outside="onClickOutSideOptions">
                <svg class="feather feather-more-vertical h-7 w-7 bg-cultured-100 hover:bg-onyx-100 ease-in-out duration-150 p-1 rounded-full cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>

                <ul class="dropdown-menu right-0" v-if="on_options">
                    <li class="dropdown-item cursor-pointer" @click="on_send = true">Send</li>
                </ul>
            </span>
        </div>
        <div v-else class="card-title justify-between">
            <div class="flex items-center">
                <a :href="post.url.author" class="w-auto inline-grid">
                    <img class="rounded-full my-auto h-12 w-12 object-cover hover:shadow-md" :src="post.author.profile_picture"/>
                </a>
                <div class="flex flex-col ml-3 justify-start">
                    <a class="font-semibold leading-tight" :href="post.url.author">{{ post.author.first_name }} {{post.author.last_name}}</a>
                    <span class="text-xs font-light leading-tight">{{timeSinceCreation}}</span>
                    <span class="text-xs font-light leading-tight">{{ post.author.title }}</span>
                </div>
            </div>

            <span class="my-auto relative" @click="on_options = !on_options" v-click-outside="onClickOutSideOptions">
                <svg class="feather feather-more-vertical h-7 w-7 bg-cultured-100 hover:bg-onyx-100 ease-in-out duration-150 p-1 rounded-full cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>

                <ul class="dropdown-menu right-0" v-if="on_options">
                    <li class="dropdown-item cursor-pointer" @click="on_send = true">Send</li>
                </ul>
            </span>
        </div>

        <div class="card-body sm:px-0 md:text-lg pt-5">
            <p class="mb-4 leading-5 text-sm lg:text-base font-normal text-onyx-600 md:px-4" v-html="post.formated_content">
            </p>

            <!-- Tags -->
            <div class="space-x-1 md:px-4">
                <tag-label v-for="tag in post.tags" :key="'tag_'+tag.name" :label="tag.name" link="#"></tag-label>
            </div>
            <!-- This is the reshared post -->
            <post-card v-if="post.reshared_post" :post_props="post.reshared_post" :auth_user="auth_user" :reshared_post="true"></post-card>

            <div v-if="post.images_url.length > 0" @click="open_modal = true">
                <div v-if="post.images_url.length == 1" class="h-1/2">
                    <img :src="post.images_url[0]" class="w-full object-cover h-120 cursor-pointer" alt="">
                </div>
                <div v-if="post.images_url.length == 2" class="flex">
                    <img :src="post.images_url[0]" class="w-1/2 object-cover h-120 pr-0.5 cursor-pointer" alt="">
                    <img :src="post.images_url[1]" class="w-1/2 object-cover h-120 pl-0.5 cursor-pointer" alt="">
                </div>
                <div v-if="post.images_url.length == 3" class="flex">
                    <img :src="post.images_url[0]" class="w-1/2 object-cover h-120 pr-0.5 cursor-pointer" alt="">
                    <div class="flex flex-col w-1/2 h-120">
                        <img :src="post.images_url[1]" class="object-cover h-half pb-0.5 pl-0.5 cursor-pointer" alt="">
                        <img :src="post.images_url[2]" class="object-cover h-half pt-0.5 pl-0.5 cursor-pointer" alt="">
                    </div>
                </div>
            </div>

            <!-- Post stats -->
            <div class="flex mt-1 mb-2 justify-end" v-if="!reshared_post">
                <!-- Comments -->
                <span class="text-sm text-onyx-400 cursor-pointer hover:underline" @click="displayComments = true">{{post.stats.comments_number}} comments</span>
            </div>
        </div>

        <!-- delete v-if -->
        <div class="card-footer" v-if="!reshared_post">
            <div class="card-link">
                <!-- Unlike -->
                <span v-if="post.liked" @click="like(false)" class="cursor-pointer text-red-600 fill-current flex items-center w-10 h-10">
                    <span ref="likeIcon"></span>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="true" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> -->
                    <span class="ml-1 hidden md:inline text-sm font-medium">{{post.stats.likes_number}}</span>
                </span>
                <!-- Like -->
                <span v-else @click="like(true)" class="cursor-pointer hover:text-red-600 fill-current flex items-center w-10 h-10">
                    <span ref="likeIcon"></span>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> -->
                    <span class="ml-1 hidden md:inline text-sm font-medium">{{post.stats.likes_number}}</span>
                </span>
            </div>
            <div class="card-link">
                <span class="hover:text-orange-peel-400 cursor-pointer" @click="displayComments = true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg><span class="ml-1 hidden md:inline">Comment</span></span>
            </div>
            <div class="card-link">

                <span class="hover:text-viridiant-400 cursor-pointer" @click="share()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg><span class="ml-1 hidden md:inline">Share</span></span>

            </div>
        </div>

        <!-- delte div -->
        <div v-if="displayComments && !reshared_post" class="p-5 mb-2 border-t-0.0625 border-onyx-100 space-y-3">
            <div v-if="auth_user != null" class="flex relative items-start">
                <img :src="auth_user.profile_picture" class="h-10 w-10 rounded-full mr-3" alt="profile_picture">
                <text-area class="w-full" child_class="w-full pr-10 overflow-y-hidden resize-none" placeholder="Write a comment..." @send="writeComment" v-model="newCommentContent" :rows="1"></text-area>
                <svg class="feather feather-send absolute right-4 top-3 cursor-pointer" @click="writeComment" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
            </div>
            <comment-component v-for="comment in orderedComments" :key="comment.id" :comment="comment" class="mt-2"></comment-component>
            <button v-if="comments_to_load.length > 0" class="font-sans font-medium text-sm cursor-pointer text-onyx-500 hover:text-onyx-700" @click="addComments">Load more comments</button>
            <div v-show="loadingComments" class="h-10 mb-3" ref="loader"></div>
        </div>

        <!-- delete modal on_send -->
        <modal-component v-if='on_send'>
            <template v-slot:header>
                <div class="border-b pb-3 flex justify-between items-center">
                    <h1 class="font-semibold text-onyx-600 text-xl">Share it !</h1>
                    <svg class="feather feather-x cursor-pointer text-onyx-600" @click="on_send = false" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </div>
            </template>
            <template v-slot:body>
                <div class="my-4 flex w-full items-center">
                    <div class="relative">
                        <svg @mouseover="hover_copy_icon = true" @mouseleave="hover_copy_icon = false" @click='copy' class="feather feather-copy text-onyx-600 cursor-pointer mr-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path></svg>
                        <div v-if='hover_copy_icon' class="absolute mx-2 bottom-full -left-1/2">
                            <div class="bg-black text-white text-xs rounded py-1 px-2 w-min">
                                {{copied_var}}
                                <svg class="absolute text-black h-2 w-full left-0 top-full" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve"><polygon class="fill-current" points="0,0 127.5,127.5 255,0"/></svg>
                            </div>
                        </div>
                    </div>
                    <input id="copy_link" readonly class="select-all w-full appearance-none block bg-gray-200 px-4 py-2 border border-gray-300 text-onyx-800 rounded-md" type="text" :value="post.url.post">
                </div>
            </template>
            <template v-slot:footer>
                <div></div>
            </template>
        </modal-component>
        <!-- delete post_modal -->
        <post-modal v-if="open_modal"
        @close="open_modal = false"
        @like="like(true)"
        @unlike="like(false)"
        :post="post"
        :auth_user="auth_user"></post-modal>

        <!-- delete post creation -->
        <!-- we need title | body | footer (like, comment share) not more -->
        <post-creation v-if="on_share" @close="on_share=false" :auth_user="auth_user" :reshare_post="post.reshared_post ? post.reshared_post : post" :only_modal="true" :enableExtraContent="false"></post-creation>
    </div>
</template>

<script>
    import CommentComponent from '../posts/CommentComponent.vue';
    import TextArea from '../inputs/TextArea.vue';
    import ModalComponent from '../navigation/ModalComponent.vue';
    import PostCreation from '../inputs/PostCreation.vue';
    import PostModal from '../posts/PostModal.vue';
    import vClickOutside from 'v-click-outside';
    import moment from 'moment';
    import { API } from '../../api';
    import lottie from 'lottie-web';

    export default {
        // no components
        components: {
            CommentComponent,
            TextArea,
            ModalComponent,
            PostCreation,
            PostModal
        },
        // delete Vclick
        directives: {
            clickOutside: vClickOutside.directive
        },
        data() {
            return {
                post: this.post_props,
                // keep post
                comments: this.post_props.comments_overview,
                comments_to_load: [],
                displayComments: false,
                newCommentContent: "",
                on_share: false,
                on_send: false,
                open_modal: false,
                hover_copy_icon: false,
                copied_var: "Click to copy",
                on_options: false,
                loadingComments: false,
                loadingAnimation: null,
                // keep like animation
                likeAnimation: null
            }
        },
        props: {
            // keep and rename post_props to post
            post_props: {
                type: Object,
                required: true,
                default: () => {return null;}
            },
            auth_user: {
                type: Object,
                required: false,
                default: () => {return {};}
            },
            reshared_post: {
                type: Boolean,
                default: false
            }
        },
        beforeMount() {
            this.comments_to_load = this.post.comments_ids.filter(comment_id => !this.comments.map(x => x.id).includes(comment_id));
        },
        mounted() {
            feather.replace();
            this.loadingAnimation = lottie.loadAnimation({
                container: this.$refs['loader'],
                renderer: 'svg',
                loop: true,
                autoplay: false,
                path: '/vendor/courier/lottie/loading.json'
            });

            this.likeAnimation = lottie.loadAnimation({
                container: this.$refs['likeIcon'],
                renderer: 'svg',
                loop: false,
                autoplay: false,
                path: '/vendor/courier/lottie/heart.json'
            });

            if (this.post.liked) {
                this.likeAnimation.play();
            }
        },
        computed: {
            timeSinceCreation: function() {
                return moment(this.post.created_at).fromNow();
            },
            // delete
            orderedComments: function() {
                return this.comments.sort((a, b) => {
                    if (a.created_at > b.created_at) {
                        return -1;
                    } else {
                        return 1;
                    }
                })
            }
        },
        methods: {
            copy: function() {
                var copyText = document.querySelector("#copy_link");
                copyText.select();
                document.execCommand("copy");
                this.copied_var = "Copied !";
            },
            // later
            like: function(like) {
                if (!this.auth_user) return;
                if (like == true) {

                    API.Post.like(this.post.id).then(response => {
                        this.likeAnimation.setDirection(1);
                        this.likeAnimation.play();
                        this.post.liked = true;
                        this.post.stats.likes_number ++;
                    })
                } else {

                    API.Post.unlike(this.post.id).then(response => {
                        this.likeAnimation.setDirection(-1);
                        this.likeAnimation.play();
                        this.post.liked = false;
                        this.post.stats.likes_number --;
                    });
                }
            },
            addComments: function() {
                if (this.comments_to_load.length > 0)
                {
                    this.loadingComments = true;
                    this.loadingAnimation.play();
                    let ids = this.comments_to_load.slice(0, 3);
                    this.comments_to_load = this.comments_to_load.slice(3);
                    API.Comment.getMany(ids).then(comments => {
                        comments.forEach(comment => {
                            this.comments.push(comment);
                        });
                        this.loadingComments = false;
                        this.loadingAnimation.stop();
                    });
                }
            },
            writeComment: function() {
                if (!this.auth_user) return;
                API.Comment.create(this.newCommentContent, this.post.id).then(comment => {
                    this.comments.push(comment);
                    this.newCommentContent = "";
                    this.post.stats.comments_number ++;
                });
            },
            onClickOutSideOptions: function() {
                this.on_options = false;
            },
            share: function() {
                if (!this.auth_user) return;
                this.on_share = true;
            }
        }
    }
</script>
