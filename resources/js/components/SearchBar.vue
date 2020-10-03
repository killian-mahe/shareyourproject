<template>
    <div class="my-auto w-1/4">
        <form role="search" class="w-full justify-center">
            <div class="flex items-center relative">
            <i class="search-glass" data-feather="search"></i>
            <input  autocomplete="off" id="search-submit" type="text" placeholder="Search" v-model="searchQuery" class="search-input placeholder-onyx-300">
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                projects: Object,
                users: Object,
                searchQuery: ""
            }
        },
        mounted() {
            feather.replace();
        },
        updated() {
            console.log(this.searchQuery);
        },
        methods: {
        }
    }
</script>
