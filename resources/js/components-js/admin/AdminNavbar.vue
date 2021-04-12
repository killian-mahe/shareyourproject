<template>
    <div class="px-6 mt-8">
        <a class="a-none text-onyx-200 text-lg font-semibold hover:text-onyx-100 flex my-10" href="/admin/dashboard">
            <i data-feather="home" class="mr-4 h-5 w-5"></i>
            Dashboard
        </a>
        <div v-for="cat in categories" :key="cat.name" class="transition-all duration-100 ease-in-out select-none my-6">
            <div class="flex items-center cursor-pointer hover:text-onyx-100 font-medium tracking-wide" @click="toggle(cat)" :class="{'text-onyx-100': cat.display, 'text-onyx-200': !cat.display}">
                <i :data-feather="cat.icon" class="mr-4 h-5 w-5"></i> {{ cat.name }}
                <span class="ml-2 transition duration-100 ease-in-out transform" :class="{'rotate-90':cat.display}">
                    <svg class="feather feather-chevron-right h-4 w-4"  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </span>
            </div>
            <ul class="transition-all duration-500 ease-in-out overflow-hidden mt-1" :class="{'max-h-0':!cat.display, 'max-h-32':cat.display}">
                <li class="text-onyx-200 hover:text-onyx-100 tracking-wide ml-8 p-2 transition-colors duration-300 ease-in-out font-medium text-sm" v-for="item in cat.items" :key="item.label"><a class="a-none" :href="item.link">{{ item.label }}</a></li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: this.links
            }
        },
        props: {
            links: Array
        },
        mounted() {
            feather.replace();
        },
        methods: {
            toggle: function(categorie) {
                categorie.display = !categorie.display;
            }
        }
    }
</script>
