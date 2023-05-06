<template>
    <navbar></navbar>
</template>

<script>
import Navbar from './components/Navbar.vue'
export default {
    name: "allWordsList",
    components: {
        Navbar
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

