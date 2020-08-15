<template>
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 font-sans" v-bind:for="name">
        {{ label }}
    </label>
</template>

<script>
    export default {
        props: {
            'label': String,
            'name': String
        },
        mounted() {
        }
    }
</script>
