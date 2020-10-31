<template>
    <div class="bg-cultured-100 rounded w-full h-auto px-4 py-2">
        <!-- <a href="{{route('users.show', ['user' => Auth::user()->id])}}"><img class="h-10 w-10 rounded-full mr-3" src="{{Auth::user()->profile_picture()}}" alt="profile_picture"></a> -->
        <text-area :rows='1' class="w-full" child_class="w-full"></text-area>
        <hr class="mb-2">
        <div class="w-full flex">
            <span href="#" class="w-1/2 cursor-pointer">
                <div class="w-full border-r-1 border-onyx-100 flex items-center justify-center space-x-4">
                    <i data-feather="camera" class="text-onyx-500"></i>
                    <p class="text-onyx-500">Photo</p>
                </div>
            </span>
            <span href="#" class="w-1/2 cursor-pointer">
                <div class="w-full flex items-center justify-center space-x-6">
                    <i data-feather="video" class="text-onyx-500"></i>
                    <p class="text-onyx-500">Vidéo</p>
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

        },
        mounted() {
            feather.replace();
        },
        computed: {

        }
    }
</script>
