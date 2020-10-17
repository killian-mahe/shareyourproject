<template>
    <div class="w-16 shadow h-screen flex flex-col justify-between bg-cultured-300 absolute top-0 lg:hidden">
        <a :href="home_link"><img class="my-4 mx-auto" :src="logo" width="40px" height="40px"></a>

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
        "logo": String,
        "home_link": String,
    },
    methods: {
        toggle: function() {
            this.display = !this.display;
        },
    }
}
</script>
