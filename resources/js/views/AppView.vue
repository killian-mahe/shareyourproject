<template>
    <the-nav-bar v-if="displayNavBar"></the-nav-bar>
    <!-- route outlet -->
    <!-- component matched by the route will render here -->
    <div class="flex justify-center min-h-screen" :class="{'mt-16': displayNavBar}">
        <router-view></router-view>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { useRoute } from 'vue-router'
import TheNavBar from '../components/navigation/TheNarBar.vue'

export default defineComponent({
    components: {
        TheNavBar
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


