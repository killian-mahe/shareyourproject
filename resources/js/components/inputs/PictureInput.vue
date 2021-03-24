<template>
    <div class="flex relative items-center justify-center">
        <img class="w-full object-cover" :style="styleObject" :src=img_path>
        <div class="group absolute w-full h-full flex items-center justify-center">
            <span class="w-full h-full bg-onyx-900 opacity-0 group-hover:opacity-50 transform duration-200 ease-in-out cursor-pointer" :style="styleObject"></span>
            <i class="text-cultured-100 h-5 w-5 opacity-0 absolute group-hover:opacity-100 transform duration-200 ease-in-out cursor-pointer" data-feather="edit-3"></i>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            'img_path': {
                type: String,
                required: true
            },
            'img_height': {
                type: String,
                required: true
            },
            'img_radius': {
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
    }
</script>

