<template>
    <navbar></navbar>
    <addword></addword>
    <fewnewestwordslist :words="words"></fewnewestwordslist>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Addword from './components/addWordForm.vue'
import Fewnewestwordslist from './components/fewNewestWordsList.vue'
export default {
    name: 'addWord',
    components: {
        Navbar,
        Addword,
        Fewnewestwordslist
    },
    data: function () {
        return {
            words: []
        }
    },
    methods: {
        getSmallList () {
            axios.get('api/Words/amountOfWords/3')
                .then ( response => {
                    this.words = response.data.data
                })
                .catch( error => {
                    console.log( error);
                })
        }
    },
    created() {
        this.getSmallList();
    }
}
</script>
