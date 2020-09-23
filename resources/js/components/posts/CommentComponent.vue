<template>
    <div class="flex w-full">
        <img :src="comment.author.profile_picture" class="w-10 h-10 rounded-full" alt="">
        <div class="rounded-b-xl rounded-tr-xl ml-5 bg-gray-200 w-full px-3 py-2">
            <div class="mb-1">
                <span class="leading-4 text-sm font-medium block">{{comment.author.first_name}} {{comment.author.last_name}}</span>
                <span class="leading-3 text-xs block italic">{{comment.author.title}}</span>
            </div>
            <span class="leading-5 text-md text-gray-700">{{ comment.content }}</span>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        props: {
            comment: Object
        },
        mounted() {
            console.log(this.comment)
        },
        methods: {
        }
    }
</script>
