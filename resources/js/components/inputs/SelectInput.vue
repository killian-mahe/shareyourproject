<template>
    <InputLabel :label="label" :name="name" />
    <div class="relative cursor-pointer">
        <select :name="name" v-model="value" class="block shadow-sm appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-lg focus:outline-none focus:border-gray-500" :id="name">
            <option v-for="option in options" :key="option.value" :value="option.value">{{ option.text }}</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <slot></slot>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import InputLabel from '../inputs/InputLabel.vue'

export default defineComponent({
    components:{
        InputLabel
    },
    props: {
        label: {
            type: String,
            default: "",
        },
        options: {
            type: Array,
            default : [],
        },
        name: {
            type: String,
            default: "",
        },
        modelValue: {
            type: Object,
            required: true
        }
    },
    computed: {
        value: {
            get(): any {
                return this.modelValue;
            },
            set(value: any) {
                this.$emit('update:modelValue', value);
            }
        }
    }
})
</script>

