<template>
    <navbar></navbar>
    <addword></addword>
    <fewnewestwordslist></fewnewestwordslist>
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
    }
}
</script>
