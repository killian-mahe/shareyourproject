<template>
  <div class="w-full flex justify-center mt-4 min-h-screen">
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>

    <div class="w-full md:w-2/3 lg:w-1/2 mx-4">
      <!-- Center block -->
      <div class="box w-full h-auto mb-6 px-8">
        <h1 class="text-onyx-600 font-sans font-bold text-center text-3xl p-4">
          Create a new project
        </h1>
        <hr class="mb-6" />

        <form @submit.prevent="onSubmit">
          <div class="w-full h-auto flex space-x-4">
            <CustomInput
              class="w-full xl:w-1/2 mb-4"
              :autocomplete="false"
              name="name"
              label="Project name"
              indication="Great project names are short and memorable."
              type="text"
              placeholder="ex : Share Your Project"
              :error="errors.name"
              v-model="form.name"
            ></CustomInput>
          </div>

          <TextArea
            v-model="form.description"
            :maxlength="200"
            label="Description"
            name="description"
            :error="errors.description"
          ></TextArea>

          <UserSelectInput class="w-full mb-4"
            name="collaborators[]" label="Add a new collaborator" placeholder="ex : John Doe"
            v-model="form.collaborators"
            :error="errors.collaborators"
          ></UserSelectInput>


          <h1 class="text-onyx-600 font-sans font-semiboldbold text-left text-lg pb-4 pt-8">Project referencing</h1>
            <hr class="mb-6">


            <div class="block md:flex w-full h-auto md:space-x-4">
                <BadgeSelectInput

                    class="w-full md:w-1/2 mb-4"
                    name="badges[]" label="Select your badge(s)" placeholder="ex : Python"
                    v-model="form.badges"
                    :error="errors.badges"></BadgeSelectInput>
            </div>



            <h1 class="text-onyx-600 font-sans font-semiboldbold text-left text-lg pb-4 pt-8">Project Planning</h1>
            <hr class="mb-6">

            <div class="w-full block xl:flex xl:space-x-4">
                <div class="block md:flex w-full md:space-x-4 xl:w-2/3">
                    <CustomInput v-model="form.start_date" class="md:w-1/2 mb-4" name="start_date" label="Start Date" type="date" :error="errors.start_date"></CustomInput>
                    <CustomInput v-model="form.end_date" class="md:w-1/2 mb-4" name="end_date" label="Due date" type="date" :error="errors.end_date"></CustomInput>
                </div>
                <SelectInput v-model="form.status" class="w-1/2 xl:w-1/3 mb-4" label="Project status" name="status" :options='statusOptions'>
                    <svg class="text-onyx-900 my-auto h-4 w-4 cursor-pointer absolute right-3 feather feather-chevron-down"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </SelectInput>
            </div>

          <div>
            <button
              type="submit"
              class="my-4 btn btn-viridiant hover:text-cultured-100"
            >
              Create project
            </button>
          </div>
        </form>
      </div>

      <!-- Main -->
    </div>
    <div class="hidden xl:block lg:w-1/6 xl:w-1/8"></div>
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import CustomInput from "../../components/inputs/CustomInput.vue";
import TextArea from "../../components/inputs/TextArea.vue";
import UserSelectInput from '../../components/inputs/UserSelectInput.vue';
import BadgeSelectInput from '../../components/inputs/BadgeSelectInput.vue'
import SelectInput from '../../components/inputs/SelectInput.vue'
import { User, Badge } from "../../models";
import {API} from '../../api'

export default defineComponent({
    components: {
        CustomInput,
        TextArea,
        UserSelectInput,
        BadgeSelectInput,
        SelectInput
    },
    data() {
        return {
            form: {
                name: "",
                description: "",
                collaborators: new Array<User>(),
                badges: new Array<Badge>(),
                start_date: undefined as unknown as Date,
                end_date: undefined as unknown as Date,
                status: "",
            },
            errors:{
                name: "",
                description: "",
                collaborators: "",
                badges: "",
                start_date: "",
                end_date: "",
                status: "",
            },
            statusOptions: [
            {'text': 'Ongoing', 'value': 'ongoing'},
            {'text': 'On Break', 'value': 'onbreak'},
            {'text': 'Finished', 'value': 'finished'},
            {'text': 'Abandoned', 'value': 'abandoned'},
        ]
        }
    },
    methods: {
        onSubmit() {
            this.errors = {
                name: "",
                description: "",
                collaborators: "",
                badges: "",
                start_date: "",
                end_date: "",
                status: "",
            }

            API.Project.create(this.form.name, this.form.description, this.form.status, this.form.start_date,
                                this.form.collaborators.map(x => x.id), this.form.badges.map(x => x.id), undefined, this.form.end_date).then(response => {
                switch (response.status) {
                    case 201:
                        this.$router.push({name: 'project', params:{id:response.data.id}});
                        break;

                    case 422:
                        let errorsObject = (response.data as any).errors;

                        for (var key in errorsObject) {
                            if (errorsObject.hasOwnProperty(key)) {
                                errorsObject[key] = errorsObject[key][0];
                            }
                        }

                        console.log(this.errors)

                        this.errors = errorsObject;
                        break;
                    default:
                        break;
                }
                console.log(response);
            })
        }
    }
});
</script>

<style scoped>
</style>
