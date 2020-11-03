<template>
    <div class="bg-cultured-100 rounded w-full h-auto px-4 py-2">
        <div class="flex items-center">
            <span href="#" class="inline-flex w-24 h-auto items-center cursor-pointer group">
                <img class="w-10 rounded-full" :src="auth_user.profile_picture" alt="profile_picture">
                <i data-feather="chevron-down" class="text-onyx-500 w-5 h-5 mx-1 group-hover:text-viridiant-600"></i>
            </span>
            <text-area :rows='1' class="w-full mr-4" child_class="w-full"></text-area>
            <a href="#" class="btn btn-viridiant my-auto hover:text-cultured-100">Post</a>
        </div>
        <hr class="mb-2">
        <div class="w-full flex">
            <span class="w-1/2 cursor-pointer">
                <div class="w-full border-r-1 border-onyx-100 flex items-center justify-center space-x-6">
                    <i data-feather="camera" class="text-onyx-500"></i>
                    <p class="text-onyx-500">Photo</p>
                </div>
            </span>
            <span class="w-1/2 cursor-pointer group">
                <div class="w-full flex items-center justify-center space-x-6 group">
                    <i data-feather="video" class="text-onyx-500 group-hover:text-viridiant-600"></i>
                    <p class="text-onyx-500 group-hover:text-viridiant-600">Vidéo</p>
                </div>
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
