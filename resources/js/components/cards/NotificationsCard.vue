<template>
    <div class="wrapper">
        <a :href="notification.data.url" class="a-none flex items-center space-x-2" v-if="notification.type === 'App\\Notifications\\PostCreated'">
            <img :src="notification.data.picture" class="w-12 h-12 rounded-full" alt="picture_event">
            <h2><b>{{notification.data.author}}</b> a posté dans <b>{{notification.data.project_name}}</b>. <span class="text-xs">{{time}}</span></h2>
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
    computed: {
        time() {
            return moment(this.notification.created_at).fromNow();
        }
    },
    mounted() {
        console.log(this.notification)
    }
}
</script>

<style scoped>
.wrapper {
    @apply w-96 p-2;
    @apply hover:bg-gray-200 rounded-sm cursor-pointer;
}

</style>
