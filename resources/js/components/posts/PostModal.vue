<template>
    <div class="wrapper">
        <modal-component size="lg" @close="$emit('close')">
            <template v-slot:header>
                <div></div>
            </template>
            <template v-slot:body>
                <div class="h-160 flex flex-row">
                    <!-- Carousel -->
                    <div class="w-3/4 bg-gray-800"></div>

                    <!-- Sidebar -->
                    <div class="w-1/4">
                        <!-- Post -->
                        <div class="w-full px-4 bg-white">
                            <div v-if="post.project" class="flex">
                                <a :href="post.project.url.index" class="w-auto inline-grid">
                                    <img class="rounded-full my-auto h-10 w-10 object-cover hover:shadow-md" :src="post.project.profile_picture"/>
                                </a>
                                <div class="flex flex-col ml-3 justify-start">
                                    <div class="my-auto text-lg"><a class="font-bold" :href="post.project.url.index">{{ post.project.name}}</a></div>
                                </div>
                            </div>
                            <div v-else class="flex">
                                <a :href="post.url.author" class="w-auto inline-grid">
                                    <img class="rounded-full my-auto h-10 w-10 object-cover hover:shadow-md" :src="post.author.profile_picture"/>
                                </a>
                                <div class="flex flex-col ml-3 justify-start">
                                    <div><a class="font-bold" :href="post.url.author">{{ post.author.first_name }} {{post.author.last_name}}</a></div>
                                    <span class="font-sans italic text-base">{{ post.author.title }}</span>
                                </div>
                            </div>

                            <div class="py-2">{{post.content}}</div>

                            <div class="cursor-pointer hover:text-red-600 fill-current flex justify-center items-center w-full h-8 border-t-1 border-b-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="feather feather-heart h-5 w-auto inline-block" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                <span class="ml-1">I like</span>
                            </div>
                        </div>


                        <!-- Comments -->
                        <div class="p-2 mb-2 border-onyx-100">
                            <div v-if="auth_user != null" class="mb-3 flex relative items-start">
                                <text-area class="w-full" :rows="1" child_class="w-full pr-10 overflow-y-hidden resize-none" placeholder="Write a comment..." v-model="newCommentContent"></text-area>
                                <svg class="feather feather-send absolute right-4 top-3 cursor-pointer" @click="writeComment" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                            </div>
                            <comment-component v-for="comment in post.comments_overview" :key="comment.id" :comment="comment" class="mb-3"></comment-component>
                            <!-- <button v-if="comments_to_load.length > 0" class="btn-classic w-full font-sans text-sm" @click="addComments">Load more comments</button> -->
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
import ModalComponent from '../navigation/ModalComponent.vue';

export default {
    components: {
        ModalComponent
    },
    props: {
        post: {
            type: Object,
            required: true
        },
        auth_user: {
            type:Object,
            required: true
        }
    },
    mounted() {

    }
}
</script>

