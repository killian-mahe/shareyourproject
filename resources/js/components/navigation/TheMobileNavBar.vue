<template>
    <nav class="w-full h-16 z-50 relative">
        <div class="z-10 relative shadow bg-cultured-100 w-full h-full flex justify-around items-center">
            <!-- Logo -->
            <router-link :to="{name: 'feed'}" class="h-auto">
                <img :src="logo_simple" class="w-12">
            </router-link>

            <!-- Search Bar -->
            <div class="w-3/5 h-auto">
                <search-bar></search-bar>
            </div>

            <!-- Navigation icon -->
            <div id="nav-icon" class="mr-2">
                <div :class="{'open':display}" @click="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>

        <!-- Links -->
        <ul class="mobile-nav-bar-list" :class="{'top-16':display2, '-top-64':!display2}">
            <li class="mobile-nav-bar-list-li divide-y divide-gray-400">
                <router-link :to="{name: 'feed'}"><i data-feather="home" class="mr-1"></i>My feed</router-link>
                <router-link v-if="auth_user" to="#"><i data-feather="layout" class="mr-1"></i>My dashboard</router-link>
                <router-link v-if="auth_user" to="#"><i data-feather="message-circle" class="mr-1"></i>My message</router-link>
                <router-link v-if="auth_user" to="#"><i data-feather="compass" class="mr-1"></i>Explore</router-link>
            </li>
            <li class="flex justify-end">
                <div v-if='!auth_user' class="h-auto space-x-4 inline-block">
                    <router-link :to="{name: 'register'}" class="btn-classic a-none">Sign Up</router-link>
                    <router-link :to="{name :'login'}" class="btn btn-viridiant hover:text-cultured-100 a-none">Log In</router-link>
                </div>
            </li>
        </ul>
    </nav>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    data() {
        return {
            display: false,
            display2: false,
            timeout: 100,
        }
    },
    props: {
        logo_simple: {
            type: String, // Logo link
            required: true
        },
        home_link: {
            type: String, // Home path
            required: true
        },
        auth_user: {
            type: Object, // Authenticated user
            required: false
        }
    },
    methods: {
        toggle: function() {
            if (this.display) {
                this.display2 = false;
                setTimeout(() => {
                    this.display = false;
                },this.timeout);
            } else {
                this.display = true;
                setTimeout(() => {
                    this.display2 = true;
                },this.timeout);
            }
        },
    }
})
</script>




