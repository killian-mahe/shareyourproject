<template>

    <div class="w-full md:w-2/3 lg:w-2/3 xl:w-2/5 mx-auto">
        <div
        v-if="isAuthenticated"
        class="text-2xl font-semibold text-gray-800 mt-5 pl-5 md:pl-0">
            Bonjour {{user.first_name}} {{user.last_name}} !
        </div>
        <PostCard class="my-6 shadow-md" v-for="post in posts" :key="'post_' + post.id" :post="post"></PostCard>

    </div>

</template>
<script lang="ts">
import { defineComponent } from 'vue'
import { mapGetters, mapActions } from 'vuex'
import PostCard from '../components/cards/PostCard.vue'

export default defineComponent({
    components: {
        PostCard,
    },
    computed: {
        ...mapGetters({
            isAuthenticated: 'isAuthenticated',
            user: 'user',
            posts: 'feedPosts'
        })
    },
    methods: {
        ...mapActions({
            getNewPosts: 'getNewPosts'
        })
    },
    mounted() {
        this.getNewPosts();
    }
})
</script>

