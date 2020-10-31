<template>
    <nav class="w-full h-16 z-50 relative">
        <div class="z-10 relative shadow bg-cultured-100 w-full h-full flex justify-around items-center">
            <a :href="home_link" class="h-auto">
                <img :src="logo_simple" class="w-12">
            </a>
            <div class="w-3/5 h-auto">
                <search-bar></search-bar>
            </div>

            <div id="nav-icon" class="mr-2">
                <div :class="{'open':display}" @click="toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>


        </div>
        <ul class="mobile-nav-bar-list" :class="{'top-16':display2, '-top-64':!display2}">
            <li class="mobile-nav-bar-list-li">Services</li>
            <li class="mobile-nav-bar-list-li">Projects</li>
            <li class="mobile-nav-bar-list-li">About</li>
            <li class="mobile-nav-bar-list-li">Account</li>
            <li class="flex justify-end">
                <div v-if='!auth_user' class="h-auto space-x-4 inline-block">
                    <a href="/register" class="btn-classic">Sign Up</a>
                    <a href="/login" class="btn btn-viridiant hover:text-cultured-100">Log In</a>
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
        "logo_simple": String,
        "home_link": String,
        "auth_user": Object,
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
