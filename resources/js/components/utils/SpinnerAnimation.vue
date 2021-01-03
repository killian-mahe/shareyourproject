<template>
    <img class="spinner" :src="link" :alt="alt">
</template>
<script>
    export default {
        props: {
            'link': String,
            'alt' : "loading"
        }
    }
</script>

<style>
.spinner {
    @apply animate-spin h-10 w-10;
}
</style>
