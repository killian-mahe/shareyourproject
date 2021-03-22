<template>
    <span @click="$emit('click')" class="tag"><a v-bind:href="link">#{{label}}</a></span>
</template>

<script>
    export default {
        props: {
            label: {
                type: String,
                required: true
            },
            link: {
                type: String,
                required: true
            }
        }
    }
</script>

<style scoped>
.tag {
    @apply italic hover:underline cursor-pointer;
}
</style>
