<template>
    <div class="bg-cultured-100 rounded w-full h-auto px-4 py-2">
        <div class="flex items-start">
            <div class="inline-flex h-auto items-center cursor-pointer rounded-md  hover:bg-cultured-400 text-onyx-500 hover:text-viridiant-600 py-1 px-2">
                <img class="w-10 rounded-full" :src="auth_user.profile_picture" alt="profile_picture">
                <i data-feather="chevron-down" class="w-5 h-5 ml-1"></i>
            </div>
            <text-area :rows='1' class="flex-grow ml-1 mr-4" child_class="w-full"></text-area>
            <div class="btn btn-viridiant">Post</div>
        </div>
        <hr class="mb-2">
        <div class="w-full flex">
            <span class="w-1/2 cursor-pointer border-r-1 border-onyx-100 flex items-center justify-center text-onyx-500 hover:text-viridiant-600">
                <i data-feather="camera" class="mr-6"></i>
                Photo
            </span>
            <span class="w-1/2 cursor-pointer text-onyx-500 hover:text-viridiant-600 flex items-center justify-center">
                <i data-feather="video" class="mr-6"></i>
                Vidéo
            </span>
        </div>
    </div>
</template>

<script>
    import TextArea from './TextArea.vue';
    export default {
        components: {
            TextArea,
        },
        props: {
            auth_user: {
                type : Object,
                required : true,
            }
        },
        mounted() {
            feather.replace();
        },
        computed: {

        }
    }
</script>
