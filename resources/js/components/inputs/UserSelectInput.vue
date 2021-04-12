<template>
  <div class="w-full relative" v-click-outside="onClickOutside">
    <InputLabel :label="label" :name="name" />
    <div class="flex items-center relative">
      <input
        :class="{
          'border-red-500': error,
          'rounded-b-lg': selectedUsers.length == 0,
        }"
        class="appearance-none block w-full bg-gray-200 text-gray-700 focus:border-viridiant-600 border-2 border-gray-200 rounded-t-lg py-3 px-4 leading-tight focus:outline-none focus:bg-white"
        :placeholder="placeholder"
        v-model="searchQuery"
        :id="name"
        @click="focus = true"
        autocomplete="off"
        @input="updateUserList"
      />
    </div>
    <div v-if="focus" class="absolute w-full bg-white rounded z-10 shadow-md">
      <div
        v-for="user in users"
        :key="user.id"
        @click="addUser(user)"
        class="flex items-center px-3 py-2 cursor-pointer hover:bg-gray-100"
      >
        <img :src="user.profile_picture" alt="profile_picture" class="block h-8 w-8 rounded-full mr-3"/>
        <div>{{ user.first_name }} {{ user.last_name }}</div>
      </div>
    </div>
    <div
      v-if="selectedUsers.length > 0"
      class="w-full border border-gray-200 rounded-b-md flex flex-wrap p-2 bg-cultured-300"
    >
      <div
        v-for="user in selectedUsers"
        :key="user.id + '_selected'"
        class="flex items-center px-2 py-1 border border-gray-400 bg-cultured-100 rounded-lg mr-2 mb-2">
        <img :src="user.profile_picture" alt="profile_picture" class="h-6 w-6 rounded-full"/>
        <span class="mx-2 leading-6 font-medium text-gray-700">{{ user.first_name }} {{ user.last_name }}</span>
        <svg
          @click="removeUser(user)"
          class="feather feather-x h-4 w-4 cursor-pointer"
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <line x1="18" y1="6" x2="6" y2="18"></line>
          <line x1="6" y1="6" x2="18" y2="18"></line>
        </svg>
      </div>
    </div>
    <p v-if="error" class="text-red-500 text-xs italic">{{ error }}</p>
    <p v-if="indication" class="text-gray-600 text-xs italic">
      {{ indication }}
    </p>
    <select :name="name" id="name" class="hidden" multiple>
      <option
        v-for="user in selectedUsers"
        :key="user.id + '_select'"
        selected
        :value="user.id"
      ></option>
    </select>
  </div>
</template>

<script lang="ts">
import { defineComponent, PropType } from "vue";
import InputLabel from "./InputLabel.vue";
import vClickOutside from "../../click-outside";
import { API } from "../../api";
import { User } from "../../models";

export default defineComponent({
  components: {
    InputLabel,
  },
  directives: {
    clickOutside: vClickOutside,
  },
  data() {
    return {
      users: new Array<User>(),
      selectedUsers: new Array<User>(),
      searchQuery: "",
      focus: false,
      timer: undefined as unknown as NodeJS.Timeout,
    };
  },
  props: {
    label: {
        type: String,
        default: ""
    },
    name: {
        type: String,
        required: true
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
        type: Object as PropType<Array<User>>,
        required: true
    }
  },
  methods: {
    updateUserList: function () {
      if (this.timer) clearTimeout(this.timer);

      this.timer = setTimeout(() => {
        if (this.searchQuery === "") {
          this.users = [];
          return;
        }

        API.User.search(this.searchQuery).then((response) => {
          switch (response.status) {
              case 200:
                  this.users = response.data;
                  break;

              default:
                  break;
          }
        });
      }, 250);
    },
    reset() {
        this.focus = false;
        this.users = [];
        this.searchQuery = "";
    },
    addUser(user: User) {
        if (this.selectedUsers.map((user) => user.id).includes(user.id)) return;

        this.selectedUsers.push(user);
        this.reset();
        this.$emit('update:modelValue', this.selectedUsers);
    },
    removeUser(user: User) {
      let index = this.selectedUsers.map((user) => user.id).indexOf(user.id);
      if (index > -1) {
        this.selectedUsers.splice(index, 1);
        this.$emit('update:modelValue', this.selectedUsers);
      }
    },
    onClickOutside: function () {
      this.focus = false;
    },
  },
})
</script>
