<template>
    <div>
        <!-- Label -->
        <InputLabel :label="label"  :name="name" />

        <!-- Input -->
        <div class="flex items-center relative">
            <input :class="{'border-red-500': error, 'pr-10': icon && right, 'pl-12': icon && !right}"
                    :name="name"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 focus:border-viridiant-600 border-2 border-gray-200 rounded-lg py-3 px-4 focus:outline-none focus:bg-white"
                    :id="name"
                    :type="type"
                    :placeholder="placeholder"
                    :value="value"
                    :autocomplete="_autocmoplete"
                    v-on:input="$emit('input', $event.target.value)">
            <i v-if="icon !== '' && right == false"
                :data-feather="icon"
                class="absolute left-3 block"></i>
            <i v-if="icon !== '' && right == true"
                :data-feather="icon"
                class="absolute right-3 block"></i>
        </div>

        <!-- Indications -->
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
            label: {
                type: String,
                default: ""
            },
            type: {
                type: String,
                default: ""
            },
            placeholder: {
                type: String,
                default: ""
            },
            error: {
                type: String,
                default: ""
            },
            indication: {
                type: String,
                default: ""
            },
            name: {
                type: String,
                default: ""
            },
            value: {
                type: String,
                default: ""
            },
            icon: {
                type: String,
                default: ""
            },
            right: {
                type: Boolean,
                default: false
            },
            autocomplete: {
                type: Boolean,
                default : false
            }
        },
        mounted() {
            feather.replace();
        },
        computed: {
            _autocmoplete: function() {
                if (this.autocomplete) {
                    return "on";
                }
                return "off";
            }
        }
    }
</script>
