<template>
  <header id="fix_menu">
    <div class="menu_top block_link fix">
      <div id="site_ttl"><a href="index.html"><img src="/assets/img/common/logo.png" alt="補助金活用.COMのロゴ"></a></div>
      <div class="login_menu"><br>
        <a href="register_form/" class="btn btn_ylw">支援者に<br>新規登録<br>する</a>
        <a href="login/" class="btn">支援機関<br>ログイン</a>
      </div>
      <div class="menu_fix">
        <div class="drop_menu">
          <input type="checkbox" id="switch">
          <label for="switch">
            <p><span></span></p>
            <div></div>
          </label>
          <nav id="NavWrap">
            <div class="login_menu">
              <a href="register_form/" class="btn btn_ylw">支援者に<br>新規登録<br>する</a>
              <a href="login/" class="btn">支援機関<br>ログイン</a>
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
