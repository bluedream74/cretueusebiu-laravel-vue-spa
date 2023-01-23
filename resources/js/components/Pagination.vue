<template>
  <div class="pager_style" v-if="pages > 1">
    <ul>
      <li class="prev" @click="clickPrev"><a>＜</a></li>
      <li v-for="i in pages" :key="i"><a :class="{ active: (current == i) }" @click="clickPage(i)">{{ i }}</a></li>
      <li class="next" @click="clickNext"><a href="#">＞</a></li>
    </ul>
  </div>
</template>
<script>
export default {
  props: ['total'],
  name: 'Pagination',
  data() {
    return {
      pages: 0,
      current: 1
    }
  },
  mounted() {
    this.pages = Math.ceil(this.$props.total / 10)
  },
  methods: {
    clickPrev() {
      if (this.current == 1) {
        return 
      } else {
        this.current = this.current - 1
      }
      this.$emit('changeCurrentPage', this.current)
    },
    clickNext() {
      if (this.current == this.pages) {
        return 
      } else {
        this.current = this.current + 1
      }
      this.$emit('changeCurrentPage', this.current)
    },
    clickPage(i) {
      this.current = i
      this.$emit('changeCurrentPage', this.current)
    }
  }
}
</script>