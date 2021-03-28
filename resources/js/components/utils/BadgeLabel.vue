<template>
    <span @click="$emit('click')" class="badge">{{label}}</span>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    props: {
        label: {
            type: String,
            required: true
        }
    }
})
</script>

<style scoped>
.badge {
    @apply rounded-full px-2 pb-1 pt-0.25 text-xs font-semibold bg-onyx-200 lowercase;
}
</style>
