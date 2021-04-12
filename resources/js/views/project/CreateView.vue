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

        <form>
          <div class="w-full h-auto flex space-x-4">
            <CustomInput
              class="w-full xl:w-1/2 mb-4"
              :autocomplete="false"
              name="name"
              label="Project name"
              indication="Great project names are short and memorable."
              type="text"
              placeholder="ex : Share Your Project"
              error=""
            ></CustomInput>
          </div>

          <TextArea
            :max_length="200"
            label="Description"
            name="description"
          ></TextArea>

          <UserSelectInput class="w-full mb-4"
            name="collaborators[]" label="Add a new collaborator" placeholder="ex : John Doe"
            v-model="form.members"
          ></UserSelectInput>


          <h1 class="text-onyx-600 font-sans font-semiboldbold text-left text-lg pb-4 pt-8">Project referencing</h1>
            <hr class="mb-6">


            <div class="block md:flex w-full h-auto md:space-x-4">
                <BadgeSelectInput
                    class="w-full md:w-1/2 mb-4"
                    name="badges[]" label="Select your badge(s)" placeholder="ex : Python"
                    v-model="form.badges"></BadgeSelectInput>

                <!-- @php
                    $options = [
                        ['text' => 'Ongoing', 'value' => 'ongoing'],
                        ['text' => 'On Break', 'value' => 'onbreak'],
                        ['text' => 'Finished', 'value' => 'finished'],
                        ['text' => 'Abandoned', 'value' => 'abandoned'],
                    ];

                @endphp
                <tag-select-input class="w-full md:w-1/2" name="tags[]" label="Type your Hash-tag(s)"></tag-select-input> -->
            </div>



            <!-- <h1 class="text-onyx-600 font-sans font-semiboldbold text-left text-lg pb-4 pt-8">Project Planning</h1>
            <hr class="mb-6">

            <div class="w-full block xl:flex xl:space-x-4">
                <div class="block md:flex w-full md:space-x-4 xl:w-2/3">
                    <custom-input class="md:w-1/2 mb-4" name="start_date" label="Start Date" type="date" error=""></custom-input>
                    <custom-input class="md:w-1/2 mb-4" name="finished_date" label="Due date" type="date" error=""></custom-input>
                </div>
                <select-input class="w-1/2 xl:w-1/3 mb-4" label="Project status" name="status" :options='@json($options)'>
                    <i class="text-onyx-900 my-auto h-4 w-4 cursor-pointer absolute right-3 transform rotate-90" data-feather="code"></i>
                </select-input>
            </div> -->

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
import { User, Badge } from "../../models";

export default defineComponent({
  components: {
    CustomInput,
    TextArea,
    UserSelectInput,
    BadgeSelectInput
  },
  data() {
      return {
          form: {
              members: new Array<User>(),
              badges: new Array<Badge>()
          }
      }
  }
});
</script>

<style scoped>
</style>
