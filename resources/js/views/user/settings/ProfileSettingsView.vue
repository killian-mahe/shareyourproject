<template>
    <!-- Main Content -->
    <div class="w-full">
        <div class="box w-full h-auto p-3 md:p-6">
            <div class="font-semibold text-xl border-b pb-3 w-full mb-4 ml-2">Public Profile Settings</div>
            <form class="px-2 py-2 md:px-3 md:py-3" @submit.prevent="onSubmit">
                <!-- First Name / Last Name -->
                <div class="w-full flex items-center space-x-3 md:space-x-8">
                    <div class="w-1/2 md:w-3/4 xl:w-1/2 space-y-4">
                        <CustomInput class="w-full" name="first_name" label="First name" type="text" placeholder="Jan" v-model="form.first_name" :error="errors.first_name"></CustomInput>
                        <CustomInput class="w-full" name="last_name" label="Last name" type="text" placeholder="Doe" v-model="form.last_name" :error="errors.last_name"></CustomInput>
                    </div>
                    <!-- Profile Picture -->
                    <div class=" w-1/2 md:w-1/4 md:flex-none md:mx-8 lg:w-1/3 xl:w-1/2 flex items-center justify-center">
                        <div class="w-36 h-full">
                            <PictureInput img_radius="full" img_height="9rem" img_path="https://randomwordgenerator.com/img/picture-generator/57e7d4414d51a814f1dc8460962e33791c3ad6e04e50744172287cd09e49cd_640.jpg"></PictureInput>
                        </div>
                    </div>
                </div>
                <span class="text-gray-600 text-xs italic w-1/2">Your name may appear around ShareYourProject where you contribute or are mentioned. You can change it at any time.</span>
                <!-- Company -->
                <CustomInput class="w-full mt-8" name="title" label="Company" type="text" v-model="form.title" :error="errors.title" placeholder="ex: Tesla Inc."></CustomInput>
                <!-- Bio -->
                <TextArea class="mt-4" label="Bio" name="bio" placeholder="Tell us a little bit about yourself" rows="2" v-model="form.bio" maxLength="800"></TextArea>

                <!-- Links -->
                <div class="w-full flex-none space-y-2">
                    <div class="w-full flex items-center space-x-4 mt-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-onyx-800 h-5 w-5 cursor-pointer feather feather-facebook" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                        <CustomInput class="w-full" name="link1" type="url" placeholder="ex: jane.doe@facebook.fr"></CustomInput>
                    </div>
                    <div class="w-full flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-onyx-800 h-5 w-5 cursor-pointer feather feather-linkedin" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                        <CustomInput class="w-full" name="link2" type="url" placeholder="ex: jane.doe@linkedin.fr"></CustomInput>
                    </div>
                    <div class="w-full flex items-center space-x-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="text-onyx-800 h-5 w-5 cursor-pointer feather feather-github" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>
                        <CustomInput class="w-full" name="link3" type="url" placeholder="ex: jane.doe@github.fr"></CustomInput>
                    </div>
                </div>

                <div class="w-full flex justify-center">
                    <button class="btn btn-viridiant mt-5" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import CustomInput from '../../../components/inputs/CustomInput.vue'
import PictureInput from '../../../components/inputs/PictureInput.vue'
import TextArea from '../../../components/inputs/TextArea.vue'
import { mapGetters } from 'vuex'
import { API } from '../../../api'

export default defineComponent({
    components: {
        CustomInput,
        PictureInput,
        TextArea,
    },
    data() {
        return {
            form: {
                first_name: "",
                last_name: "",
                title: "",
                bio: ""
            },
            errors: {
                first_name: "",
                last_name: "",
                title: "",
                bio: ""
            }
        }
    },
    computed: {
        ...mapGetters({
            isAuthenticated: 'isAuthenticated',
            user: 'user',
        })
    },
    methods:{
        onSubmit(): void {
            API.User.updateProfile(this.user, this.form).then(response => {
                this.resetErrors()

                switch (response.status) {
                    case 200:
                        // Authenticated
                        this.me().then(() => {
                            if (this.isAuthenticated)
                            {
                                this.$router.push({name: 'feed'});
                            }
                        })

                        break;

                    case 422:
                        // Invalid form
                        let errorsObject = response.data.errors;

                        for (var key in errorsObject) {
                            if (errorsObject.hasOwnProperty(key)) {
                                errorsObject[key] = errorsObject[key][0];
                            }
                        }

                        this.errors = errorsObject;
                        break;

                    case 401:
                        this.credentialError = response.data;
                        break;
                    default:
                        break;
                }
            });
        },
        resetErrors() {
            this.errors = {
                first_name: "",
                last_name: "",
                title: "",
                bio: ""
            };
        },
    },
    mounted() {
        this.form.first_name = this.user.first_name;
        this.form.last_name = this.user.last_name;
        this.form.title = this.user.title;
        this.form.bio = this.user.bio;
    },
})
</script>


