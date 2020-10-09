<template>
    <div class="w-full relative" v-click-outside="onClickOutside">
        <InputLabel :label="label"  :name="name" />
        <div class="flex items-center relative">
            <input :class="{'border-red-500': error, 'pr-10': icon && right, 'pl-12': icon && !right, 'rounded-b-lg': selectedBadges.length == 0}"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 focus:border-viridiant-600 border-2 border-gray-200 rounded-t-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                    :placeholder="placeholder"
                    v-model="searchQuery"
                    :id="name"
                    @click="focus = true"
                    @input="updateBadgeList"
                    autocomplete="off">
            <i v-if="icon !== '' && right == false"
                :data-feather="icon"
                class="absolute left-3 block"></i>
            <i v-if="icon !== '' && right == true"
                :data-feather="icon"
                class="absolute right-3 block"></i>
        </div>
        <div v-if="focus && badges.length > 0" class="absolute w-full bg-white rounded z-10 shadow-md px-3 py-2 flex flex-wrap">
            <badge-label class="block my-2 w-auto mr-2 cursor-pointer"
                        v-for="badge in badges"
                        @click="addBadge(badge)"
                        :key="badge.id"
                        :label="badge.label"></badge-label>
        </div>
        <div v-if="selectedBadges.length > 0" class="w-full border border-gray-200 rounded-b-md flex flex-wrap p-2 bg-cultured-300">
            <badge-label v-for="badge in selectedBadges" class="mr-2" :key="badge.id+'_selected'" :label="badge.label"></badge-label>
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
    import BadgeLabel from '../utils/BadgeLabel.vue';
    import vClickOutside from 'v-click-outside';

    export default {
        components: {
            InputLabel, BadgeLabel
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
                        console.log(response);
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
                this.searchQuery="";
                this.badges = [];
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
