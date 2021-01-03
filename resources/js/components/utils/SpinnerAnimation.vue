<template>
    <img class="spinner" :src="link" alt="loading">
</template>
<script>
    export default {
        props: {
            link: {
                type: String,
                required: true
            }
        }
    }
</script>

<style scoped>
.spinner {
    @apply animate-spin h-10 w-10;
}
</style>
