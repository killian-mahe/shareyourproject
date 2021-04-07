<template>
    <div class="bg-cultured-100 shadow md:rounded-lg flex mb-3 border-b-8 border-viridiant-600 min-h-14">
    <img class="w-1/4 md:rounded-tl-md object-cover" :src="'vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg'" alt="project_picture">
        <div class="p-3 flex flex-col justify-between w-full">
            <div>
                <router-link :to="{name:'project', params:{id: project.id}}">
                    <h3 class="font-semibold mb-4">{{ project.name }}</h3>
                </router-link>
                <p class="font-light text-sm">{{ project.description }}</p>

                <div class="mt-4 mb-2">

                    <BadgeLabel
                        class="mr-1"
                        v-for="technologie in project.technologies"
                        :key="'tech_'+technologie.id"
                        :label="technologie.label"
                        link="#"></BadgeLabel>

                </div>

            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue'
import { Project } from '../../models'
import BadgeLabel from '../utils/BadgeLabel.vue'

export default defineComponent({
    components: {
        BadgeLabel
    },
    props: {
        project: {
            type: Object as PropType<Project>,
            required: true
        }
    }
})
</script>

<style scoped>

</style>
