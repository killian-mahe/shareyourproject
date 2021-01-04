<template>
    <div v-if="posts.length > 0">
        <post-card v-for="post in posts" :key="post.id" :post_props="post" :auth_user="auth_user"></post-card>
    </div>
</template>

<script>
    import PostCard from '../cards/PostCard.vue';

    export default {
        components : {
            PostCard,
        },
        data() {
            return {
                posts: this.initial_posts
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
                    return {};
                }
            }
        },
        mounted() {
            this.scroll();
        },
        methods: {
            scroll () {
                window.onscroll = () => {
                let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;

                if (bottomOfWindow) {
                    axios.post(`/api/feed`, {
                        except: this.posts.map(post => post.id)
                    })
                    .then(response => {
                        if (response.status === 200) {
                            response.data.forEach(post => {
                                this.posts.push(post);
                            });
                        }
                    });
                }
            };
        },
        },
    }
</script>
