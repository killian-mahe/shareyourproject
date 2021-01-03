<template>
    <span @click="$emit('click')" class="badge"><a :href="link">{{label}}</a></span>
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
.badge {
    @apply rounded-full px-2 pb-1 pt-0.25 text-xs font-semibold bg-onyx-200 lowercase;
}
</style>
