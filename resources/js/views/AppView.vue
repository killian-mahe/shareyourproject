<template>
    <the-nav-bar v-if="displayNavBar" class="hidden lg:flex"></the-nav-bar>
    <the-tablet-nav-bar v-if="displayNavBar" class="hidden sm:flex lg:hidden"></the-tablet-nav-bar>
    <the-mobile-nav-bar v-if="displayNavBar" class="sm:hidden"></the-mobile-nav-bar>
    <!-- route outlet -->
    <!-- component matched by the route will render here -->
    <div class="flex justify-center min-h-screen" :class="{'sm:ml-16 lg:ml-0 lg:mt-16': displayNavBar}">
        <router-view></router-view>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { useRoute } from 'vue-router'
import TheNavBar from '../components/navigation/TheNarBar.vue'
import TheTabletNavBar from '../components/navigation/TheTabletNavBar.vue'
import TheMobileNavBar from '../components/navigation/TheMobileNavBar.vue'

export default defineComponent({
    components: {
        TheNavBar,
        TheTabletNavBar,
        TheMobileNavBar
    },
    props: {

    },
    methods: {

    },
    computed: {
        displayNavBar() {
            return (useRoute().name != "login" && useRoute().name != "register")
        }
    },
    mounted(): void {
    },
})
</script>


