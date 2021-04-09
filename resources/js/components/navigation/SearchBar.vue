<template>
    <div class="my-auto" @focusin="focus = true" v-click-outside="onClickOutside">
        <form role="search" class="w-full justify-center relative">

            <!-- Search input -->
            <div class="flex items-center relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search search-glass"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <input autocomplete="off" @input="refreshLists" type="text" placeholder="Search" v-model="searchQuery" class="search-input placeholder-onyx-300">
            </div>

            <!-- Search results -->
            <div v-show="displayResults"  class="rounded z-10 px-4 py-3 bg-white inset-x-0 absolute shadow-lg">

                <!-- Users -->
                <div v-if="users.length > 0">
                    <span class="leading-4 font-medium">Users</span>
                    <hr class="mb-1">
                    <router-link
                        :to="{ name: 'profile', params: { id: user.id }}"
                        v-for="user in users" :key="'user_'+user.id"
                        @click="reset"
                        class="flex justify-between p-2 w-full rounded hover:bg-gray-200 cursor-pointer">
                        <span class="flex items-center">
                            <img :src="user.profile_picture" alt="profile_picture" class="w-8 h-8 rounded-full mr-2">
                            <span class="leading-4">{{ user.first_name }} {{ user.last_name }}</span>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </router-link>
                </div>

                <!-- Pojects -->
                <div v-if="projects.length > 0">
                    <span class="leading-4 font-medium">Projects</span>
                    <hr class="mb-1">
                    <router-link
                        :to="{name: 'project', params:{id: project.id}}"
                        v-for="project in projects" :key="'project_'+project.id"
                        @click="reset"
                        class="flex justify-between p-2 w-full rounded hover:bg-gray-200 cursor-pointer">
                        <span class="flex items-center">
                            <img :src="project.profile_picture" alt="project_picture" class="w-8 h-8 rounded-full mr-2">
                            <span class="leading-4">{{ project.name }}</span>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                    </router-link>
                </div>


                <span v-if="users.length === 0 && projects.length === 0" class="italic">No result</span>
            </div>
        </form>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { API } from '../../api';
import vClickOutside from '../../click-outside'
import { Project, User } from '../../models';

export default defineComponent({
    directives: {
        clickOutside: vClickOutside
    },
    data() {
        return {
            focus: false,
            projects: new Array<Project>(),
            users: new Array<User>(),
            searchQuery: "",
            timer: undefined as unknown as NodeJS.Timeout
        }
    },
    mounted() {
        // feather.replace();
    },
    computed: {
        displayResults() : boolean {
            return (this.focus && (this.users.length > 0 || this.projects.length > 0))
        }
    },
    methods: {
        onClickOutside(): void {
            this.focus = false;
        },
        reset(): void {
            this.focus = false;
            this.projects = [];
            this.users = [];
            this.searchQuery = "";
        },
        refreshLists(): void {
            if (this.timer) clearTimeout(this.timer);

            this.timer = setTimeout(() => {
                if (this.searchQuery !== "") {
                    API.Project.search(this.searchQuery).then(response => {
                        switch (response.status) {
                            case 200:
                                this.projects = response.data;
                                break;

                            default:
                                break;
                        }
                    });

                    API.User.search(this.searchQuery).then(response => {
                        switch (response.status) {
                            case 200:
                                this.users = response.data;
                                break;

                            default:
                                break;
                        }
                    });
                }
            }, 100);
        }
    }
})
</script>
