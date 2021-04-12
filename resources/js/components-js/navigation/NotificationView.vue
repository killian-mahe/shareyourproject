<template>
    <div class="wrapper" v-click-outside="onClickOutside">
        <!-- Icon -->
        <div class="relative" @click="displayNotification = true">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="feather feather-bell" id="notif-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
            </span>
            <span v-if="unreadNotifications" id="notif-number">
            </span>
        </div>

        <!-- Notification list -->
        <div class="notification-list" v-show="displayNotification">
            <notifications-card v-for="notification in notifications" :notification="notification" :key="'notif_'+notification.id"></notifications-card>
        </div>
    </div>
</template>

<script>
import NotificationsCard from '../cards/NotificationsCard.vue';
import vClickOutside from 'v-click-outside';

export default {
    components: {
        NotificationsCard
    },
    directives: {
        clickOutside: vClickOutside.directive
    },
    props: {
        initial_notifications: {
            default: () => [],
            required: false
        },
        auth_user: {
            type: Object,
            required: true
        }
    },
    methods: {
        onClickOutside() {
            this.displayNotification = false;
        }
    },
    data() {
        return {
            notifications: this.initial_notifications,
            unreadNotifications: false,
            displayNotification: false
        }
    },
    mounted() {
        if (this.notifications.length > 0) this.newNotifications = true;

        console.log(this.notifications)
        Echo.private(`App.User.${this.auth_user.id}`).notification((notification) => {
            console.log(notification)
            this.notifications.unshift(notification)
            this.unreadNotifications = true;
        });
    }
}
</script>

<style scoped>
.wrapper {
    @apply relative;
}

#notif-icon:hover {
    @apply cursor-pointer;
    fill: black;
}

#notif-number {
    @apply bg-red-500 text-white font-medium rounded-full;
    @apply absolute right-0 top-0;
    @apply w-2 h-2;
}

.notification-list {
    @apply absolute top-10 right-0;
    @apply p-2 bg-white divide-y;
    @apply shadow-md rounded-md border;
}
</style>
