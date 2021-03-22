<template>
    <h1>Hello App!</h1>
    <p>
        <!-- use the router-link component for navigation. -->
        <!-- specify the link by passing the `to` prop. -->
        <!-- `<router-link>` will render an `<a>` tag with the correct `href` attribute -->
        <router-link to="/">Go to Home</router-link>
        <router-link to="/about">Go to About</router-link>
    </p>
    <!-- route outlet -->
    <!-- component matched by the route will render here -->
    <router-view></router-view>
</template>
<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    props: {

    },
    methods: {

    },
    mounted(): void {

    },
})
</script>


