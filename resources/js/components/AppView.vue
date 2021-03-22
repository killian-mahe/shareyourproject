<template>
    <div>Hello !</div>
</template>
<script lang="ts">
import { defineComponent } from 'vue'


export default defineComponent({
    props: {

    },
    methods: {
        printToConsole(word: String) : String {
            console.log(word);
            return word;
        }
    },
    mounted(): void {
        console.log("Hiiiiiii!");
        let word = "Hello";
        word = word.toUpperCase()
        this.printToConsole(word)
    },
})
</script>


