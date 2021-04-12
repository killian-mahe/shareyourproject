<template>
    <div class="flex w-full">
        <!-- Author image -->
        <img :src="comment.author.profile_picture" class="w-10 h-10 rounded-full" alt="">

        <div class="comment">
            <!-- Author name -->
            <div class="mb-1">
                <span class="leading-4 text-sm font-medium block">{{comment.author.full_name}}  • <span class="text-xs font-light">{{timeSinceCreation}}</span></span>
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


<script lang="ts">
import { defineComponent, PropType } from 'vue'
import moment from 'moment';
import { Comment } from '../../models'

export default defineComponent({
    // props: {
    //     comment: {
    //         type: Object as PropType<Comment>,
    //         required: true
    //     }
    // },
    // data() {
    //     return {
    //         overflow: {
    //             type: Boolean,
    //             default: false
    //         },
    //         expand: false
    //     }
    // },
    // computed: {
    //     timeSinceCreation(): string {
    //         return moment(this.comment.created_at).fromNow();
    //     }
    // },
    // mounted() {
    //     let el = this.$refs.content as HTMLDivElement
    //     this.overflow = el.clientWidth < el.scrollWidth || el.clientHeight < el.scrollHeight;
    // },
    // methods: {
    //     on_expand() {
    //         this.overflow = false;
    //         this.expand = true;
    //     }
    // }
})
</script>

