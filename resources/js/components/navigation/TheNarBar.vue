<template>

    <!-- Laptop Navbar -->
    <nav class="w-full shadow bg-cultured-100 nav-bar hidden lg:flex z-50 fixed h-16">
        <div class="flex justify-around w-full ">
        <a href="#"><img class="m-2 " src="{{asset('vendor/courier/logos/svg/fit/Logo_viridiant_fit.svg')}}" width="90px" height="90px"></a>
        <ul class="my-auto hidden lg:flex space-x-4">
            <li class="nav-bar-li"><router-link :to="{name: 'feed'}" class="inline-flex a-none" href="#"><i data-feather="home" class="mr-1"></i>Feed</router-link></li>

                <li v-if="isAuthenticated" class="nav-bar-li"><a class="inline-flex a-none" href="#"><i data-feather="layout" class="mr-1"></i>My dashboard</a></li>
                <li v-if="isAuthenticated" class="nav-bar-li"><a class="inline-flex a-none" href="#"><i data-feather="message-circle" class="mr-1"></i>My message</a></li>

            <li class="nav-bar-li"><a class="inline-flex a-none" href="#"><i data-feather="compass" class="mr-1"></i>Explore</a></li>
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
            <a href="#" class="btn-classic mr-5 a-none">Sign Up</a>
            <a href="#" class="btn btn-viridiant hover:text-cultured-100 a-none">Log In</a>
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

