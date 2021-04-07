<template>
    <div>

        <MemberCard
            v-for="(member, index) in members"
            :key="'member_'+member.id"
            :member="member"
            :right="Boolean(index % 2)"
            ></MemberCard>

    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { API } from '../../api'
import MemberCard from '../../components/cards/MemberCard.vue'
import { Project, User } from '../../models'

export default defineComponent({
    components: {
        MemberCard
    },
    data() {
        return {
            project: undefined as unknown as Project,
            members: new Array<User>()
        }
    },
    created() {
        API.Project.get(Number(this.$route.params['id'])).then(response => {
            switch (response.status) {
                case 200:
                    this.project = response.data

                    this.project.member_ids.forEach(id => {
                        API.User.get(id).then((response) => {
                            if (response.status === 200) {
                                this.members.push(response.data)
                            }
                        });
                    });
                    break;

                default:
                    break;
            }
        });
    },
    beforeRouteUpdate(to, from, next) {
        console.log('beforeRouterUpdate')
        API.Project.get(Number(to.params['id'])).then(response => {
            switch (response.status) {
                case 200:
                    this.project = response.data
                    this.members = [];

                    this.project.member_ids.forEach(id => {
                        API.User.get(id).then((response) => {
                            if (response.status === 200) {
                                this.members.push(response.data)
                            }
                            else next(false);
                        });
                    });
                    next()
                    break;

                default:
                    next(false)
                    break;
            }
        });
    },
    methods: {
        setData(project: Project, members: User[]) {
            console.log("Setting Data")
            this.project = project;
            this.members = members;
        }
    }
})
</script>

<style scoped>

</style>
