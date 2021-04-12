<template>
    <div v-if="post_data !== undefined" class="card md:rounded-lg">

        <!-- Title -->

        <div v-if="post_data.project" class="card-title justify-between">
            <div class="flex items-center">
                <router-link
                    :to="{name:'project', params:{id: post_data.project.id}}" class="w-auto inline-grid">

                    <img class="rounded-full my-auto h-12 w-12 object-cover hover:shadow-md" :src="post_data.project.profile_picture"/>
                </router-link>
                <div class="flex flex-col ml-3 justify-start">
                    <router-link class="font-semibold leading-tight"
                    :to="{name:'project', params:{id: post_data.project.id}}">{{ post_data.project.name}}</router-link>

                    <span class="text-xs font-light leading-tight">{{timeSinceCreation}}</span>
                </div>
            </div>
        </div>
        <div v-else class="card-title justify-between">
            <div class="flex items-center">
                <router-link :to="{name:'profile', params:{id: post_data.author.id}}" class="w-auto inline-grid">
                    <img class="rounded-full my-auto h-12 w-12 object-cover hover:shadow-md" :src="post_data.author.profile_picture"/>
                </router-link>
                <div class="flex flex-col ml-3 justify-start">
                    <router-link class="font-semibold leading-tight"
                        :to="{name:'profile', params:{id: post_data.author.id}}">{{ post_data.author.first_name }} {{post_data.author.last_name}}</router-link>
                    <span class="text-xs font-light leading-tight">{{timeSinceCreation}}</span>
                    <span class="text-xs font-light leading-tight">{{ post_data.author.title }}</span>
                </div>
            </div>
        </div>

        <!-- Body -->

        <div class="card-body sm:px-0 md:text-lg pt-2">
            <p class="leading-5 text-sm lg:text-base font-normal text-onyx-600 md:px-4" v-html="post_data.formated_content">
            </p>

            <!-- Tags -->
            <div class="space-x-1 md:px-4">
                <TagLabel v-for="tag in post_data.tags" :key="'tag_'+tag.name" :label="tag.name" link="#"></TagLabel>
            </div>

            <div v-if="post_data.images_url.length > 0">
                <div v-if="post_data.images_url.length == 1" class="h-1/2">
                    <img :src="post_data.images_url[0]" class="w-full object-cover h-120 cursor-pointer" alt="">
                </div>
                <div v-if="post_data.images_url.length == 2" class="flex">
                    <img :src="post_data.images_url[0]" class="w-1/2 object-cover h-120 pr-0.5 cursor-pointer" alt="">
                    <img :src="post_data.images_url[1]" class="w-1/2 object-cover h-120 pl-0.5 cursor-pointer" alt="">
                </div>
                <div v-if="post_data.images_url.length == 3" class="flex">
                    <img :src="post_data.images_url[0]" class="w-1/2 object-cover h-120 pr-0.5 cursor-pointer" alt="">
                    <div class="flex flex-col w-1/2 h-120">
                        <img :src="post_data.images_url[1]" class="object-cover h-half pb-0.5 pl-0.5 cursor-pointer" alt="">
                        <img :src="post_data.images_url[2]" class="object-cover h-half pt-0.5 pl-0.5 cursor-pointer" alt="">
                    </div>
                </div>
            </div>

            <!-- post_data stats -->
            <div class="flex mt-1 mb-2 justify-end">
                <!-- Comments -->
                <span class="text-sm text-onyx-400 cursor-pointer hover:underline">{{post_data.stats.comments}} comments</span>
            </div>
        </div>

        <!-- Card footer -->

        <div class="card-footer">
            <div class="card-link">
                <!-- Like -->
                <span @click="like(!post_data.liked)" class="cursor-pointer fill-current flex items-center w-10 h-10"
                    :class="{'cursor-pointer':isAuthenticated, 'cursor-not-allowed': !isAuthenticated}">
                    <span ref="likeIcon"></span>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="true" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> -->
                    <span class="ml-1 hidden md:inline text-sm font-medium" :class="{'text-red-600': post_data.liked}">{{post_data.stats.like}}</span>
                </span>
            </div>
            <div class="card-link">
                <!-- Comments -->
                <span class="hover:text-orange-peel-400 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg><span class="ml-1 hidden md:inline">Comment</span></span>
            </div>
            <div class="card-link">

                <span class="hover:text-viridiant-400 cursor-pointer" @click="share()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg><span class="ml-1 hidden md:inline">Share</span></span>

            </div>
        </div>

    </div>
    <!-- <div v-if="displayComments && !reshared_post" class="p-5 mb-2 border-t-0.0625 border-onyx-100 space-y-3">
        <div v-if="auth_user != null" class="flex relative items-start">
            <img :src="auth_user.profile_picture" class="h-10 w-10 rounded-full mr-3" alt="profile_picture">
            <text-area class="w-full" child_class="w-full pr-10 overflow-y-hidden resize-none" placeholder="Write a comment..." @send="writeComment" v-model="newCommentContent" :rows="1"></text-area>
            <svg class="feather feather-send absolute right-4 top-3 cursor-pointer" @click="writeComment" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
        </div>
        <comment-component v-for="comment in orderedComments" :key="comment.id" :comment="comment" class="mt-2"></comment-component>
        <button v-if="comments_to_load.length > 0" class="font-sans font-medium text-sm cursor-pointer text-onyx-500 hover:text-onyx-700" @click="addComments">Load more comments</button>
        <div v-show="loadingComments" class="h-10 mb-3" ref="loader"></div>
    </div> -->
</template>


<script lang="ts">
import { defineComponent, PropType } from 'vue'
import vClickOutside from '../../click-outside'
import moment from 'moment';
import { mapGetters } from 'vuex'
import { API } from '../../api';
import lottie, { AnimationItem } from 'lottie-web';
import { Post } from '../../models'
import TagLabel from '../utils/TagLabel.vue'

export default defineComponent({
    components:{
        TagLabel
    },
    directives: {
        clickOutside: vClickOutside
    },
    data() {
        return {
            post_data: this.post,
            likeAnimation:  undefined as unknown as AnimationItem
        }
    },
    props: {
        post: {
            type: Object as PropType<Post>,
            required: true,
            default: () => {return null;}
        },
    },
    mounted() {

        this.likeAnimation = lottie.loadAnimation({
            container: this.$refs['likeIcon'] as Element,
            renderer: 'svg',
            loop: false,
            autoplay: false,
            path: '/vendor/courier/lottie/heart.json'
        });

        if (this.post_data.liked) {
            this.likeAnimation.play();
        }
    },
    computed: {
        timeSinceCreation(): string {
            return moment(this.post_data.created_at).fromNow();
        },
        ...mapGetters({
            user: 'user',
            isAuthenticated : 'isAuthenticated'
        })
    },
    methods: {
        onClickOutSideOptions()  {

        },
        like: function(like: boolean) {
            if (!this.isAuthenticated) return;
            if (like) {

                API.Post.like(this.post_data).then(response => {
                    if (response.status == 200) {
                        this.likeAnimation.setDirection(1);
                        this.likeAnimation.play();
                        this.post_data = response.data;
                    }
                })
            } else {

                API.Post.unlike(this.post_data).then(response => {
                    if (response.status == 200) {
                        this.likeAnimation.setDirection(-1);
                        this.likeAnimation.play();
                        this.post_data = response.data;
                    }
                });
            }
        }
    }
})
</script>

