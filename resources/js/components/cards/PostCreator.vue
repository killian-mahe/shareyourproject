<template>

    <!-- Card -->
    <div class="card rounded shadow-md w-full h-auto py-2 items-center" v-if="resharedPost != undefined">
        <div class="flex items-start relative w-full space-x-3" v-click-outside="onClickOutside">
            <div @click="showSelect = !showSelect" class="inline-flex h-auto items-center cursor-pointer rounded-md hover:bg-cultured-400 text-onyx-500 hover:text-viridiant-600 py-3 px-2">
                <img class="w-10 h-10 rounded-full object-cover" :src="author.profile_picture" alt="profile_picture">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1 feather feather-chevron-down" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><polyline points="6 9 12 15 18 9"></polyline></svg>
            </div>
            <div v-show="showSelect" class="flex-col space-y-1 flex left-0 top-14 absolute bg-cultured-100 border rounded-md border-gray-300 py-2 px-2 text-sm shadow">
                <div @click="onAuthorSelected(user)" class="cursor-pointer justify-start inline-flex items-center space-x-3 hover:bg-cultured-400 py-1 px-2 rounded-md">
                    <img class="w-8 h-8 rounded-full object-cover" :src="user.profile_picture" alt="profile_picture">
                    <span>{{user.full_name}}</span>
                </div>
                <div v-for="project in user.owned_projects" :key="'project_'+project.id" @click="onAuthorSelected(project)" class="cursor-pointer inline-flex items-center justify-start space-x-3 hover:bg-cultured-400  py-1 px-2 rounded-md">
                    <img class="w-8 h-8 rounded-full object-cover" :src="project.profile_picture" alt="project_profile_picture">
                    <span>{{project.name}}</span>
                </div>
            </div>
            <div class="flex-grow pt-2" @click="openModal">
                <TextArea :rows='1' class="flex-grow ml-1 mr-4"></TextArea>
            </div>
            <button class="btn btn-viridiant mt-2" @click="openModal">Post</button>
        </div>
    </div>

    <ModalComponent v-if="showModal || (resharedPost != undefined)" size="md">
        <template v-slot:header>
            <div class="border-b pb-3 flex justify-between items-center">
                <h1 class="font-semibold text-onyx-500 text-xl">Create a new post</h1>
                <svg @click="closeModal" class="feather feather-x cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </template>

        <template v-slot:body>
            <div class="mt-4 flex items-center">
                <img class="w-10 h-10 rounded-full mr-3 inline-block object-cover" :src="author.profile_picture" alt="profile_picture">
                <div class="flex flex-col jusitfy-start text-xl">
                    <span  v-if="author.first_name!=null" class="font-medium">{{author.first_name}} {{author.last_name}}</span>
                    <span  v-else class="font-medium">{{author.name}}</span>
                    <span class="text-sm">{{author.title}}</span>
                </div>
            </div>
            <div class="mt-6 max-h-24 overflow-y-auto">
                <ResizeAuto>
                    <template v-slot:default="{resize}">
                        <textarea
                            class="appearance-none font-light border-none w-full text-onyx-700 bg-cultured-100 resize-none text-xl focus:outline-none"
                            @input="resize"
                            placeholder="Write a new exciting post !"
                            v-model="content"
                            name=""
                            autofocus
                        ></textarea>
                    </template>
                </ResizeAuto>
                <PostCard v-if="resharedPost" :post="resharedPost" :displayActions="false" class="border-1"></PostCard>
                <div v-if="files.length > 0">
                    <div v-for="(file, index) in files" :key="'file_'+index" class="relative my-2">
                        <svg @click="removeFile(index)" class="feather feather-x transition-colors ease-in-out duration-75 absolute top-2 right-2 text-cultured-500 bg-onyx-500 hover:bg-onyx-700 p-1 w-8 h-8 rounded-full cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        <img :src="file.url" alt="" class="rounded-md w-full">
                    </div>
                </div>
                <input v-if="extraContent" id="pictures_input" ref="picture" @change="previewFile" type="file" name="pictures" hidden>
            </div>
        </template>

        <template v-slot:footer>
            <div class="w-full flex justify-between items-center mt-2">
                <span v-if="extraContent" @click="selectFile"><svg class="feather feather-image hover:bg-onyx-100 bg-cultured-100 p-2 w-10 h-10 rounded-full cursor-pointer transition-colors ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg></span>
                <span v-else><svg class="feather feather-image hover:bg-onyx-100 p-2 w-10 h-10 rounded-full bg-cultured-100 cursor-not-allowed transition-colors ease-in-out duration-150" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg></span>
                <button class="btn btn-viridiant-outline" @click="createPost">Publish</button>
            </div>
            <ul v-if="errors.length > 0" class="mt-2 bg-red-50 rounded-md p-2 border border-red-300 text-red-400">
                <li v-for="(error, index) in errors" :key="'error_'+index">{{ error }}</li>
            </ul>
        </template>
    </ModalComponent>
</template>


<script lang="ts">
import { defineComponent, PropType } from 'vue'
import { mapGetters } from 'vuex'
import TextArea from '../inputs/TextArea.vue';
import vClickOutside from "../../click-outside";
import ModalComponent from '../navigation/ModalComponent.vue'
import PostCard from '../cards/PostCard.vue'
import ResizeAuto from '../utils/ResizeAuto.vue'
import { Post, Project, User } from '../../models';
import { API } from '../../api';

interface FormFile {
    content: File | null | undefined;
    url: string;
}

export default defineComponent({
    components: {
        TextArea,
        ResizeAuto,
        ModalComponent,
        PostCard
    },
    directives: {
        clickOutside: vClickOutside
    },
    emits: {
        close: null
    },
    props: {
        extraContent: {
            type: Boolean,
            default: false
        },
        resharedPost: {
            type: Object as PropType<Post | undefined>,
            default: undefined
        }
    },
    data() {
        return {
            showSelect: false,
            showModal: false,
            content: "",
            AuthorIsProject: false,
            files: new Array<FormFile>(),
            author: undefined as unknown as User|Project,
            errors: []
        }
    },
    beforeMount() {
        this.author = this.user;
    },
    computed: {
        ...mapGetters([
            'isAuthenticated',
            'user',
        ])
    },
    methods: {
        onAuthorSelected: function (author:User|Project) {
            this.author = author;
            if ('username' in this.author) {
                this.AuthorIsProject = false;
            } else {
                this.AuthorIsProject = true;
            }
            this.showSelect = false;
        },
        onClickOutside : function () {
            this.showSelect = false;
        },
        selectFile() {
            (this.$refs.picture as HTMLInputElement).click();
        },
        removeFile: function(index: number) {
            if (index <= this.files.length) {
                this.files.splice(index, 1);
            }
        },
        previewFile: function() {
            let file = (this.$refs.picture as HTMLInputElement)?.files?.item(0);
            this.files.push({
                content: file,
                url: URL.createObjectURL(file)
            });
        },
        openModal() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
            this.$emit('close');
        },
        createPost() {
            API.Post.create((this.files.map(f => f.content) as File[]), this.resharedPost,
                this.content, this.AuthorIsProject ? (this.author as Project) : undefined).then(response => {
                    switch (response.status) {
                        case 201:
                            this.errors = [];
                            this.$router.push({name: 'feed'});
                            break;

                        case 422:
                            this.errors = [];
                            Object.values((response.data as any)['errors']).forEach((error: any) => {
                                this.errors = this.errors.concat(error)
                            })
                            break;

                        default:
                            break;
                    }
                })
        }
    }
})
</script>
