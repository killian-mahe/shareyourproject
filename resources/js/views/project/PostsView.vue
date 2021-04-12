<template>
    <div>

        <PostCard
            v-for="post in posts"
            :key="'post_'+post.id"
            :post="post"
            class="my-6 shadow-md"
            ></PostCard>

        <div class="w-full flex justify-center">
            <div ref="loader"></div>
        </div>

    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { API, fetchResource } from '../../api'
import PostCard from '../../components/cards/PostCard.vue'
import { Project, Post, PaginateResponse } from '../../models'
import lottie, { AnimationItem } from 'lottie-web';

export default defineComponent({
    components: {
        PostCard
    },
    data() {
        return {
            project: undefined as unknown as Project,
            posts: new Array<Post>(),
            currentPage: 1,
            lastPage: undefined as unknown as Number,
            animation: undefined as unknown as AnimationItem
        }
    },
    created() {
        API.Project.get(Number(this.$route.params['id'])).then(response => {
            switch (response.status) {
                case 200:
                    this.project = response.data

                    API.Project.posts(this.project).then(response => {
                        if (response.status == 200) {
                            this.posts = response.data.data;
                            this.currentPage = response.data.meta.current_page;
                            this.lastPage = response.data.meta.last_page;
                        }
                    })
                    break;

                default:
                    break;
            }
        });
    },
    mounted() {
        this.animation = lottie.loadAnimation({
            container: this.$refs['loader'] as Element,
            renderer: 'svg',
            loop: true,
            autoplay: false,
            path: '/vendor/courier/lottie/loading.json'
        });
        this.scroll();
    },
    beforeRouteUpdate(to, from, next) {
        console.log('beforeRouteUpdate');
        API.Project.get(Number(to.params['id'])).then(response => {
            console.log('Calling API !');
            switch (response.status) {
                case 200:
                    console.log("Getting API Response !");
                    this.project = response.data
                    this.posts = [];

                    API.Project.posts(this.project).then(response => {
                        console.log("Calling API 2 !");
                        if (response.status == 200) {
                            this.posts = response.data.data;
                            this.currentPage = response.data.meta.current_page;
                            this.lastPage = response.data.meta.last_page;
                            next()
                        }
                    })
                    break;

                default:
                    next(false)
                    break;
            }
        });
    },
    methods: {
        scroll() {
            window.onscroll = () => {
                let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;

                if (bottomOfWindow && this.lastPage != undefined && this.currentPage < this.lastPage) {
                    this.animation.play()
                    API.Project.posts(this.project, this.currentPage+1).then(response => {
                        if (response.status == 200) {
                            this.posts.push(...response.data.data);
                            this.currentPage = response.data.meta.current_page;
                            this.lastPage = response.data.meta.last_page;
                            this.animation.stop()
                        }
                    });
                }
            }
        }
    }
})
</script>

<style scoped>

</style>
