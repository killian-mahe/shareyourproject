<template>

    <div class="w-full block lg:flex justify-center mt-2 md:mt-0 lg:mt-4 min-h-screen">

        <div class="block w-auto md:mx-4 lg:w-1/4 xl:w-1/6">
            <div class="box w-full h-auto mb-2 md:mb-4 flex lg:flex-col flex-none py-2 p-5 md:mt-4 justify-center lg:mt-48 md:space-x-8 lg:space-x-0">
                <router-link class="py-2 px-6" :to="{name: 'user.settings'}">Profile</router-link>
                <router-link class="py-2 px-6" :to="{name: 'user.settings.account'}">Account</router-link>
                <!-- <router-link class="py-2 px-6" >Notifications</router-link> -->
            </div>
        </div>

        <div class="w-auto lg:w-2/3 md:mx-4">
            <router-view></router-view>
        </div>

        <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>
    </div>

</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { mapGetters } from 'vuex'

export default defineComponent({
    computed: {
        ...mapGetters({
            isAuthenticated: 'isAuthenticated',
            user: 'user',
        })
    },
})
</script>



