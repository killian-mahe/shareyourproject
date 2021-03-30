<template>

    <div class="w-full md:w-2/3 lg:w-2/3 xl:w-2/5 mx-auto">
        <div
        v-if="isAuthenticated"
        class="text-2xl font-semibold text-gray-800 mt-5 pl-5 md:pl-0">
            Bonjour {{user.first_name}} {{user.last_name}} !
        </div>

    </div>

</template>
<script lang="ts">
import { defineComponent } from 'vue'
import { mapGetters, mapActions } from 'vuex'

export default defineComponent({
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

