<template>
    <div v-if="post_data !== undefined" class="card md:rounded-lg">
        <div v-if="post_data.project" class="card-title justify-between">
            <div class="flex items-center">
                <a :href="post_data.project.url.index" class="w-auto inline-grid">
                    <img class="rounded-full my-auto h-12 w-12 object-cover hover:shadow-md" :src="post_data.project.profile_picture"/>
                </a>
                <div class="flex flex-col ml-3 justify-start">
                    <a class="font-semibold leading-tight" :href="post_data.project.url.index">{{ post_data.project.name}}</a>
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
                <a :href="post_data.url.author" class="w-auto inline-grid">
                    <img class="rounded-full my-auto h-12 w-12 object-cover hover:shadow-md" :src="post_data.author.profile_picture"/>
                </a>
                <div class="flex flex-col ml-3 justify-start">
                    <a class="font-semibold leading-tight" :href="post_data.url.author">{{ post_data.author.first_name }} {{post_data.author.last_name}}</a>
                    <span class="text-xs font-light leading-tight">{{timeSinceCreation}}</span>
                    <span class="text-xs font-light leading-tight">{{ post_data.author.title }}</span>
                </div>
            </div>

            <span class="my-auto relative" @click="on_options = !on_options" v-click-outside="onClickOutSideOptions">
                <svg class="feather feather-more-vertical h-7 w-7 bg-cultured-100 hover:bg-onyx-100 ease-in-out duration-150 p-1 rounded-full cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>

                <ul class="dropdown-menu right-0" v-if="on_options">
                    <li class="dropdown-item cursor-pointer" @click="on_send = true">Send</li>
                </ul>
            </span>
        </div>

        <div class="card-body sm:px-0 md:text-lg pt-2">
            <p class="leading-5 text-sm lg:text-base font-normal text-onyx-600 md:px-4" v-html="post_data.formated_content">
            </p>

            <!-- Tags -->
            <div class="space-x-1 md:px-4">
                <TagLabel v-for="tag in post_data.tags" :key="'tag_'+tag.name" :label="tag.name" link="#"></TagLabel>
            </div>

            <div v-if="post_data.images_url.length > 0" @click="open_modal = true">
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
                <span class="text-sm text-onyx-400 cursor-pointer hover:underline">{{post_data.stats.comments_number}} comments</span>
            </div>
        </div>

        <!-- Card footer -->
        <div class="card-footer">
            <div class="card-link">
                <!-- Unlike -->
                <span v-if="post_data.liked" @click="like(false)" class="cursor-pointer text-red-600 fill-current flex items-center w-10 h-10">
                    <span ref="likeIcon"></span>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="true" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> -->
                    <span class="ml-1 hidden md:inline text-sm font-medium">{{post_data.stats.likes_number}}</span>
                </span>
                <!-- Like -->
                <span v-else @click="like(true)" class="cursor-pointer hover:text-red-600 fill-current flex items-center w-10 h-10">
                    <span ref="likeIcon"></span>
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg> -->
                    <span class="ml-1 hidden md:inline text-sm font-medium">{{post_data.stats.likes_number}}</span>
                </span>
            </div>
            <div class="card-link">
                <span class="hover:text-orange-peel-400 cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg><span class="ml-1 hidden md:inline">Comment</span></span>
            </div>
            <div class="card-link">

                <span class="hover:text-viridiant-400 cursor-pointer" @click="share()"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg><span class="ml-1 hidden md:inline">Share</span></span>

            </div>
        </div>

        <!-- delete post_data creation -->
        <!-- we need title | body | footer (like, comment share) not more -->
    </div>
</template>


<script lang="ts">
import { defineComponent, PropType } from 'vue'
import vClickOutside from '../../click-outside'
import moment from 'moment';
import { mapGetters } from 'vuex'
import { API } from '../../api';
import lottie, { AnimationItem } from 'lottie-web';
import { Post } from '../../models'

export default defineComponent({

    directives: {
        clickOutside: vClickOutside
    },
    data() {
        return {
            post_data: this.post,
            loadingAnimation: undefined as unknown as AnimationItem,
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
        // TODO
        // feather.replace();
        this.loadingAnimation = lottie.loadAnimation({
            container: this.$refs['loader'] as Element,
            renderer: 'svg',
            loop: true,
            autoplay: false,
            path: '/vendor/courier/lottie/loading.json'
        });

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
                    this.post_data = response.data;
                })
            } else {

                API.Post.unlike(this.post_data).then(response => {
                    this.post_data = response.data;
                });
            }
        }
    }
})
</script>

