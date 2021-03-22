<template>
    <div class="flex w-full">
        <!-- Author image -->
        <img :src="comment.author.profile_picture" class="w-10 h-10 rounded-full" alt="">

        <div class="comment">
            <!-- Author name -->
            <div class="mb-1">
                <span class="leading-4 text-sm font-medium block">{{comment.author.first_name}} {{comment.author.last_name}}  • <span class="text-xs font-light">{{timeSinceCreation}}</span></span>
            </div>

            <!-- Comment content -->
            <div ref="content" class="text-sm content overflow-hidden" v-html="comment.formated_content" :class="{'max-h-4': !expand}">

            </div>
            <div v-if="overflow" class="absolute right-2 bottom-1 cursor-pointer hover:underline text-sm text-onyx-700" @click="on_expand">
                ...read more
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment';

    export default {
        components: {
        },
        data() {
            return {
                overflow: {
                    type: Boolean,
                    default: false
                },
                expand: false
            }
        },
        props: {
            comment: {
                type: Object
            }
        },
        computed: {
            timeSinceCreation: function() {
                return moment(this.comment.created_at).fromNow();
            }
        },
        mounted() {
            let el = this.$refs.content
            this.overflow = el.clientWidth < el.scrollWidth || el.clientHeight < el.scrollHeight;
        },
        methods: {
            on_expand() {
                this.overflow = false;
                this.expand = true;
            }
        }
    }
</script>

<style scoped>
.expand-btn {
    @apply cursor-pointer ml-2 text-base leading-6 font-semibold text-onyx-500;
}

.comment {
    @apply rounded-b-xl rounded-tr-xl ml-3 bg-gray-200 w-full px-3 py-2 relative;
}

</style>
