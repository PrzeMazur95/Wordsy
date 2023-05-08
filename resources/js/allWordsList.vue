<template>
    <navbar></navbar>
    <table class="table">
        <thead>
        <tr class="text-center">
            <th scope="col">Id</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody v-for="(word, index) in words" :key="index">
            <listitem :word="word"></listitem>
        </tbody>
    </table>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Listitem from './components/listItem.vue'
export default {
    name: "allWordsList",
    components: {
        Navbar,
        Listitem
    },
    data: function () {
        return {
            words: []
        }
    },
    methods: {
        getAllWords() {
            axios.get('api/Words')
                .then ( response => {
                    this.words = response.data.data
                })
                .catch( error => {
                    console.log(error)
                })
        }
    },
    created() {
        this.getAllWords();
    }
}
</script>

