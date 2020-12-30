<template>
    <img class="animate-spin h-10 w-10" :src="link" :alt="alt">
</template>
<script>
    export default {
        props: {
            'link': String,
            'alt' : "loading"
        }
    }
</script>
