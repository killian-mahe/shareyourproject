<template>
    <div class="w-full" v-click-outside="onClickOutside">
        <InputLabel :label="label"  :name="name" />
        <div class="flex items-center relative">
            <input :class="{'border-red-500': error, 'pr-10': icon && right, 'pl-12': icon && !right, 'rounded-b-lg': selectedBadges.length == 0}"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 focus:border-viridiant-600 border-2 border-gray-200 rounded-t-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                    :placeholder="placeholder"
                    v-model="searchQuery"
                    @click="focus = true"
                    @input="updateBadgeList">
            <i v-if="icon !== '' && right == false"
                :data-feather="icon"
                class="absolute left-3 block"></i>
            <i v-if="icon !== '' && right == true"
                :data-feather="icon"
                class="absolute right-3 block"></i>
        </div>
        <div v-if="focus" class="absolute bg-white rounded z-10 shadow-md">
            <div v-for="badge in badges" :key="badge.id" @click="addBadge(badge)" class="flex items-center px-3 py-2 cursor-pointer hover:bg-gray-100">
                <img :src="badge.profile_picture" alt="profile_picture" class="block h-8 w-8 rounded-full mr-3" />
                <div>{{badge.first_name}} {{badge.last_name}}</div>
            </div>
        </div>
        <div v-if="selectedBadges.length > 0" class="w-full border border-gray-200 rounded-b-md flex flex-wrap p-2 bg-cultured-300">
            <div v-for="badge in selectedBadges" :key="badge.id+'_selected'" class="flex items-center px-2 py-1 border border-gray-400 bg-cultured-100 rounded-lg mr-2 mb-2">
                <img :src="badge.profile_picture" alt="profile_picture" class="h-6 w-6 rounded-full">
                <span class="mx-2 leading-6 font-medium text-gray-700">{{badge.first_name}} {{badge.last_name}}</span>
                <svg @click="removeBadge(badge)"
                    class="feather feather-x h-4 w-4 cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </div>
        </div>
        <p v-if="error" class="text-red-500 text-xs italic">{{ error }}</p>
        <p v-if="indication" class="text-gray-600 text-xs italic">{{ indication }}</p>
        <select :name="name" :id="name+'_id'" class="hidden" multiple>
            <option v-for="badge in selectedBadges" :key="badge.id+'_select'" selected :value="badge.id"></option>
        </select>
    </div>
</template>

<script>
    import InputLabel from './InputLabel.vue';
    import vClickOutside from 'v-click-outside';

    export default {
        components: {
            InputLabel
        },
        directives: {
            clickOutside: vClickOutside.directive
        },
        data() {
            return {
                'badges': [],
                'selectedBadges': [],
                'searchQuery': "",
                'focus': false
            }
        },
        props: {
            'label': String,
            'name': String,
            'placeholder': String,
            'error': String,
            'indication': String,
            'icon': String,
            'right': Boolean,
            'multiple': Boolean
        },
        mounted() {
            feather.replace();
        },
        methods: {
            updateBadgeList : function () {
                if (this.searchQuery === "") { this.badges = []; return; }

                axios.get('/api/badges/search/' + this.searchQuery)
                    .then(response => {
                        if (response.status === 200) {
                            this.badges = response.data;
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    })
            },
            addBadge : function (badge) {
                if (this.selectedBadges.map(badge => badge.id).includes(badge.id)) return;

                this.selectedBadges.push(badge);
            },
            removeBadge : function (badge) {
                let index = this.selectedBadges.map(badge => badge.id).indexOf(badge.id);
                if (index > -1) {
                    this.selectedBadges.splice(index, 1);
                }
            },
            onClickOutside : function () {
                this.focus = false;
            }
        },
    }
</script>
