<template>
    <div class="card rounded shadow-md w-full h-auto py-2 items-center">
        <div class="flex items-start relative w-full space-x-3" v-click-outside="onClickOutside">
            <div @click="show_select = !show_select" class="inline-flex h-auto items-center cursor-pointer rounded-md hover:bg-cultured-400 text-onyx-500 hover:text-viridiant-600 py-3 px-2">
                <img class="w-10 h-10 rounded-full object-cover" :src="author.profile_picture" alt="profile_picture">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1 feather feather-chevron-down" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><polyline points="6 9 12 15 18 9"></polyline></svg>
            </div>
            <div v-show="show_select" class="flex-col space-y-1 flex left-0 top-14 absolute bg-cultured-100 border rounded-md border-gray-300 py-2 px-2 text-sm shadow">
                <div @click="onAuthorSelected(user)" class="cursor-pointer justify-start inline-flex items-center space-x-3 hover:bg-cultured-400 py-1 px-2 rounded-md">
                    <img class="w-8 h-8 rounded-full object-cover" :src="user.profile_picture" alt="profile_picture">
                    <span>{{user.full_name}}</span>
                </div>
                <div v-for="project in user.owned_projects" :key="'project_'+project.id" @click="onAuthorSelected(project)" class="cursor-pointer inline-flex items-center justify-start space-x-3 hover:bg-cultured-400  py-1 px-2 rounded-md">
                    <img class="w-8 h-8 rounded-full object-cover" :src="project.profile_picture" alt="project_profile_picture">
                    <span>{{project.name}}</span>
                </div>
            </div>
            <div class="flex-grow pt-2">
                <TextArea :rows='1' class="flex-grow ml-1 mr-4"></TextArea>
            </div>
            <button class="btn btn-viridiant mt-2">Post</button>
        </div>
    </div>
</template>


<script lang="ts">
import { defineComponent } from 'vue'
import { mapGetters } from 'vuex'
import TextArea from '../inputs/TextArea.vue';
import vClickOutside from "../../click-outside";
import {API} from '../../api';
import { Project, User } from '../../models';

export default defineComponent({

    components: {
            TextArea,
        },
        directives: {
            clickOutside: vClickOutside
        },
        data() {
            return {
                show_select: false,
                content: "",
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
                this.show_select = false;
            },
            onClickOutside : function () {
                this.show_select = false;
            },
            createPost: function() {

                this.errors = [];
            }
        }
})
</script>
