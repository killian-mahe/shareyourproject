<template>
    <span @click="$emit('click')" class="rounded-full px-2 pb-1 pt-0.25 text-xs font-semibold bg-onyx-200 lowercase"><a :href="link">{{label}}</a></span>
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
