<template>
    <div class="card rounded w-full h-auto py-2">
        <div class="flex items-start">
            <div class="inline-flex h-auto items-center cursor-pointer rounded-md  hover:bg-cultured-400 text-onyx-500 hover:text-viridiant-600 py-1 px-2">
                <img class="w-10 rounded-full" :src="auth_user.profile_picture" alt="profile_picture">
                <i data-feather="chevron-down" class="w-5 h-5 ml-1"></i>
            </div>
            <text-area :rows='1' class="flex-grow ml-1 mr-4" child_class="w-full"></text-area>
            <button class="btn btn-viridiant">Post</button>
        </div>
        <div class="card-footer">
            <div class="card-link">
                <span class="cursor-pointer text-onyx-500 hover:text-viridiant-600">
                    <i data-feather="camera"></i>
                    <span class="mr-1 hidden md:inline">Photo</span>
                </span>
            </div>
            <div class="card-link">
                <span class="cursor-pointer text-onyx-500 hover:text-viridiant-600">
                    <i data-feather="video" class="mr-2"></i>
                    <span class="mr-1 hidden md:inline">Video</span>
                </span>
            </div>
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
