<template>
    <span @click="$emit('click')" class="italic hover:underline cursor-pointer"><a v-bind:href="link">#{{label}}</a></span>
</template>

<script>
    export default {
        props: {
            'label': String,
            'link': String
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
