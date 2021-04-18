<template>
    <div class="flex relative items-center justify-center">
        <img class="w-full object-cover" :style="styleObject" :src=img_path>
        <div class="group absolute w-full h-full flex items-center justify-center">
            <span class="w-full h-full bg-onyx-900 opacity-0 group-hover:opacity-50 transform duration-200 ease-in-out cursor-pointer" :style="styleObject"></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="text-cultured-100 h-5 w-5 opacity-0 absolute group-hover:opacity-100 transform duration-200 ease-in-out cursor-pointer feather feather-edit-3" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'

export default defineComponent({
    props: {
        img_path: {
            type: String,
            required: true
        },
        img_height: {
            type: String,
            required: true
        },
        img_radius: {
            type: String,
            default: "none"
        },
    },
    data() {
        return {
            styleObject: {borderRadius: "none",  height: this.img_height}
        }
    },
    mounted() {
        this.border_radius
    },
    computed: {
        border_radius() {
            switch (this.img_radius) {
            case "none":
                this.styleObject.borderRadius = "0"
                break
            case "sm":
                this.styleObject.borderRadius = "0.125rem"
                break
            case "md":
                this.styleObject.borderRadius = "0.375rem"
                break
            case "lg":
                this.styleObject.borderRadius = "0.5rem"
                break
            case "full":
                this.styleObject.borderRadius = "9999px"
                break
            default:
                console.log("An error oppear with your image radius")
            }
        }
    },
})
</script>


