<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
  name: "ResizeAuto",
  methods: {
    resize(event: any) {
      event.target.style.height = "auto";
      event.target.style.height = `${event.target.scrollHeight}px`;
    },
  },
  mounted() {
    this.$nextTick(() => {
      this.$el.setAttribute("style", "height", `${this.$el.scrollHeight}px`);
    });
  },
  render() {
    if (this.$slots.default) {
      return this.$slots.default({
        resize: this.resize,
      });
    }
  },
})
</script>
