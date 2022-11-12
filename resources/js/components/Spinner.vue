<template>
  <div class="spinner_container">
    <pulse-loader :color="'#f09415'"></pulse-loader>
  </div>
</template>
<script>
import PulseLoader from 'vue-spinner/src/PulseLoader.vue'
export default {
  components: {
    PulseLoader
  },
}
</script>
<style lang="scss" scoped>
.spinner_container {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  z-index: 10000;
  background-color: rgba($color: #000, $alpha: 0.6);
  display: flex;
  align-items: center;
  justify-content: center;
}

</style>