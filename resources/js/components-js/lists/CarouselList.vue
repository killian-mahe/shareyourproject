<template>
    <div class="relative bg-gray-800 w-full h-full">
        <!-- Left button -->
        <div class="absolute left-0 w-6 h-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
        </div>

        <div class="carousel-image absolute" ref="images">
            <slot>

            </slot>
        </div>

        <!-- Right button -->
        <div class="absolute right-0 w-6 h-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </div>

    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentImg : {
                    type: Object,
                    default: function ()
                    {
                        return {};
                    }
                },
                images: {
                    type: Array,
                    default: function() {
                        return [];
                    }
                }
            }
        },
        props: {
        },
        mounted() {
            this.images = this.$refs.images.children;
            this.currentImg = this.images[0];

            if (this.images.length > 1) {
                for (let index = 0; index < this.images.length; index++) {
                    if (index) this.images.item(index).classList.toggle("hidden");
                }
            }
        }
    }
</script>
