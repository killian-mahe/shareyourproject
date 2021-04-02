<template>
    <div :class="{'w-64':display}" class="z-40 shadow fixed w-16 h-full transform ease-in-out duration-250 flex flex-col justify-between bg-gradient-to-t from-cultured-600 via-cultured-100 to-cultured-100 top-0">

        <!-- Logo -->
        <div class="flex items-center mt-6 h-8">
            <router-link :to="{name: 'feed'}"><img :class="{'w-16 h-auto':display}" class="w-10 h-auto mx-3 transform ease-in-out duration-250" :src="'vendor/courier/logos/svg/simple/Logo_viridiant_simple.svg'"></router-link>
            <router-link :to="{name: 'feed'}"><img :class="{'w-32 h-auto ml-2':display2}" class="w-0 h-auto transform ease-in-out duration-200" :src="'vendor/courier/logos/svg/text/Logo_viridiant_text.svg'"></router-link>
        </div>

        <!-- Search bar -->
        <div class="w-3/4 h-auto my-6 absolute" :class="{'left-8':display2, '-left-128':!display2}">
            <search-bar></search-bar>
        </div>

        <!-- Links -->
        <ul class="tablet-nav-bar-list" :class="{'left-16':display2, '-left-128':!display2}">
            <li><router-link :to="{name: 'feed'}"><i data-feather="home" class="mr-1"></i>My feed</router-link></li>
            <li><router-link v-if="isAuthenticated" to="#"><i data-feather="layout" class="mr-1"></i>My dashboard</router-link></li>
            <li><router-link v-if="isAuthenticated" to="#"><i data-feather="message-circle" class="mr-1"></i>My message</router-link></li>
            <li><router-link v-if="isAuthenticated" to="#"><i data-feather="compass" class="mr-1"></i>Explore</router-link></li>
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

export default defineComponent({
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



