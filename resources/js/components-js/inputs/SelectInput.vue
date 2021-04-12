<template>
    <div>
        <InputLabel v-bind:label="label"  v-bind:name="name" />
        <div class="relative">
            <select v-bind:name="name" class="block shadow-sm appearance-none w-full bg-white border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-lg focus:outline-none focus:border-gray-500" v-bind:id="name">
                <option v-for="option in options" :key="option.value" v-bind:value="option.value">{{ option.text }}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    import InputLabel from './InputLabel.vue';
    export default {
        props: {
            'label': String,
            'options': Array,
            'name': String
        },
        mounted() {
        }
    }
</script>
