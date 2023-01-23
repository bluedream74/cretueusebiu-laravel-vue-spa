<template>
  <div class="admin__auth">
    <Navbar class="navbar" />
    <child />
    <aside id="top_link">
      <a id="pageTop" href="javascript:void(0)"><img src="/admin/img/btn_pagetop.png" alt="TOPへ" class="scale"></a>
    </aside>
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
.admin__auth {
  width: 100%;
  font-size: 100%;
  text-align: center;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
</style>
