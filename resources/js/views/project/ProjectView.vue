<template>

<div class="block lg:flex justify-center mt-2 md:mt-0 lg:mt-4 min-h-screen" v-if="project">

    <div class="block w-auto md:mx-4 lg:w-1/4 xl:w-1/6">
        <div class="box w-full h-auto mb-2 md:mb-4 flex lg:flex-col flex-none py-2 p-5 md:mt-4 justify-center lg:mt-48 md:space-x-8 lg:space-x-0">
            <router-link :to="{name:'project', params:{id: project.id}}" class="py-2 px-6">Posts</router-link>
            <router-link :to="{name:'project.members', params:{id: project.id}}" class="py-2 px-6">Members</router-link>
            <a class="py-2 px-6">About</a>
        </div>
    </div>

    <div class="w-auto lg:w-2/3 md:mx-4">

        <div class="box w-full h-auto mb-6">
            <div class="flex relative justify-center">
                <img class=" md:rounded-t-md object-cover w-full h-48 shadow" :src="project.banner_picture" alt="test">
                <img class=" border-4 border-cultured-100 shadow-md object-cover w-40 h-40 rounded-full mx-auto sm:left-8 lg:left-16 -bottom-12 absolute" :src="project.profile_picture" alt="test">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-4 mt-14 mx-4 pb-4">
                <div class="text-center md:text-left font-semibold font-sans text-2xl">{{ project.name }}</div>
                <span class="flex justify-center md:justify-end">
                    <!-- <follow-button :project_id='{{$project->id}}' @auth :auth_user='@json(new \App\Http\Resources\User(Auth::user()))' @endauth></follow-button> -->
                </span>
                <div class="flex md:justify-start justify-center">
                    <span class="text-sm">An idea from <router-link :to="{name:'profile', params:{id: owner.id}}" class="text-sm hover:underline">{{owner.full_name}}</router-link></span>
                </div>
                <div class="flex md:justify-end justify-center">
                    <span class="text-sm">Created {{ timeSinceCreation }}</span>
                </div>
            </div>


            <div class="tags w-full h-auto bg-yellow-300"></div>
            <div class="badges w-full h-auto bg-indigo-300"></div>
        </div>

        <router-view></router-view>

    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>

</div>

</template>
<script lang="ts">
import { defineComponent } from 'vue'
import { mapGetters } from 'vuex'
import { API } from '../../api'
import { Project, User, Post } from '../../models'
import moment from 'moment';

export default defineComponent({
    data() {
        return {
            project: undefined as unknown as Project,
            owner: undefined as unknown as User,
            posts: new Array<Post>()
        }
    },
    beforeRouteEnter(to, from, next) {
        API.Project.get(Number(to.params['id'])).then(response => {
            switch (response.status) {
                case 200:
                    let project = response.data
                    API.User.get(project.owner_id).then((response) => {
                        if (response.status === 200) {
                            next(vm => (vm as any).setData(project, response.data))
                        }
                        else next(false);
                    });
                    break;

                default:
                    next(false)
                    break;
            }
        });
    },
    beforeRouteUpdate(to, from, next) {
        API.Project.get(Number(to.params['id'])).then(response => {
            switch (response.status) {
                case 200:
                    this.project = response.data
                    next();
                    break;

                default:
                    next(false);
                    break;
            }
        });
    },
    methods: {
        setData(project: Project, owner: User) {
            this.project = project;
            this.owner = owner;
        }
    },
    computed: {
        ...mapGetters({
            authUser: 'user'
        }),
        timeSinceCreation() : string{
            return moment(this.project.created_at).fromNow();
        },
    },
})
</script>
