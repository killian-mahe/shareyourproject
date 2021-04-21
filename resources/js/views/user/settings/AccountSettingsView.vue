<template>
    <!-- Main Content -->
    <div class="w-full">
        <div class="box w-full h-auto p-3 md:p-6">
            <div class="font-semibold text-xl border-b pb-3 w-full mb-4 ml-2">Account Settings</div>
            <form class="px-2 py-2 md:px-3 md:py-3">
                <!-- Email - Password -->
                <div class="w-full grid grid-cols-1 md:grid-cols-2 grid-rows-3 gap-4">
                    <div >
                        <CustomInput name="email" label="E-mail" type="text" placeholder="jane.doe@shareyourproject.fr"></CustomInput>
                    </div>
                    <div class="hidden md:block"></div>
                    <div>
                        <CustomInput name="password" label="New password" type="text" placeholder="******************" value=""></CustomInput>
                    </div>
                    <div>
                        <CustomInput class="w-full" name="password_confirmation" label="Confirm your password" type="text" placeholder="******************" value=""></CustomInput>
                    </div>
                    <div>
                        <!-- Pseudo -->
                        <CustomInput name="pseudo" label="Pseudo" type="text" placeholder="Art3mis/Daito"></CustomInput>
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
import { mapGetters } from 'vuex'

export default defineComponent({
    components: {
        CustomInput,
    },
    computed: {
        ...mapGetters({
            isAuthenticated: 'isAuthenticated',
            user: 'user',
        })
    },
})
</script>



