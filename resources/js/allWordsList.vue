<template>
    <navbar></navbar>
    <div class="container">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                <tr class="text-center table-light">
                    <th class="col-2">Id</th>
                    <th class="col-4">Word</th>
                    <th class="col-4">Translation</th>
                    <th class="col-2">Options</th>
                </tr>
                </thead>
                <tbody v-for="(word, index) in words" :key="index">
                    <listitem :word="word"></listitem>
                </tbody>
            </table>
        </div>
    </div>
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

