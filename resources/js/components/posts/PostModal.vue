<template>
    <div class="wrapper">
        <modal-component size="lg" @close="$emit('close')">
            <template v-slot:header>
                <div></div>
            </template>
            <template v-slot:body>
                <div class="h-160 flex flex-col lg:flex-row">
                    <!-- Carousel -->
                    <div class="carousel">

                        <!-- Left button -->
                        <span class="carousel-button left-0">
                            <svg @click="prev()" xmlns="http://www.w3.org/2000/svg" class="feather feather-chevron-left" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                        </span>

                        <img :src="post.images_url[index]" class="carousel-image" alt="currentImage">

                        <!-- Right button -->
                        <span class="carousel-button right-0">
                            <svg @click="next()" xmlns="http://www.w3.org/2000/svg" class="feather feather-chevron-right" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </span>

                        <!-- Indicator -->
                        <span class="rounded-full bg-onyx-500 text-sm px-2 py-1 absolute bottom-2 right-2 text-cultured-700">
                            {{index+1}}/{{post.images_url.length}}
                        </span>

                    </div>

                    <!-- Sidebar -->
                    <div class="w-full lg:w-1/4">
                        <!-- Post -->
                        <div class="w-full mt-4 lg:mt-0 lg:pl-4 bg-white">
                            <div class="flex justify-between items-center">

                                <!-- If post from a project -->
                                <div v-if="post.project" class="flex">
                                    <a :href="post.project.url.index" class="w-auto inline-grid">
                                        <img class="rounded-full my-auto h-10 w-10 object-cover hover:shadow-md" :src="post.project.profile_picture"/>
                                    </a>
                                    <div class="flex flex-col ml-3 justify-start">
                                        <div class="my-auto text-lg"><a class="font-bold" :href="post.project.url.index">{{ post.project.name}}</a></div>
                                    </div>
                                </div>
                                <!-- Else -->
                                <div v-else class="flex">
                                    <a :href="post.url.author" class="w-auto inline-grid">
                                        <img class="rounded-full my-auto h-10 w-10 object-cover hover:shadow-md" :src="post.author.profile_picture"/>
                                    </a>
                                    <div class="flex flex-col ml-3 justify-start">
                                        <div><a class="font-bold" :href="post.url.author">{{ post.author.first_name }} {{post.author.last_name}}</a></div>
                                        <span class="font-sans italic text-base">{{ post.author.title }}</span>
                                    </div>
                                </div>

                                <!-- Like button -->
                                <span v-if="post.liked" class="text-red-600 like-button">
                                    <svg @click="$emit('unlike')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="feather feather-heart" fill="true" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                </span>
                                <span class="hover:text-red-600 like-button" v-else>
                                    <svg @click="$emit('like')" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="feather feather-heart" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                </span>
                            </div>

                            <!-- Post text content -->
                            <div class="post-content">{{post.content}}</div>
                        </div>
                    </div>
                </div>
            </template>
            <template v-slot:footer>
                <div></div>
            </template>
        </modal-component>
    </div>
</template>

<script>
import { Post, User } from '../../models';
import ModalComponent from '../navigation/ModalComponent.vue';

export default {
    components: {
        ModalComponent
    },
    props: {
        post: {
            type: Post,
            required: true
        },
        auth_user: {
            type: User,
            required: true
        }
    },
    data() {
        return {
            index: 0
        }
    },
    methods: {
        next() {
            this.index++;
            if (this.index >= this.post.images_url.length) this.index = 0;
        },
        prev() {
            this.index--;
            if (this.index < 0) this.index = this.post.images_url.length - 1;
        }
    }
}
</script>

<style lang="scss" scoped>
.carousel {
    @apply w-full lg:w-3/4 h-120 lg:h-auto bg-gray-800 rounded-md relative;
}

.carousel-button {
    @apply absolute top-1/2;
}

.carousel-button svg{
    @apply w-10 h-auto text-cultured-800 hover:text-cultured-400 cursor-pointer select-none;
}

.carousel-image {
    @apply max-h-full max-w-full object-contain object-center m-auto h-full;
}

.post-content {
    @apply py-2 border-b-1 text-sm;
}

.like-button {
    @apply fill-current;
}

.like-button svg {
    @apply h-5 w-auto inline-block cursor-pointer;
}
</style>

