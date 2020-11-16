<template>
    <div class="w-full">
    <div class="card rounded shadow-md w-full h-auto py-2" v-show="!show_modal">
        <div class="flex items-start">
            <div class="inline-flex h-auto items-center cursor-pointer rounded-md  hover:bg-cultured-400 text-onyx-500 hover:text-viridiant-600 py-1 px-2">
                <img class="w-10 rounded-full" :src="auth_user.profile_picture" alt="profile_picture">
                <i data-feather="chevron-down" class="w-5 h-5 ml-1"></i>
            </div>
            <text-area :rows='1' class="flex-grow ml-1 mr-4" child_class="w-full" @click="openModal"></text-area>
            <button class="btn btn-viridiant" @click="openModal">Post</button>
        </div>
        <div class="card-footer">
            <div class="card-link">
                <span class="cursor-pointer text-onyx-500 hover:text-viridiant-600">
                    <i data-feather="camera"></i>
                    <span class="mr-1 hidden md:inline">Photo</span>
                </span>
            </div>
            <div class="card-link">
                <span class="cursor-pointer text-onyx-500 hover:text-viridiant-600">
                    <i data-feather="video" class="mr-2"></i>
                    <span class="mr-1 hidden md:inline">Video</span>
                </span>
            </div>
        </div>
    </div>
    <modal-component v-if="show_modal" size="md">
        <template v-slot:header>
            <div class="border-b pb-3 flex justify-between items-center">
                <h1 class="font-semibold text-onyx-500 text-xl">Create a new post</h1>
                <svg class="feather feather-x cursor-pointer" @click="closeModal" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </template>
        <template v-slot:body>
            <div class="mt-4 flex items-end">
                <img class="w-10 h-10 rounded-full mr-3 inline-block" :src="auth_user.profile_picture" alt="profile_picture">
                <div class="flex flex-col jusitfy-start">
                    <span class="font-medium">{{auth_user.first_name}} {{auth_user.last_name}}</span>
                    <span class="text-sm">{{auth_user.title}}</span>
                </div>
            </div>
            <div class="mt-6 max-h-24 overflow-y-scroll">
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
                <img v-if="previewFileUrl" :src="previewFileUrl" alt="" class="my-2 rounded-md hover:">
                <input id="pictures_input" ref="picture" @change="previewFile" type="file" name="pictures" hidden>
            </div>
        </template>
        <template v-slot:footer>
            <div class="w-full flex justify-between items-center mt-2">
                <span @click="selectFile"><svg class="feather feather-image hover:bg-onyx-100 p-2 w-10 h-10 rounded-full cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg></span>
                <button class="btn btn-viridiant-outline" @click="createPost">Publish</button>
            </div>
        </template>
    </modal-component>
    </div>
</template>

<script>
    import TextArea from './TextArea.vue';
    import ModalComponent from '../navigation/ModalComponent.vue';
    import ResizeAuto from "../utils/ResizeAuto.vue";

    export default {
        components: {
            TextArea,
            ModalComponent,
        },
        props: {
            auth_user: {
                type : Object,
                required : true,
            },
        },
        data() {
            return {
                show_modal: true,
                previewFileUrl: "",
                content: ""
            }
        },
        mounted() {
            feather.replace();
        },
        computed: {

        },
        methods: {
            openModal: function() {
                this.show_modal = true;
            },
            closeModal: function() {
                this.show_modal = false;
                this.previewFileUrl = "";
            },
            selectFile: function() {
                document.getElementById('pictures_input').click()
            },
            previewFile: function(event) {
                let file = event.target.files[0];
                this.previewFileUrl = URL.createObjectURL(file);
            },
            createPost: function() {
                let file = this.$refs.picture.files[0];

                let formData = new FormData();

                formData.append('file', file);
                formData.append('content', this.content);

                axios.post('/api/posts', formData, {
                    header: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(response => {
                    console.log(response);
                })
            }
        }
    }
</script>
