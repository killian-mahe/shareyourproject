<template>
    <div>
        <project-card v-for="project in projects" :key="project.id" v-bind:project="project"></project-card>
        <button v-if="this.index < this.projects_ids.length" class="btn-classic w-full font-sans text-sm" @click="addProject">Load more projects</button>
    </div>
</template>

<script>
    import ProjectCard from '../cards/ProjectCard.vue';
    import {API} from '../../api';

    export default {
        components : {
            ProjectCard,
        },
        data() {
            return {
                projects: {},
                index: 0
            }
        },
        props: {
            size: {
                type: Number,
                default: 3
            },
            projects_ids: Array
        },
        mounted() {
            this.index = this.size;
            API.Project.getMany(this.projects_ids.slice(0, 3)).then(projects => {
                this.projects = projects;
            })
            feather.replace();
        },
        methods: {
            addProject: function() {
                if (this.index < this.projects_ids.length)
                {
                    API.Project.getMany(this.projects_ids.slice(this.index, this.index+3))
                                .then(projects => {
                                    projects.forEach(project => {
                                        this.projects.push(project);
                                    });
                                });
                    this.index += 3;
                }
            }
        },
    }
</script>
