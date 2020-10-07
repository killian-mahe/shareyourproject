<template>
    <div>
        <InputLabel v-bind:label="label"  v-bind:name="name" />
        <div class="flex items-center relative">
            <input v-bind:class="{'border-red-500': error, 'pr-10': icon && right, 'pl-12': icon && !right}"
                    v-bind:name="name"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 focus:border-viridiant-600 border-2 border-gray-200 rounded-lg py-3 px-4 focus:outline-none focus:bg-white"
                    v-bind:id="name"
                    v-bind:type="type"
                    v-bind:placeholder="placeholder"
                    v-bind:value="value"
                    v-on:input="$emit('input', $event.target.value)">
            <i v-if="icon !== '' && right == false"
                :data-feather="icon"
                class="absolute left-3 block"></i>
            <i v-if="icon !== '' && right == true"
                :data-feather="icon"
                class="absolute right-3 block"></i>
        </div>
        <p v-if="error" class="text-red-500 text-xs italic">{{ error }}</p>
        <p v-if="indication" class="text-gray-600 text-xs italic">{{ indication }}</p>
    </div>
</template>

<script>
    import InputLabel from './InputLabel.vue';
    export default {
        components: {
            InputLabel,
        },
        props: {
            'label': String,
            'type': String,
            'placeholder': String,
            'error': String,
            'indication': String,
            'name': String,
            'value': String,
            'icon': String,
            'right': Boolean
        },
        mounted() {
            feather.replace();
        }
    }
</script>
