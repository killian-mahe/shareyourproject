<template>
    <div :class="{'w-64':display}" class="z-40 shadow fixed w-16 h-full transform ease-in-out duration-250 flex flex-col justify-between bg-gradient-to-t from-cultured-400 via-cultured-100 to-cultured-100 top-0">
        <div class="flex items-center mt-6 h-8">
            <a :href="home_link"><img :class="{'w-16 h-auto':display}" class="w-10 h-auto mx-3 transform ease-in-out duration-250" :src="logo_simple"></a>
            <a :href="home_link"><img :class="{'w-32 h-auto ml-2':display2}" class="w-0 h-auto transform ease-in-out duration-200" :src="logo_text"></a>
        </div>

        <div class="w-3/4 h-auto my-6 absolute" :class="{'left-8':display2, '-left-128':!display2}">
                <search-bar></search-bar>
        </div>

        <ul class="tablet-nav-bar-list" :class="{'left-16':display2, '-left-128':!display2}">
            <li>Services</li>
            <li>Projects</li>
            <li>About</li>
            <li>Account</li>
        </ul>

        <!-- @auth
        @else -->
        <div class="absolute w-40 h-auto space-x-4 inline-block bottom-12 md:bottom-1/8 transform duration-250" :class="{'left-10':display2, '-left-128':!display2}">
            <a href="#" class="btn-classic">Sign Up</a>
            <a href="#" class="btn btn-viridiant hover:text-cultured-100">Log In</a>
        </div>
        <!-- @endauth -->


        <div  id="nav-icon" class="absolute left-4 bottom-4">
            <div :class="{'open':display}" @click="toggle">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

    </div>
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
        "logo_text": String,
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
