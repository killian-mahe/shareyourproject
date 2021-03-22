<template>
    <div class="btn-follow btn-viridiant max-w-8 max-h-2" @click="follow()" :class="{'cursor-pointer':state !== 1, 'cursor-not-allowed': state === 1, 'followed': state === 2}">
        {{text}}

        <!-- Icon -->
        <div ref="followIcon" class="h-7 w-7"></div>
    </div>
</template>

<script>
import {API} from '../../api';
import lottie, {AnimationItem} from 'lottie-web';

const State = {
    ENABLED: 0,
    DISABLED: 1,
    FOLLOWED: 2,
    UNFOLLOWED:3
};

export default {
    props: {
        auth_user: {
            type: Object,
            required: false
        },
        project_id: {
            type: Number,
            required: false
        }
    },
    data() {
        return {
            animation: null,
            text: "Follow",
            state: State.DISABLED,
            target: null
        }
    },
    mounted() {
        this.animation = lottie.loadAnimation({
            container: this.$refs['followIcon'],
            renderer: 'svg',
            loop: false,
            autoplay: false,
            path: '/vendor/courier/lottie/plusToX.json'
        });


        if (!this.auth_user) this.state = State.DISABLED;
        else {
            this.state = State.ENABLED;
            if (this.project_id) this.target = 'project';
            else this.state = State.DISABLED;

            this.init();
        }
    },
    methods: {
        follow () {
            if (this.state !== State.DISABLED)
            {
                switch (this.target) {
                    case 'project':
                        if (this.state == State.FOLLOWED) {
                            API.Project.unfollow(this.project_id).then(response => {
                                this.animation.setDirection(-1);
                                this.animation.play();
                                this.state = State.UNFOLLOWED;
                                this.text = 'Follow';
                            });
                        } else {
                            API.Project.follow(this.project_id).then(response => {
                                this.animation.setDirection(1);
                                this.animation.play();
                                this.state = State.FOLLOWED;
                                this.text = 'Unfollow';
                            });
                        }
                        break;

                    default:
                        break;
                }
            }
        },
        init() {
            switch (this.target) {
                case 'project':
                    if (this.auth_user.followed_projects.includes(this.project_id)) {
                        this.animation.goToAndStop(29, true);
                        this.state = State.FOLLOWED;
                        this.text = 'Unfollow';
                    }
                    break;

                default:
                    break;
            }
        }
    }
}
</script>

<style scoped>
.followed {
    @apply bg-onyx-200;
}
</style>
