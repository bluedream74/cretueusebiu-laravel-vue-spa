<template>
  <div class="main-layout">
    <Navbar />

    <div class="cont">
      <Sidebar />
      <child />
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/admin/Navbar'
import Sidebar from '~/components/admin/Sidebar'
export default {
  name: 'MypageLayout',
  components: {
    Navbar,
    Sidebar
  },
  mounted() {
    document.title = "NIZIMARI"
  }
}
</script>
<style lang="scss" scoped>
.cont {
  display: flex;
}
</style>