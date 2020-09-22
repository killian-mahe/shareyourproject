<template>
    <div>
        <project-card v-for="project in projects" :key="project.id" v-bind:project="project"></project-card>
        <button v-if="this.index < this.projects_ids.length" class="btn-classic w-full font-sans text-sm" @click="addProject">Load more projects</button>
    </div>
</template>

<script>
    import ProjectCard from '../cards/ProjectCard.vue';
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
            axios.post('/api/projects/get', {
                projects_ids: this.projects_ids.slice(0, 3)
            }).then(response => {
                this.projects = response.data;
            });
            feather.replace();
        },
        methods: {
            addProject: function() {
                if (this.index < this.projects_ids.length)
                {
                    axios.post('/api/projects/get', {
                        projects_ids: this.projects_ids.slice(this.index, Math.min(this.index+3, this.projects_ids.length))
                    }).then(response => {
                        response.data.forEach(data => {
                            this.projects.push(data);
                        });
                    });
                    this.index += 3;
                }
            }
        },
    }
</script>
