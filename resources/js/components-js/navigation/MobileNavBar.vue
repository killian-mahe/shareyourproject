<template>
    <nav class="w-full h-16 z-50 relative">
        <div class="z-10 relative shadow bg-cultured-100 w-full h-full flex justify-around items-center">
            <!-- Logo -->
            <a :href="home_link" class="h-auto">
                <img :src="logo_simple" class="w-12">
            </a>

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
                <a href="/home"><i data-feather="home" class="mr-1"></i>My feed</a>
                <a v-if="auth_user" href="#"><i data-feather="layout" class="mr-1"></i>My dashboard</a>
                <a v-if="auth_user" href="#"><i data-feather="message-circle" class="mr-1"></i>My message</a>
                <a v-if="auth_user" href="#"><i data-feather="compass" class="mr-1"></i>Explore</a>
            </li>
            <li class="flex justify-end">
                <div v-if='!auth_user' class="h-auto space-x-4 inline-block">
                    <a href="/register" class="btn-classic a-none">Sign Up</a>
                    <a href="/login" class="btn btn-viridiant hover:text-cultured-100 a-none">Log In</a>
                </div>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
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
}
</script>
