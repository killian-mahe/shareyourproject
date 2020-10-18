<template>
    <div :class="{'w-64':display}" class="w-16 shadow h-screen transform ease-in-out duration-250 flex flex-col justify-between bg-cultured-100 absolute top-0 lg:hidden">
        <div class="flex items-center">
        <a :href="home_link"><img :class="{'w-16 h-auto':display}" class="mt-6 w-10 h-auto mx-3 transform ease-in-out duration-250" :src="logo_simple"></a>
        <a :href="home_link"><img :class="{'w-32 h-auto ml-2':display}" class="mt-8 w-0 h-auto transform ease-in-out duration-200" :src="logo_text"></a>
        </div>

        <div id="nav-icon" :class="{'open':display}" @click="toggle">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            display: false,
        }
    },
    props: {
        "logo_simple": String,
        "logo_text": String,
        "home_link": String,
    },
    methods: {
        toggle: function() {
            this.display = !this.display;
        },
    }
}
</script>
