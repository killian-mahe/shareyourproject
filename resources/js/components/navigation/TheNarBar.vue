<template>

    <!-- Laptop Navbar -->
    <nav class="w-full shadow bg-cultured-100 nav-bar hidden lg:flex z-50 fixed h-16">
        <div class="flex justify-around w-full ">
        <router-link :to="{name: 'feed'}"><img class="m-2 " :src="'vendor/courier/logos/svg/fit/Logo_viridiant_fit.svg'" width="90" height="90"></router-link>
        <ul class="my-auto hidden lg:flex space-x-4">
            <li class="nav-bar-li"><router-link :to="{name: 'feed'}" class="inline-flex a-none"><i data-feather="home" class="mr-1"></i>Feed</router-link></li>

                <li v-if="isAuthenticated" class="nav-bar-li"><router-link class="inline-flex a-none" to="#"><i data-feather="layout" class="mr-1"></i>My dashboard</router-link></li>
                <li v-if="isAuthenticated" class="nav-bar-li"><router-link class="inline-flex a-none" to="#"><i data-feather="message-circle" class="mr-1"></i>My message</router-link></li>

            <li class="nav-bar-li"><router-link class="inline-flex a-none" to="#"><i data-feather="compass" class="mr-1"></i>Explore</router-link></li>
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

        <div class="my-auto">
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

export default defineComponent({
    computed: {
        ...mapGetters([
            'isAuthenticated',
        ])
    }
})
</script>

