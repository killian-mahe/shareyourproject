<template>
    <img class="spinner" :src="link" alt="loading">
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    props: {
        link: {
            type: String,
            required: true
        }
    }
})
</script>

<style scoped>
.spinner {
    @apply animate-spin h-10 w-10;
}
</style>
