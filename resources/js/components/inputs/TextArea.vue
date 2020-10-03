<template>
    <resize-auto>
      <template v-slot:default="{resize}">
        <textarea
            :class="child_class + ' appearance-none bg-white text-gray-700 focus:border-viridiant-600 border-2 border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none'"
            @input="resize"
            :placeholder="placeholder"
            v-bind:value="value"
            v-on:input="$emit('input', $event.target.value)"
        ></textarea>
      </template>
    </resize-auto>
</template>
<script>
    import ResizeAuto from "../utils/ResizeAuto.vue";

    export default {
        components: { ResizeAuto },
        props: {
            'child_class': String,
            'placeholder': String,
            'value': String
        }
    };
</script>
