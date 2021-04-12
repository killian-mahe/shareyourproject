<template>
    <span @click="$emit('click')" class="tag">#{{label}}</span>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
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
})
</script>

<style scoped>
.tag {
    @apply italic hover:underline cursor-pointer;
}
</style>
