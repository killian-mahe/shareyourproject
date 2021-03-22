<template>
    <div v-if="project" class="bg-cultured-100 shadow md:rounded-lg flex mb-3 border-b-8 border-viridiant-600 min-h-10">
        <img class="w-1/4 md:rounded-tl-md object-cover" :src="project.profile_picture" alt="project_picture">
        <div class="p-3 flex flex-col justify-between w-full">
            <div>
                <a :href="project.url.index">
                    <h3 class="font-semibold mb-4">{{ project.name }}</h3>
                </a>
                <p class="font-light text-sm">{{ project.description }}</p>
                <div class="mt-4 mb-2">
                    <badge-label v-for="tech in project.technologies" v-bind:label="tech.label" link="#" :key="tech.name"></badge-label>
                </div>
            </div>
            <div class="w-full flex justify-end items-center">
                <span class="relative w-24 h-7">

                        <img v-if="members_overview.length >= 2" class="h-7 w-7 rounded-full absolute right-4" v-bind:src="members_overview[0].profile_picture" alt="">
                        <img v-if="members_overview.length >= 2" class="h-7 w-7 rounded-full absolute right-0" v-bind:src="members_overview[1].profile_picture" alt="">

                </span>
                <a :href="project.url.members">
                    <span class="text-sm font-light ml-2">{{ project.members_ids.length }} members</span>
                </a>
            </div>
        </div>
    </div>
    <div v-else class="bg-cultured-100 shadow md:rounded-lg flex mb-3 border-b-8 border-viridiant-600 min-h-14">
        <div class="w-1/4 md:rounded-tl-md h-full bg-onyx-200"></div>
        <div class="p-3 flex flex-col justify-between w-full">
            <div>
                <div class="h-4 w-1/2 bg-onyx-200 mb-4"></div>
                <div class="font-light text-sm">
                    <div class="h-4 w-full bg-onyx-200 mb-4"></div>
                    <div class="h-4 w-full bg-onyx-200 mb-4"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {API} from '../../api';

    export default {
        data() {
            return {
                members_overview: []
            }
        },
        props: {
            'project': Object
        },
        mounted() {
            this.project.members_ids.slice(0, 2).forEach(member_id => {
                API.User.get(member_id).then(user => {
                    this.members_overview.push(user);
                });
            });
        }
    }
</script>
