<template>
    <div class="w-full relative" v-click-outside="onClickOutside" @click="onFocus">
        <InputLabel :label="label"  :name="name" />
        <div :class="{'border-viridiant-600 bg-white': focus, 'border-gray-200 bg-gray-200': !focus}"
            class="h-12 appearance-none w-full text-gray-700 border-2 rounded-lg py-3 px-4 leading-tight cursor-text flex">
            <span class="italic leading-6 font-light text-gray-800 flex items-center mr-2 bg-gray-200 rounded" v-for="tag in selectedTags" :key="tag">#{{tag}}
                <svg class="feather feather-x h-4 w-4 cursor-pointer" @click="removeTag(tag)" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
            </span>
            <input type="text"
                    class="appearance-none"
                    :class="{'bg-white': focus, 'bg-gray-200': !focus}"
                    @keyup.space="onSpace"
                    @keyup.backspace="onDelete"
                    @input="updateTagList"
                    autocomplete="off"
                    ref="input">
        </div>
        <div v-if="focus && tags.length > 0" class="absolute w-full bg-white rounded z-10 shadow-md px-3 py-2 flex flex-wrap">
            <tag-label class="block my-2 w-auto mr-2 cursor-pointer"
                        v-for="tag in tags"
                        @click="addTag(tag.name)"
                        :key="tag.id"
                        :label="tag.name"></tag-label>
        </div>
        <select :name="name" class="hidden" multiple>
            <option v-for="tag in selectedTags" :key="tag" :value="tag" selected></option>
        </select>
        <p v-if="error" class="text-red-500 text-xs italic">{{ error }}</p>
        <p v-if="indication" class="text-gray-600 text-xs italic">{{ indication }}</p>
    </div>
</template>

<script>
    import InputLabel from './InputLabel.vue';
    import vClickOutside from 'v-click-outside';
    import {API} from '../../api';

    export default {
        components: {
            InputLabel
        },
        directives: {
            clickOutside: vClickOutside.directive
        },
        data() {
            return {
                focus: false,
                tags: [],
                selectedTags: [],
                x: null
            }
        },
        props: {
            'label': String,
            'name': String,
            'placeholder': String,
            'error': String,
            'indication': String
        },
        mounted() {
            feather.replace();
        },
        methods: {
            updateTagList : function () {
                if (this.x) clearTimeout(this.x);

                this.x = setTimeout(() => {
                    if (this.$refs.input.value.replace(" ","") === "") { return; }

                    API.Tag.search(this.$refs.input.value.replace(" ","")).then(tags => {
                        this.tags = tags;
                    });

                }, 250);
            },
            onSpace: function() {
                let tag = this.$refs.input.value;
                this.addTag(tag);
                this.$refs.input.value = "";
            },
            addTag: function(tag) {
                tag = tag.replace(" ","");
                if (this.selectedTags.includes(tag) || tag === "") return;
                console.log(tag);
                this.selectedTags.push(tag);
                console.log(this.selectedTags);
                this.$refs.input.value="";
                this.tags = [];
            },
            onDelete: function() {
                let tag = this.$refs.input.value;
                if (tag === "") {
                    this.selectedTags.pop();
                }
            },
            onFocus: function () {
                this.focus = true;
                this.$refs.input.focus();
            },
            removeTag: function(tag) {
                let index = this.selectedTags.indexOf(tag);
                if (index > -1) {
                    this.selectedTags.splice(index, 1);
                }
            },
            onClickOutside : function () {
                this.focus = false;
            }
        },
    }
</script>
