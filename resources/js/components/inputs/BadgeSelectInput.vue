<template>
    <div class="w-full relative" v-click-outside="onClickOutside">

        <!-- Label -->
        <InputLabel :label="label"  :name="name" />

        <!-- Input -->
        <div class="flex items-center relative">
            <input :class="{'border-red-500': error, 'rounded-b-lg': selectedBadges.length == 0}"
                    class="appearance-none block w-full bg-gray-200 text-gray-700 focus:border-viridiant-600 border-2 border-gray-200 rounded-t-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white"
                    :placeholder="placeholder"
                    v-model="searchQuery"
                    :id="name"
                    @click="focus = true"
                    @input="updateBadgeList"
                    autocomplete="off">
        </div>

        <!-- Searched badges -->
        <div v-if="focus && badges.length > 0" class="absolute w-full bg-white rounded z-10 shadow-md px-3 py-2 flex flex-wrap">
            <badge-label class="block "
                        v-for="badge in badges"
                        @click="addBadge(badge)"
                        :close="false"
                        :key="badge.id"
                        :label="badge.label"></badge-label>
        </div>

        <!-- Selected badges -->
        <div v-if="selectedBadges.length > 0" class="w-full border border-gray-200 rounded-b-md flex flex-wrap p-2 bg-cultured-300">
            <span v-for="badge in selectedBadges" :key="badge.id+'_selected'" class="rounded-full px-2 pb-1 pt-0.25 text-xs flex items-center font-semibold bg-onyx-200 lowercase mr-2">{{badge.label}}
                <svg @click="removeBadge(badge)" class="feather feather-x h-4 w-4 cursor-pointer" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </span>
        </div>

        <!-- Indications -->
        <p v-if="error" class="text-red-500 text-xs italic">{{ error }}</p>
        <p v-if="indication" class="text-gray-600 text-xs italic">{{ indication }}</p>


        <select :name="name" :id="name+'_id'" class="hidden" multiple>
            <option v-for="badge in selectedBadges" :key="badge.id+'_select'" selected :value="badge.id"></option>
        </select>
    </div>
</template>

<script lang="ts">
import { defineComponent, PropType } from 'vue'
import InputLabel from './InputLabel.vue';
import BadgeLabel from '../utils/BadgeLabel.vue';
import vClickOutside from '../../click-outside';
import {API} from '../../api';
import { Badge } from '../../models';

export default defineComponent({
    components: {
        InputLabel,
        BadgeLabel
    },
    directives: {
        clickOutside: vClickOutside
    },
    data() {
        return {
            badges: new Array<Badge>(),
            selectedBadges: new Array<Badge>(),
            searchQuery: "",
            focus: false
        }
    },
    props: {
        label: {
            type: String,
            default: ""
        },
        name: {
            type: String,
            default: ""
        },
        placeholder: {
            type: String,
            default: ""
        },
        error: {
            type: String,
            default: ""
        },
        indication: {
            type: String,
            default: ""
        },
        modelValue: {
            type: Object as PropType<Array<Badge>>,
            required: true
        }
    },
    methods: {
        reset() {
            this.searchQuery = "";
            this.badges = [];
            this.focus = false;
        },
        updateBadgeList : function () {
            if (this.searchQuery === "") { this.badges = []; return; }

            API.Badge.search(this.searchQuery).then(response => {
                this.badges = response.data;
            });
        },
        addBadge : function (badge: Badge) {
            if (this.selectedBadges.map(badge => badge.id).includes(badge.id)) return;

            this.selectedBadges.push(badge);
            this.reset()
            this.$emit('update:modelValue', this.selectedBadges);
        },
        removeBadge : function (badge: Badge) {
            let index = this.selectedBadges.map(badge => badge.id).indexOf(badge.id);
            if (index > -1) {
                this.selectedBadges.splice(index, 1);
                this.$emit('update:modelValue', this.selectedBadges);
            }
        },
        onClickOutside : function () {
            this.focus = false;
        }
    },
})
</script>
