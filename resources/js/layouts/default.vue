<template>
  <div class="main-layout">
    <Navbar class="navbar" />
    <div>
      <child />
    </div>
    <Footer />
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'
import Footer from '~/components/Footer'

export default {
  name: 'MainLayout',

  async mounted() {
  },

  components: {
    Navbar,
    Footer
  },
}
</script>
<style lang="scss" scoped>
@mixin sp {
    @media screen and (max-width: 768px) {
        @content;
    }
}
</style>
