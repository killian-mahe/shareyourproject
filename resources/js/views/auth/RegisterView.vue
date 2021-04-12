<template>
    <div class="flex w-full h-screen">
        <img class="hidden md:block w-auto h-full bg-blur-3" :src="'vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg'" alt="" />
        <div class="absolute right-0 px-12 pt-16 md:h-full py-12 bg-white w-full md:w-1/2 lg:w-5/12 justify-center">
            <h1 class="text-onyx-600 font-sans font-bold text-center text-4xl mb-6">Register</h1>
            <hr class="mb-12 mx-3">
            <form class="w-full" method="POST" action="#" @submit.prevent="onSubmit">

                <div class="flex flex-wrap -mx-3 mb-6">
                    <CustomInput
                    v-model="form.first_name"
                    :error="errors.first_name"
                    class="w-full md:w-1/2 px-3 mb-6 md:mb-0" name="first-name" label="First Name" type="text" placeholder="Jane" value=""></CustomInput>

                    <CustomInput
                    v-model="form.last_name"
                    :error="errors.last_name"
                    class="w-full md:w-1/2 px-3" name="last-name" label="Last Name" type="text" placeholder="Doe" value=""></CustomInput>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <CustomInput
                    v-model="form.username"
                    :error="errors.username"
                    class="w-full px-3 mb-6 md:mb-0" name="username" label="Username" type="text" placeholder="jane-doe" value=""></CustomInput>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <CustomInput
                    v-model="form.email"
                    :error="errors.email"
                    class="w-full px-3" name="email" label="E-mail" type="email" placeholder="jane.doe@shareyourproject.fr" value=""></CustomInput>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <CustomInput
                    v-model="form.password"
                    :error="errors.password"
                    class="w-full md:w-1/2 px-3 mb-6 md:mb-0" name="password" label="Password" type="password" placeholder="******************" indication="Make it as long and as crazy as you'd like"></CustomInput>
                    <CustomInput
                    v-model="form.password_confirmation"
                    :error="errors.password_confirmation"
                    class="w-full md:w-1/2 px-3" name="password_confirmation" label="Confirm Password" type="password" placeholder="******************"></CustomInput>
                </div>
                <i class="block mb-3 text-sm">Already have an account ? <router-link class="font-medium" :to="{name: 'login'}">Log In</router-link></i>
                <button type="submit" class="my-4 btn btn-viridiant hover:text-cultured-100">Sign Up</button>
            </form>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import { API } from '../../api'
import { mapActions, mapGetters } from 'vuex'
import CustomInput from '../../components/inputs/CustomInput.vue'
import { AxiosStatic } from 'axios'

export default defineComponent({
    components: {
        CustomInput
    },
    data() {
        return {
            form: {
                first_name: "",
                last_name: "",
                username: "",
                email: "",
                password: "",
                password_confirmation:""
            },
            errors: {
                first_name: "",
                last_name: "",
                username: "",
                email: "",
                password: "",
                password_confirmation:""
            }
        }
    },
    computed: {
        ...mapGetters({
            isAuthenticated: 'isAuthenticated'
        })
    },
    methods: {
        ...mapActions({
            me: 'me'
        }),
        resetErrors() {
            this.errors = {
                first_name: "",
                last_name: "",
                username: "",
                email: "",
                password: "",
                password_confirmation: ""
            };
        },
        async onSubmit(event: Event): Promise<void> {
            await ((window as any).axios as AxiosStatic).get('/sanctum/csrf-cookie');

            API.register(this.form).then(response => {
                this.resetErrors()

                switch (response.status) {
                    case 201:
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

                    default:
                        break;
                }
            });

        }
    }
})
</script>

