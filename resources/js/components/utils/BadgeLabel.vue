<template>
    <span @click="$emit('click')" :style="{'background-color': getRandomColor()}" class="badge">{{label}}</span>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    props: {
        label: {
            type: String,
            required: true
        }
    },
    methods: {
        getRandomColor() : string {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    }
})
</script>

<style scoped>
.badge {
    @apply rounded-full px-2 pb-1 pt-0.25 text-xs font-semibold bg-onyx-200 lowercase;
}
</style>
