<template>
    <resize-auto>
      <template v-slot:default="{resize}">
          <div @click="$emit('click')">
            <InputLabel v-if="label" :label="label"  :name="name" />
            <textarea
                class="appearance-none bg-white text-gray-700 border-2 border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none"
                :class="classIntern"
                @input="resize"
                @focus="$emit('focus')"
                @blur="$emit('blur')"

                @keydown.enter.exact.prevent
                @keyup.enter.exact="send"
                @keyup.ctrl.enter.exact="newline"

                :placeholder="placeholder"
                v-model="input_value"
                :name="name"
                :rows="rows"
            ></textarea>
            <p v-if='max_length' :class="{'text-red-500':intern_value.length > max_length}" class="text-gray-600 text-xs italic text-right" >{{intern_value.length}}/{{max_length}}</p>
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
            'value': {
                type: String,
                default: ""
            },
            'name': String,
            'label': String,
            'max_length': Number,
            'rows': {
                type: Number,
                default: 2
            },
        },
        data() {
            return {
                intern_value: this.value
            }
        },
        mounted() {
            console.log("intern_value :"+this.intern_value)
        },
        computed: {
            classIntern: function() {
                if (this.input_value.length > this.max_length) {
                    return this.child_class + " focus:border-red-500 border-red-500";
                }
                else {
                    return this.child_class + " focus:border-viridiant-600";
                }
            },
            input_value: {
                get() {
                    return this.value;
                },
                set(val) {
                    this.$emit('input', val);
                    this.intern_value = val;
                    console.log("intern_value :"+this.intern_value)
                },
            }
        },
        methods: {
            send: function() {
                this.$emit('send');
            },
            newline: function() {
                this.inputValue = `${this.inputValue}\n`;
            }
        },
    };

</script>

