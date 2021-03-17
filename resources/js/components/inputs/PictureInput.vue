<template>
    <div class="flex relative items-center justify-center">
        <img :style="{ heigth : img_heigth, width : img_width}" v-bind:class="{ 'rounded-full' : rounded }" :src=img_path>
        <div class="group absolute flex items-center justify-center">
            <span :style="{ heigth : img_heigth, width : img_width}" v-bind:class="{ 'rounded-full' : rounded }" class="bg-onyx-900 opacity-0 group-hover:opacity-50 transform duration-200 ease-in-out cursor-pointer"></span>
            <i class="text-cultured-100 h-5 w-5 opacity-0 absolute group-hover:opacity-100 transform duration-200 ease-in-out cursor-pointer" data-feather="edit-3"></i>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            img_width: {
                type: String,
                // required: true
            },
            img_heigth: {
                type: String,
                // required: true
            },
            'img_path': String,
            'rounded': false,
        },
        mounted() {
        }
    }
</script>
