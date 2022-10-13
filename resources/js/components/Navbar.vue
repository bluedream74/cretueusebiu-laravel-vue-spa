<template>
  <header id="fix_menu">
    <div class="menu_top block_link fix">
      <div id="site_ttl"><router-link :to="{ name: 'home' }"><img src="/assets/img/common/logo.png" alt="補助金活用.COMのロゴ"></router-link></div>
      <div class="login_menu" v-if="!$store.getters['auth/user']"><br>
        <router-link :to="{ name: 'register' }" class="btn btn_ylw">支援者に<br>新規登録<br>する</router-link>
        <router-link :to="{ name: 'login' }" class="btn">支援機関<br>ログイン</router-link>
      </div>
      <div class="login_menu" v-else>
					<p class="nam">株式会社　{{ $store.getters['auth/user'].com_name }}様</p>
					<a href="mypage" class="btn btn_ylw">マイページ</a>
					<a @click="logout" class="btn">支援機関<br>ログアウト</a>
				</div>
      <div class="menu_fix">
        <div class="drop_menu">
          <input type="checkbox" id="switch">
          <label for="switch">
            <p><span></span></p>
            <div></div>
          </label>
          <nav id="NavWrap">
            <div class="login_menu" v-if="!!$store.getters['auth/user']">
              <p class="nam">株式会社　{{ $store.getters['auth/user'].com_name }}様</p>
              <router-link :to="{ name: 'mypage' }" class="btn btn_ylw">マイページ</router-link>
              <a href="index_login.html" class="btn">支援機関<br>ログアウト</a>
            </div>
            <div class="login_menu" v-else>
              <router-link :to="{ name: 'register' }" class="btn btn_ylw">支援者に<br>新規登録<br>する</router-link>
              <router-link :to="{ name: 'login' }" href="login/" class="btn">支援機関<br>ログイン</router-link>
            </div>
            <ul>
              <li><a href="about/"><span>会社概要</span></a></li>
              <li><a href="privacy/"><span>プライバシーポリシー</span></a></li>
              <li><a href="contact_form/"><span>お問い合わせ</span></a></li>
              <li><a href="terms/"><span>利用規約</span></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
</template>
<script>

export default {
  components: {
  },

  data: () => ({
  }),

  mounted() {
  },

  beforeDestroy() {
    // clearInterval(this.myInterval)
  },

  methods: {
    async logout() {
      await this.$store.dispatch('auth/logout')
      this.$router.push({ name: 'login' })
    }
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
