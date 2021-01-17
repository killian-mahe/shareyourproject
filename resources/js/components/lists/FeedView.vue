<template>
    <div v-if="posts.length > 0">
        <post-card v-for="post in posts" :key="post.id" :post_props="post" :auth_user="auth_user"></post-card>
        <div class="h-10 my-3" ref="loader"></div>
    </div>
</template>

<script>
    import PostCard from '../cards/PostCard.vue';
    import {API} from '../../api';
    import lottie from 'lottie-web';

    export default {
        components : {
            PostCard,
        },
        data() {
            return {
                posts: this.initial_posts,
                animation: null
            }
        },
        props: {
            initial_posts: {
                type: Array,
                default: function() {
                    return [];
                }
            },
            auth_user: {
                type: Object,
                default: function() {
                    return null;
                }
            }
        },
        mounted() {
            this.scroll();
            this.animation = lottie.loadAnimation({
                container: this.$refs['loader'],
                renderer: 'svg',
                loop: true,
                autoplay: false,
                path: '/vendor/courier/lottie/loading.json'
            });
        },
        methods: {
            startLoading() {
                this.animation.play();
            },
            stopLoading() {
                this.animation.stop();
            },
            scroll () {

                window.onscroll = () => {
                let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;

                if (bottomOfWindow) {
                    this.startLoading();

                    API.Post.feed(this.posts.map(post => post.id)).then(posts => {

                        if (posts) {
                            posts.forEach(post => {
                                this.posts.push(post);
                            })
                        }
                        this.stopLoading();
                    });
                }
            };
        },
        },
    }
</script>
