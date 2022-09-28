<template>
  <div class="bottom_tab">
    <router-link :to="{ name: 'search' }">
      <img src="/asset/icons/magnifying-glass-solid.svg" />
      <span>条件で探す</span>
    </router-link>
    <router-link :to="{ name: 'message' }">
      <img src="/asset/icons/comment-solid.svg" />
      <span>メッセージ</span>
      <span class="badge" v-if="isShowBadge()"></span>
    </router-link>
    <router-link :to="{ name: 'mypage' }">
      <img src="/asset/icons/user-gear-solid.svg" />
      <span>マイページ</span>
    </router-link>
  </div>
</template>
<script>    
export default {
  data() {
    return {
      myInterval: null,
      chatrooms: []
    }
  },

  mounted() {
    if (!!this.$store.getters['auth/user']) {
      this.init()
      this.myInterval = setInterval(() => {
        this.init()
      }, 5000)
    }
  },

  beforeDestroy() {
    // clearInterval(this.myInterval)
  },

  methods: {
    async init() {
      try {
        const { data } = await axios.post('/api/get_chatroom_list')
        this.chatrooms = data.chatrooms
      } catch (error) {
        clearInterval(this.myInterval)
      }
    },

    isShowBadge() {
      let flag = false
      this.chatrooms.forEach(chatroom => {
        chatroom.messages.forEach(message => {
          if (!message.read_flags.split('  ').includes(String(this.$store.getters['auth/user'].id))) {
            flag = true
          }
        })
      })
      return flag
    },
  }
}
</script>
<style lang="scss" scoped>
@mixin sp {
    @media screen and (max-width: 768px) {
        @content;
    }
}
.bottom_tab {
  height: 60px;
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
  background-color: #fff;
  z-index: 199;
  box-shadow: 6px 3px 0 rgba($color: #000000, $alpha: 0.16);
  display: none;
  padding-left: 5px;
  padding-right: 5vw;
  
  @include sp {
    display: flex;
  }

  a {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    color: #333;
    position: relative;

    img {
      height: 20px;
      margin-bottom: 2px;
    }

    span {
      font-size: 14px;
    }

    .badge {
      position: absolute;
      width: 3vw;
      height: 3vw;
      border-radius: 1.5vw;
      background-color: #ff0000;
      right: 1vw;
      top: 1vw;
    }
  }
}
</style>