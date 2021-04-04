<template>

    <!-- Laptop Navbar -->
    <nav class="w-full shadow bg-cultured-100 nav-bar z-50 fixed h-16 top-0">
        <div class="flex justify-around w-full ">
        <router-link :to="{name: 'feed'}"><img class="m-2 " :src="'vendor/courier/logos/svg/fit/Logo_viridiant_fit.svg'" width="90" height="90"></router-link>
        <ul class="my-auto hidden lg:flex space-x-4 nav-link">
            <li class="nav-bar-li"><router-link :to="{name: 'feed'}" class="inline-flex a-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            Feed</router-link></li>

            <li v-if="isAuthenticated" class="nav-bar-li"><router-link class="inline-flex a-none" to="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
            My dashboard</router-link></li>

            <li v-if="isAuthenticated" class="nav-bar-li"><router-link class="inline-flex a-none" to="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
            My message</router-link></li>

            <li class="nav-bar-li"><router-link class="inline-flex a-none" to="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
            Explore</router-link></li>
        </ul>
        <search-bar class="w-1/4"></search-bar>

        <!-- @auth

        <div class="my-auto flex space-x-6 items-center">
            <notification-view
                :auth_user='@json(new \App\Http\Resources\User(Auth::user()))'
                :projects='@json(Auth::user()->projects->pluck('id'))'
                :initial_notifications='@json(Auth::user()->notifications->take(5)->pluck('data'))'
                ></notification-view>
            <personal-menu :auth_user='@json(new \App\Http\Resources\User(Auth::user()))'></personal-menu>
        </div>

        @else -->

        <div class="my-auto" v-if="!isAuthenticated">
            <router-link :to="{name: 'register'}" class="btn-classic mr-5 a-none">Sign Up</router-link>
            <router-link :to="{name: 'login'}" class="btn btn-viridiant hover:text-cultured-100 a-none">Log In</router-link>
        </div>

        <!-- @endauth -->

        </div>
    </nav>
</template>
<script lang="ts">
import { defineComponent } from 'vue'
import { mapGetters } from 'vuex'
import SearchBar from '../navigation/SearchBar.vue'

export default defineComponent({
    components: {
        SearchBar
    },
    computed: {
        ...mapGetters([
            'isAuthenticated',
        ])
    }
})
</script>

<style scoped>
.nav-link svg {
    @apply mr-1;
}
</style>
