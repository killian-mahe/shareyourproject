<template>
    <nav class="w-full h-16 z-50 relative"
        v-click-outside="onClickOutside">
        <div class="z-10 relative shadow bg-cultured-100 w-full h-full flex justify-around items-center">
            <!-- Logo -->
            <router-link :to="{name: 'feed'}" class="h-auto">
                <img :src="'vendor/courier/logos/svg/simple/Logo_viridiant_simple.svg'" class="w-12">
            </router-link>

            <!-- Search Bar -->
            <div class="w-3/5 h-auto">
                <SearchBar></SearchBar>
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
        <ul class="mobile-nav-bar-list py-2" :class="{'top-16':display2, '-top-64':!display2}">
            <li class="mobile-nav-bar-list-li divide-y divide-gray-400 nav-link">
                <router-link :to="{name: 'feed'}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                My feed</router-link>

                <router-link v-if="isAuthenticated" to="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                My dashboard</router-link>

                <router-link v-if="isAuthenticated" to="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                My message</router-link>

                <router-link v-if="isAuthenticated" to="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                Explore</router-link>
            </li>
            <li class="flex justify-end">
                <div v-if='!isAuthenticated' class="h-auto space-x-4 inline-block">
                    <router-link :to="{name: 'register'}" class="btn-classic a-none">Sign Up</router-link>
                    <router-link :to="{name :'login'}" class="btn btn-viridiant hover:text-cultured-100 a-none">Log In</router-link>
                </div>
            </li>
        </ul>
    </nav>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { mapGetters } from 'vuex'
import SearchBar from './SearchBar.vue'
import vClickOutside from '../../click-outside'

export default defineComponent({
    directives: {
        clickOutside: vClickOutside
    },
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
        onClickOutside: function () {
            if (this.display) {
                this.display2 = false;
                setTimeout(() => {
                    this.display = false;
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
