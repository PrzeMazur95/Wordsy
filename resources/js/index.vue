<template>
    <navbar></navbar>
    <content></content>
    <Footer></Footer>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Content from './components/Content.vue'
import Footer from './components/Footer.vue'
export default {
    name: 'Index',
    components: {
        Content,
        Navbar,
        Footer
    }
}
</script>
