<template>
    <div class="flex w-full h-screen">
        <img class="hidden md:block w-auto h-full bg-blur-3" :src="'vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg'" alt="" />
        <div class="absolute right-0 px-12 md:px-24 pt-16 h-full py-12 bg-white w-full md:w-1/2 lg:w-5/12 justify-center">
            <h1 class="text-onyx-600 font-sans font-bold text-center text-4xl mb-6">Login</h1>
            <hr class="mb-12 mx-3">
            <form class="w-full" method="POST" action="#" @submit.prevent="onSubmit">

                <div class="flex flex-wrap -mx-3 mb-6">
                    <CustomInput
                    v-model="form.email"
                    :error="errors.email"
                    class="w-full px-3" name="email" label="E-mail" type="email" placeholder="jane.doe@shareyourproject.fr"></CustomInput>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <CustomInput
                    v-model="form.password"
                    :error="errors.password"
                    class="w-full px-3 mb-3 md:mb-0" name="password" label="Password" type="password" placeholder="******************"></CustomInput>
                </div>

                <div class="alert alert-danger" v-if="credentialError">{{ credentialError }}</div>

                <i class="block my-3 text-sm">No account yet ? <router-link class="font-medium" :to="{name: 'register'}">Register</router-link></i>

                <button type="submit" class="my-4 btn btn-viridiant hover:text-cultured-100">Log In</button>
            </form>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue'
import CustomInput from '../../components/inputs/CustomInput.vue'
import { mapActions, mapGetters } from 'vuex'
import { API } from '../../api'
import { AxiosStatic } from 'axios'

export default defineComponent({
    components: {
        CustomInput
    },
    data() {
        return {
            form: {
                email: "",
                password: ""
            },
            errors: {
                email: "",
                password: ""
            },
            credentialError: ""
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
                email: "",
                password: ""
            };

            this.credentialError = "";
        },
        async onSubmit(event: Event) {

            await ((window as any).axios as AxiosStatic).get('/sanctum/csrf-cookie');

            API.login(this.form).then(response => {
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

        }
    }
})
</script>
