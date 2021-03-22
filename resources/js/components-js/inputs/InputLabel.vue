<template>
    <label class="block tracking-wide text-gray-700 text-sm font-bold mb-2 font-sans" v-bind:for="name">
        {{ label }}
    </label>
</template>

<script>
    export default {
        props: {
            label: {
                type: String,
                required: true
            },
            name: {
                type: String,
                default: ""
            }
        },
        mounted() {
        }
    }
</script>
