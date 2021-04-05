<template>

<div class="flex justify-center mt-4 min-h-screen" v-if="user">

    <div class="hidden md:block md:w-1/3 md:ml-4 lg:w-1/4 xl:w-1/6">

        <div class="box w-full h-auto mb-4 flex flex-col flex-none py-2 p-5 mt-48">
            <h2 class="category-title">Links</h2>
            <div class="flex justify-between py-2"><span class="text-linkedin">LinkedIn</span><a href="https://www.linkedin.com/in/killian-mah%C3%A9-246928135/">killian-mahe</a></div>
            <div class="flex justify-between py-2"><span class="text-github">GitHub</span><a href="https://github.com/killian-mahe">@killian-mahe</a></div>
        </div>

    </div>

    <div class="w-full md:w-2/3 lg:w-1/2 md:mx-4">

        <div class="box w-full h-auto mb-3 pb-4">
            <div class="flex relative justify-center">
            <img class="md:rounded-t-md object-cover w-full h-48" :src="user.banner_picture" alt="test">
            <img class=" border-4 border-cultured-100 shadow-md object-cover w-40 h-40 rounded-full mx-auto sm:left-8 lg:left-16 -bottom-12 absolute" :src="user.profile_picture" alt="test">
            </div>
            <div class="text-center md:text-right font-semibold font-sans text-2xl md:mr-1/7 mt-12 md:my-4">{{ user.first_name }} {{ user.last_name }}</div>
        </div>


    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>

</div>

</template>
<script lang="ts">
import { defineComponent } from 'vue'
import { mapGetters } from 'vuex'
import { API } from '../../api'
import { User } from '../../models'

export default defineComponent({
    data() {
        return {
            user: undefined as unknown as User
        }
    },
    beforeMount() {
        API.User.get(Number(this.$route.params['id'])).then(response => {
            switch (response.status) {
                case 200:
                    this.user = response.data
                    break;

                default:
                    break;
            }
        });
    },
    beforeRouteUpdate(to, from, next) {
        API.User.get(Number(to.params['id'])).then(response => {
            switch (response.status) {
                case 200:
                    this.user = response.data
                    break;

                case 404:
                    break;

                default:
                    break;
            }
        });
        next();
    },
    computed: {
        ...mapGetters({
            authUser: 'user'
        })
    },
})
</script>

