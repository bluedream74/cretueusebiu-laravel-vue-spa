<template>
  <div class="admin__auth">
    <Navbar class="navbar" />
    <child />
    <Footer />
  </div>
</template>

<script>
import Navbar from '../components/admin/Navbar.vue'
import Footer from '../components/admin/Footer.vue'
export default {
  name: 'AdminAuth',
  components: {
    Navbar,
    Footer
  }
}
</script>

<style lang="scss">
</style>
