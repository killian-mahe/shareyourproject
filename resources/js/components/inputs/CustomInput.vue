<template>
    <div>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            {{ label }}
        </label>
        <input v-bind:class="{'border-red-500': error}" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" v-bind:type="type" v-bind:placeholder="placeholder">
        <p v-if="error" class="text-red-500 text-xs italic">{{ error }}</p>
        <p v-if="indication" class="text-gray-600 text-xs italic">{{ indication }}</p>
    </div>
</template>

<script>
    export default {
        props: {
            'label': String,
            'type': String,
            'placeholder': String,
            'error': String,
            'indication': String
        },
        mounted() {
        }
    }
</script>
