<template>
    <navbar></navbar>
    <content></content>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Content from './components/Content.vue'
export default {
    name: 'App',
    components: {
        Content,
        Navbar
    }
}
</script>
