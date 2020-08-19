<template>
    <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2 font-sans" v-bind:for="name">
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
