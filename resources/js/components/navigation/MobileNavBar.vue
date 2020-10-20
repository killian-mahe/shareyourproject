<template>
    <nav class="w-screen shadow bg-cultured-100 z-50 h-16">
        <div class="w-full h-full flex justify-around items-center">
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

        <!-- @auth
        @else

        <div class="my-auto hidden lg:block">
            <a href="{{ route("register") }}" class="btn-classic mr-5">Sign Up</a>
            <a href="{{ route("login") }}" class="btn btn-viridiant hover:text-cultured-100">Log In</a>
        </div>

        @endauth -->
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
