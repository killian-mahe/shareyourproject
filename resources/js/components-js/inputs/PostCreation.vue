<template>
    <div class="w-full">
    <div class="card rounded shadow-md w-full h-auto py-2" v-if="!only_modal">
        <div class="flex items-start relative" v-click-outside="onClickOutside">
            <div @click="onUserSelect" class="inline-flex h-auto items-center cursor-pointer rounded-md hover:bg-cultured-400 text-onyx-500 hover:text-viridiant-600 py-3 px-2">
                <img class="w-10 h-10 rounded-full object-cover" :src="current_author.profile_picture" alt="profile_picture">
                <i data-feather="chevron-down" class="w-5 h-5 ml-1"></i>
            </div>
            <div v-show="show_select" class="flex-col space-y-1 flex left-0 top-14 absolute bg-cultured-100 border rounded-md border-gray-300 py-2 px-2 text-sm shadow">
                <div @click="onAuthorSelected(auth_user)" class="cursor-pointer justify-start inline-flex items-center space-x-3 hover:bg-cultured-400 py-1 px-2 rounded-md">
                    <img class="w-8 h-8 rounded-full object-cover" :src="auth_user.profile_picture" alt="profile_picture">
                    <span>{{auth_user.full_name}}</span>
                </div>
                <div v-for="project in auth_user.owned_projects" :key="'project_'+project.id" @click="onAuthorSelected(project)" class="cursor-pointer inline-flex items-center justify-start space-x-3 hover:bg-cultured-400  py-1 px-2 rounded-md">
                    <img class="w-8 h-8 rounded-full object-cover" :src="project.profile_picture" alt="project_profile_picture">
                    <span>{{project.name}}</span>
                </div>
                <input ref="author" type="text" name="author" hidden>
            </div>
            <text-area :rows='2' class="flex-grow ml-1 mr-4" child_class="w-full" @click="openModal"></text-area>
            <button class="btn btn-viridiant" @click="openModal">Post</button>
        </div>
    </div>
    <modal-component v-if="show_modal || only_modal" size="md">
        <template v-slot:header>
            <div class="border-b pb-3 flex justify-between items-center">
                <h1 class="font-semibold text-onyx-500 text-xl">Create a new post</h1>
                <svg class="feather feather-x cursor-pointer" @click="closeModal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </template>
        <template v-slot:body>
            <div class="mt-4 flex items-center">
                <img class="w-10 h-10 rounded-full mr-3 inline-block object-cover" :src="current_author.profile_picture" alt="profile_picture">
                <div class="flex flex-col jusitfy-start text-xl">
                    <span  v-if="current_author.first_name!=null" class="font-medium">{{current_author.first_name}} {{current_author.last_name}}</span>
                    <span  v-else class="font-medium">{{current_author.name}}</span>
                    <span class="text-sm">{{current_author.title}}</span>
                </div>
            </div>
            <div class="mt-6 max-h-24 overflow-y-auto">
                <resize-auto>
                    <template v-slot:default="{resize}">
                        <textarea
                            class="appearance-none font-light border-none w-full text-onyx-700 bg-cultured-100 resize-none text-xl focus:outline-none"
                            @input="resize"
                            placeholder="Write a new exciting post !"
                            v-model="content"
                            autofocus
                        ></textarea>
                    </template>
                </resize-auto>
                <post-card v-if="reshare_post" :post_props="reshare_post" :auth_user="auth_user" :reshared_post="true"></post-card>
                <div v-if="files.length > 0">
                    <div v-for="(file, index) in files" :key="'file_'+index" class="relative my-2">
                        <svg @click="removeImage(index)" class="feather feather-x transition-colors ease-in-out duration-75 absolute top-2 right-2 text-cultured-500 bg-onyx-500 hover:bg-onyx-700 p-1 w-8 h-8 rounded-full cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        <img :src="file.url" alt="" class="rounded-md w-full">
                    </div>
                </div>
                <input v-if="enableExtraContent" id="pictures_input" ref="picture" @change="previewFile" type="file" name="pictures" hidden>
            </div>
        </template>
        <template v-slot:footer>
            <div class="w-full flex justify-between items-center mt-2">
                <span v-if="enableExtraContent" @click="selectFile"><svg class="feather feather-image hover:bg-onyx-100 bg-cultured-100 p-2 w-10 h-10 rounded-full cursor-pointer transition-colors ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg></span>
                <span v-else><svg class="feather feather-image hover:bg-onyx-100 p-2 w-10 h-10 rounded-full bg-cultured-100 cursor-not-allowed transition-colors ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg></span>
                <button class="btn btn-viridiant-outline" @click="createPost">Publish</button>
            </div>
            <ul v-if="errors.length > 0" class="mt-2 bg-red-50 rounded-md p-2 border border-red-300 text-red-400">
                <li v-for="(error, index) in errors" :key="'error_'+index">{{ error }}</li>
            </ul>
        </template>
    </modal-component>
    </div>
</template>


<script>
    import TextArea from './TextArea.vue';
    import ModalComponent from '../navigation/ModalComponent.vue';
    import ResizeAuto from "../utils/ResizeAuto.vue";
    import vClickOutside from 'v-click-outside';
    import {API} from '../../api';

    export default {
        components: {
            TextArea,
            ModalComponent,
        },
        directives: {
            clickOutside: vClickOutside.directive
        },
        props: {
            only_modal: {
                type: Boolean,
                default: false
            },
            enableExtraContent: {
                type: Boolean,
                default: true
            },
            reshare_post: {
                type: Object,
                default: null
            },
            auth_user: {
                type : Object,
                required : true,
            },
        },
        data() {
            return {
                show_modal: false,
                show_select: false,
                content: "",
                files: [],
                current_author: this.auth_user,
                errors: []
            }
        },
        mounted() {
            feather.replace();
        },
        computed: {

        },
        methods: {
            onAuthorSelected: function (author) {
                this.$refs.author.value = author.id;
                this.show_select = false;
                this.current_author = author;
            },
            onUserSelect: function() {
                if (this.show_select) {
                    this.show_select = false;
                } else {
                    this.show_select = true;
                }

            },
            openModal: function() {
                this.show_modal = true;
            },
            closeModal: function() {
                this.show_modal = false;
                this.files = [];
                this.errors= [];
                this.$emit('close');
            },
            selectFile: function() {
                document.getElementById('pictures_input').click()
            },
            removeImage: function(index) {
                if (index <= this.files.length) {
                    this.files.splice(index, 1);
                }
            },
            previewFile: function(event) {
                let file = event.target.files[0];
                this.files.push({
                    'content': file,
                    'url': URL.createObjectURL(file)
                });
            },
            onClickOutside : function () {
                this.show_select = false;
            },
            createPost: function() {

                this.errors = [];

                API.Post.create(this.content,
                                this.$refs.author.value,
                                this.reshare_post?.id,
                                this.enableExtraContent ? this.files.map(file => file.content) : null)
                                .then(post => {
                                    document.location.href = '/posts/'+post.id;
                                }).catch(api_error => {

                                    Object.values(api_error.response.data.errors).forEach(error => {
                                        this.errors = this.errors.concat(error)
                                    })
                                });

            }
        }
    }
</script>
