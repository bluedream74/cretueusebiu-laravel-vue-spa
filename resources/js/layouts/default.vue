<template>
  <div class="main-layout">
    <Navbar class="navbar" />
    <div>
      <child />
    </div>
  </div>
</template>

<script>
import Navbar from '~/components/Navbar'

export default {
  name: 'MainLayout',

  async mounted() {
  },

  components: {
    Navbar,
  }
}
</script>
<style lang="scss" scoped>
@mixin sp {
    @media screen and (max-width: 768px) {
        @content;
    }
}
</style>
