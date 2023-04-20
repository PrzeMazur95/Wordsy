<template>
    <navbar></navbar>
    <addword></addword>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Addword from './components/addWordForm.vue'
export default {
    name: 'addWord',
    components: {
        Navbar,
        Addword
    }
}
</script>
