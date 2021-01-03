<template>
    <span @click="$emit('click')" class="tag"><a v-bind:href="link">#{{label}}</a></span>
</template>

<script>
    export default {
        props: {
            'label': String,
            'link': String
        }
    }
</script>

<style>
.tag {
    @apply italic hover:underline cursor-pointer;
}
</style>
