<template>
    <resize-auto>
      <template v-slot:default="{resize}">
          <div>
            <InputLabel v-bind:label="label"  v-bind:name="name" />
            <textarea
                :class="child_class + ' appearance-none bg-white text-gray-700 focus:border-viridiant-600 border-2 border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none'"
                @input="resize"
                :placeholder="placeholder"
                v-bind:value="value"
                :name="name"
                v-on:input="$emit('input', $event.target.value)"
            ></textarea>
          </div>
      </template>
    </resize-auto>
</template>
<script>
    import ResizeAuto from "../utils/ResizeAuto.vue";
    import InputLabel from './InputLabel.vue';

    export default {
        components: { ResizeAuto, InputLabel },
        props: {
            'child_class': String,
            'placeholder': String,
            'value': String,
            'name': String,
            'label': String,
        }
    };
</script>
