<template>
    <div class="box w-auto mb-6 p-6 lg:flex" :class="{'justify-end': right}">
        <router-link v-if="!right" :to="{name: 'profile', params: {id: member.id}}">
            <img class="h-20 w-20 rounded-full transform ease-in-out duration-200 lg:h-22 lg:w-22 mx-auto lg:ml-0 lg:mr-6 hover:scale-105 hover:shadow-md" :src="member.profile_picture">
        </router-link>
        <div class="text-center" :class="{'lg:text-right': right, 'lg:text-left': !right}">
            <router-link :to="{name: 'profile', params: {id: member.id}}" class="text-lg hover:underline">{{ member.full_name }}</router-link>
            <div class="text-viridiant-600 italic">{{ member.title }}</div>
            <a href="#" class="text-gray-600 hover:text-onyx-600 hover:underline">{{ member.email }}</a>
        </div>
        <router-link v-if="right" :to="{name: 'profile', params: {id: member.id}}">
            <img class="h-20 w-20 rounded-full transform ease-in-out duration-200 lg:h-22 lg:w-22 mx-auto lg:mr-0 lg:ml-6 hover:scale-105 hover:shadow-md" :src="member.profile_picture">
        </router-link>
    </div>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue'
import { User } from '../../models'

export default defineComponent({
    props: {
        member: {
            type: Object as PropType<User>,
            required: true
        },
        right: {
            type: Boolean,
            required: false,
            default: false
        }
    }
})
</script>

<style scoped>

</style>
