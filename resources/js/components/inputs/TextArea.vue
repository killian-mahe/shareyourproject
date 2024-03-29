<template>
    <div class="w-full">
        <resize-auto>
            <template v-slot:default="{ resize }">
            <div @click="$emit('click')">
                <InputLabel v-if="label" :label="label" :name="name" />
                <textarea
                class="w-full appearance-none bg-white text-gray-700 border-2 border-gray-200 rounded-md py-3 px-4 leading-tight focus:outline-none"
                :class="{
                    'border-red-500': (inputValue.length > maxLength) || error,
                    'focus:border-viridiant-600': inputValue.length <= maxLength,
                }"
                @input="resize"
                @focus="$emit('focus')"
                @blur="$emit('blur')"
                @keydown.enter.exact.prevent
                @keyup.enter.exact="send"
                @keyup.ctrl.enter.exact="newline"
                :placeholder="placeholder"
                v-model="inputValue"
                :maxlength="maxLength"
                :name="name"
                :rows="rows"
                ></textarea>
                <p
                v-if="maxLength"
                :class="{ 'text-red-500': inputValue.length > maxLength }"
                class="text-gray-600 text-xs italic text-right"
                >
                {{ inputValue.length }}/{{ maxLength }}
                </p>
            </div>
            </template>
        </resize-auto>
        <p v-if="error" class="text-red-500 text-xs italic">{{ error }}</p>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import ResizeAuto from "../utils/ResizeAuto.vue";
import InputLabel from "./InputLabel.vue";

export default defineComponent({
  components: {
    ResizeAuto,
    InputLabel,
  },
  props: {
    placeholder: {
      type: String,
      default: "",
    },
    modelValue: {
      type: String,
      default: "",
    },
    name: {
      type: String,
      default: ""
    },
    label: {
      type: String,
      default: "",
    },
    maxLength: {
      type: Number,
      default: 250,
    },
    error: {
        type: String,
        default: ""
    },
    rows: {
      type: Number,
      default: 2,
    },
  },
  computed: {
    inputValue: {
      get(): string {
        return this.modelValue;
      },
      set(value: string) {
        this.$emit("update:modelValue", value);
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
});
</script>

<style scoped>
</style>
