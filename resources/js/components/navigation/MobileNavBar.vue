<template>
    <div :class="{'w-64':display}" class=" fixed w-16 h-screen transform ease-in-out duration-250 flex flex-col justify-between bg-gradient-to-t from-cultured-400 via-cultured-100 to-cultured-100 top-0 lg:hidden">
        <div class="flex items-center mt-6 h-8">
            <a :href="home_link"><img :class="{'w-16 h-auto':display}" class="w-10 h-auto mx-3 transform ease-in-out duration-250" :src="logo_simple"></a>
            <a :href="home_link"><img :class="{'w-32 h-auto ml-2':display2}" class="w-0 h-auto transform ease-in-out duration-200" :src="logo_text"></a>
        </div>
        <ul class="mobile-nav-bar-list" :class="{'text-onyx-800 left-16':display2, 'text-transparent -left-16':!display2}">
            <li>Services</li>
            <li>Projects</li>
            <li>About</li>
            <li>Account</li>
        </ul>

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
