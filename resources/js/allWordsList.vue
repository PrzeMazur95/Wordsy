<template>
    <navbar></navbar>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
            <listitem></listitem>
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

