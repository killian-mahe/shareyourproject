<template>
    <div class="my-auto" @focusin="focus = true" v-click-outside="onClickOutside">
        <form role="search" class="w-full justify-center relative">

            <!-- Search input -->
            <div class="flex items-center relative">
                <i class="search-glass" data-feather="search"></i>
                <input autocomplete="off" @input="refreshLists" type="text" placeholder="Search" v-model="searchQuery" class="search-input placeholder-onyx-300">
            </div>

            <!-- Search results -->
            <div v-show="focus && searchQuery !== ''"  class="rounded z-10 px-4 py-3 bg-white inset-x-0 absolute shadow-lg">

                <!-- Users -->
                <div v-if="users.length > 0">
                    <span class="leading-4 font-medium">Users</span>
                    <hr class="mb-1">
                    <a v-for="user in users" :key="'user_'+user.id" :href="user.url.index" class="flex justify-between p-2 w-full rounded hover:bg-gray-200 cursor-pointer">
                        <span class="flex items-center">
                            <img :src="user.profile_picture" alt="profile_picture" class="w-8 h-8 rounded-full mr-2">
                            <span class="leading-4">{{ user.first_name }} {{ user.last_name }}</span>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    </a>
                </div>

                <!-- Pojects -->
                <div v-if="projects.length > 0">
                    <span class="leading-4 font-medium">Projects</span>
                    <hr class="mb-1">
                    <a v-for="project in projects" :key="'project_'+project.id" :href="project.url.index" class="flex justify-between p-2 w-full rounded hover:bg-gray-200 cursor-pointer">
                        <span class="flex items-center">
                            <img :src="project.profile_picture" alt="project_picture" class="w-8 h-8 rounded-full mr-2">
                            <span class="leading-4">{{ project.name }}</span>
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-archive"><polyline points="21 8 21 21 3 21 3 8"></polyline><rect x="1" y="3" width="22" height="5"></rect><line x1="10" y1="12" x2="14" y2="12"></line></svg>
                    </a>
                </div>


                <span v-if="users.length === 0 && projects.length === 0" class="italic">No result</span>
            </div>
        </form>
    </div>
</template>

<script>
    import vClickOutside from 'v-click-outside';
    import { API } from '../../api';

    export default {
        directives: {
            clickOutside: vClickOutside.directive
        },
        data() {
            return {
                focus: {
                    type: Boolean,
                    default: false
                },
                projects: {
                    type: Array,
                    default: function ()
                    {
                        return [];
                    }
                },
                users: {
                    type: Array,
                    default: function ()
                    {
                        return [];
                    }
                },
                searchQuery: "",
                x: {
                    type: Object,
                    default: function ()
                    {
                        return {};
                    }
                }
            }
        },
        mounted() {
            feather.replace();
        },
        methods: {
            onClickOutside: function (event) {
                this.focus = false;
            },
            refreshLists: function() {
                if (this.x) clearTimeout(this.x);

                this.x = setTimeout(() => {
                    if (this.searchQuery !== "") {
                        API.search(this.searchQuery).then(response => {
                            this.projects = response.projects;
                            this.users = response.users;
                        })
                    }
                }, 250);
            }
        }
    }
</script>
