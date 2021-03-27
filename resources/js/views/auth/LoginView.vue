<template>
    <div class="flex w-full h-screen">
        <img class="hidden md:block w-auto h-full bg-blur-3" :src="'vendor/courier/img/jeff-sheldon-8z2Q6XWLYa4.jpg'" alt="" />
        <div class="absolute right-0 px-12 md:px-24 pt-16 h-full py-12 bg-white w-full md:w-1/2 lg:w-5/12 justify-center">
            <h1 class="text-onyx-600 font-sans font-bold text-center text-4xl mb-6">Login</h1>
            <hr class="mb-12 mx-3">
            <form class="w-full" method="POST" action="#">

                <div class="flex flex-wrap -mx-3 mb-6">
                    <CustomInput
                    @input="onInput"
                    class="w-full px-3" name="email" label="E-mail" type="email" value="Hello" placeholder="jane.doe@shareyourproject.fr"></CustomInput>
                </div>

                <div class="flex flex-wrap -mx-3 mb-6">
                    <CustomInput

                    class="w-full px-3 mb-6 md:mb-0" name="password" label="Password" type="password" placeholder="******************"></CustomInput>
                </div>

                <i class="block mb-3 text-sm">No account yet ? <router-link class="font-medium" :to="{name: 'register'}">Register</router-link></i>

                <button v-on:click="onSubmit($event)" type="submit" class="my-4 btn btn-viridiant hover:text-cultured-100">Log In</button>
            </form>
        </div>
    </div>
</template>
<script lang="ts">
import { defineComponent } from 'vue'
import { API } from '../../api'
import CustomInput from '../../components/inputs/CustomInput.vue'

export default defineComponent({
    components: {
        CustomInput
    },
    data() {
        return {
            email: "",
            form: {
                email: "",
                password: ""
            }
        }
    },
    methods: {
        onInput(input: string) {
            console.log("start")
            console.log(input)
            console.log("end")
        },
        onSubmit(event: Event) {
            event.preventDefault()
            console.log(this.form)
            API.login(this.form).then(response => {
                console.log(response);
            });
        }
    }
})
</script>

