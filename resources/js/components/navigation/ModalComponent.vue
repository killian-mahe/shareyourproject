<template>
    <div class="modal-mask">
        <div class="modal-wrapper">
            <div :class="'modal-container ' + containerWidth" v-click-outside="onClickOutside">

                <div class="modal-header">
                <slot name="header">
                    default header
                </slot>
                </div>

                <div class="modal-body">
                <slot name="body">
                    default body
                </slot>
                </div>

                <div class="modal-footer">
                <slot name="footer">
                    default footer
                    <button class="float-right" @click="$emit('close')">
                    OK
                    </button>
                </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vClickOutside from 'v-click-outside';

export default {
    directives: {
        clickOutside: vClickOutside.directive
    },
    data() {
        return {
        }
    },
    props: {
        size: {
            type: String,
            default: "md"
        }
    },
    mounted() {
        let body = document.getElementsByTagName("body").item(0);
        body.classList.add('overflow-hidden');
        body.classList.remove('overflow-auto');
    },
    beforeDestroy() {
        let body = document.getElementsByTagName("body").item(0);
        body.classList.add('overflow-auto');
        body.classList.remove('overflow-hidden');
    },
    computed: {
        containerWidth: function() {
            switch (this.size) {
                case "xl":
                    return "w-7/8 sm:w-4/5 md:w-3/4"

                case "lg":
                    return "w-7/8 sm:w-3/4 md:w-5/8"

                case "md":
                    return "w-7/8 md:w-2/3 lg:w-1/2 xl:w-1/3"

                case "sm":
                    return "w-7/8 sm:1/2 md:w-1/3 lg:w-1/4"

                default:
                    return "w-7/8 w-1/3"
            }
        }
    },
    methods: {
        onClickOutside: function() {
            this.$emit('close');
        }
    }
}
</script>
