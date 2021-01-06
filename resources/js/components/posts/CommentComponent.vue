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
            <span class="text-sm">
                <!-- Auto-resize component -->
                <v-clamp autoresize :max-lines="3">
                    <template slot="default">
                        {{ comment.content }}
                    </template>
                    <template slot="after" slot-scope="expand">
                        <span v-if="expand.clamped" class="expand-btn" @click="expand.expand()">more</span>
                    </template>
                </v-clamp>
            </span>
        </div>
    </div>
</template>

<script>
    import VClamp from 'vue-clamp';
    import moment from 'moment';

    export default {
        components: {
            VClamp
        },
        data() {
            return {
            }
        },
        props: {
            comment: Object
        },
        computed: {
            timeSinceCreation: function() {
                return moment(this.comment.created_at).fromNow();
            }
        }
    }
</script>

<style scoped>
.expand-btn {
    @apply cursor-pointer ml-2 text-base leading-6 font-semibold text-onyx-500;
}

.comment {
    @apply rounded-b-xl rounded-tr-xl ml-3 bg-gray-200 w-full px-3 py-2;
}
</style>
