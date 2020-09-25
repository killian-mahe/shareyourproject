<template>
    <div class="box w-auto mb-6 p-6 lg:flex" v-bind:class="{'justify-end':right}">
        <a v-if="!right" href="#"><img class="h-20 w-20 rounded-full transform ease-in-out duration-200 lg:h-22 lg:w-22 mx-auto lg:ml-0 lg:mr-6 hover:scale-105 hover:shadow-md" :src="user.profile_picture"></a>
        <div class="text-center " v-bind:class="{'lg:text-right':right, 'lg:text-left':!right}">
            <a href="#" class="text-lg hover:underline">{{ user.first_name }} {{ user.last_name }}</a>
            <div class="text-viridiant-600 italic">{{ user.title }}</div>
            <a href="#" class="text-gray-600 hover:text-onyx-600 hover:underline">{{ user.email }}</a>
        </div>
        <a v-if="right" href="#"><img class="h-20 w-20 rounded-full transform ease-in-out duration-200 lg:h-22 lg:w-22 mx-auto lg:mr-0 lg:ml-6 hover:scale-105 hover:shadow-md" :src="user.profile_picture"></a>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                user: {
                    first_name : "Hello"
                }
            }
        },
        props: {
            'user_id': Number,
            'right': Number
        },
        mounted() {
            axios.get('/api/users/'+this.user_id)
                 .then(response => {
                     console.log(response);
                    if (response.status === 200) this.user = response.data;
                 })
                 .catch(error => {

                });
        }
    }
</script>
