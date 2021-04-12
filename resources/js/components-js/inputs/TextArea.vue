<template>
  <resize-auto>
    <template v-slot:default="{ resize }">
      <div @click="$emit('click')">
        <InputLabel v-if="label" :label="label" :name="name" />
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
          v-model="inputValue"
          :name="name"
          :rows="rows"
        ></textarea>
        <p
          v-if="max_length"
          :class="{ 'text-red-500': inputValue.length > max_length }"
          class="text-gray-600 text-xs italic text-right"
        >
          {{ inputValue.length }}/{{ max_length }}
        </p>
      </div>
    </template>
  </resize-auto>
</template>
<script>
import ResizeAuto from "../utils/ResizeAuto.vue";
import InputLabel from "./InputLabel.vue";

export default {
  components: { ResizeAuto, InputLabel },
  props: {
    child_class: String,
    placeholder: String,
    value: {
      type: String,
      default: "",
    },
    name: String,
    label: String,
    max_length: Number,
    rows: {
      type: Number,
      default: 2,
    },
  },
  computed: {
    classIntern: function () {
      if (this.inputValue.length > this.max_length) {
        return this.child_class + " focus:border-red-500 border-red-500";
      } else {
        return this.child_class + " focus:border-viridiant-600";
      }
    },
    inputValue: {
      get() {
        return this.value;
      },
      set(val) {
        this.$emit("input", val);
      },
    },
  },
  methods: {
    send: function () {
      this.$emit("send");
    },
    newline: function () {
      this.inputValue = `${this.inputValue}\n`;
    },
  },
};
</script>

