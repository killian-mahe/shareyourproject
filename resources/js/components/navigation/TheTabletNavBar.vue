<template>
    <div :class="{'w-64':display}" class="z-40 shadow fixed w-16 h-full transform ease-in-out duration-250 flex flex-col justify-between bg-gradient-to-t from-cultured-600 via-cultured-100 to-cultured-100 top-0">

        <!-- Logo -->
        <div class="flex items-center mt-6 h-8">
            <router-link :to="{name: 'feed'}"><img :class="{'w-16 h-auto':display}" class="w-10 h-auto mx-3 transform ease-in-out duration-250" :src="'vendor/courier/logos/svg/simple/Logo_viridiant_simple.svg'"></router-link>
            <router-link :to="{name: 'feed'}"><img :class="{'w-32 h-auto ml-2':display2}" class="w-0 h-auto transform ease-in-out duration-200" :src="'vendor/courier/logos/svg/text/Logo_viridiant_text.svg'"></router-link>
        </div>

        <!-- Search bar -->
        <div class="w-3/4 h-auto my-6 absolute top-12" :class="{'left-8':display2, '-left-128':!display2}">
            <SearchBar></SearchBar>
        </div>

        <!-- Links -->
        <ul class="tablet-nav-bar-list nav-link" :class="{'left-16':display2, '-left-128':!display2}">
            <li><router-link :to="{name: 'feed'}"
            ><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
            My feed</router-link></li>

            <li><router-link v-if="isAuthenticated" to="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
            My dashboard</router-link></li>

            <li><router-link v-if="isAuthenticated" to="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
            My message</router-link></li>

            <li><router-link v-if="isAuthenticated" to="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
            Explore</router-link></li>

        </ul>

        <!-- Login/register buttons -->
        <div v-if='!isAuthenticated' class="absolute w-48 h-auto space-x-6 inline-block bottom-12 md:bottom-1/8 transform duration-250" :class="{'left-10':display2, '-left-128':!display2}">
            <router-link :to="{name: 'register'}" class="btn-classic ml-1 a-none">Sign Up</router-link>
            <router-link :to="{name: 'login'}" class="btn btn-viridiant hover:text-cultured-100 a-none">Log In</router-link>
        </div>


        <!-- Navigation icon -->
        <div id="nav-icon" class="absolute left-4 bottom-4">
            <div :class="{'open':display}" @click="toggle">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { mapGetters } from 'vuex'
import SearchBar from '../navigation/SearchBar.vue'

export default defineComponent({
    components: {
        SearchBar
    },
    data() {
        return {
            display: false,
            display2: false,
            timeout: 100,
        }
    },
    computed: {
        ...mapGetters([
            'isAuthenticated',
        ])
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

<style scoped>
.nav-link svg {
    @apply mr-1;
}
</style>
