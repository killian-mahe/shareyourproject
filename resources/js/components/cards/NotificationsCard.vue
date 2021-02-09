<template>
    <div class="wrapper">
        <a :href="notification.url" class="a-none flex items-center space-x-2">
            <img :src="notification.picture" class="w-12 h-12 rounded-full" alt="picture_event">
            <h2><span v-html="text"></span> <span class="text-xs">{{time}}</span></h2>
        </a>
    </div>
</template>

<script>
import moment from 'moment';

export default {
    props: {
        notification: {
            required: true
        }
    },
    data() {
        return {
            text : this.notification.text
        }
    },
    computed: {
        time() {
            return moment(this.notification.created_at).fromNow();
        }
    },
    mounted() {
        console.log(this.notification.created_at)
        this.notification.tags.forEach(tag => {
            this.text = this.text.replace(/{}/, "<strong>"+tag+"</strong>");
        });
    }
}
</script>

<style scoped>
.wrapper {
    @apply w-96 p-2;
    @apply hover:bg-gray-200 rounded-sm cursor-pointer;
}

</style>
