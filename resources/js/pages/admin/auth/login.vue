<template>
  <div class="login">
    <div class="sitewrap">
      <div class="login_wrap">
        <h1 class="tit"><img src="img/logo_top.png" alt="補助金支援.COMのロゴ"></h1>
        <form class="login_form" @submit.prevent="loginProc">
          <dl>
            <dt>ID</dt>
            <dd><input type="text" v-model="id"></dd>
          </dl>
          <dl>
            <dt>PW</dt>
            <dd><input type="text" v-model="password"></dd>
          </dl>
          <div class="form_btn_blue ico_login"><span><input type="submit" value="ログイン"></span></div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  layout: 'admin_guest',
  middleware: 'guest',
  data() {
    return {
      id: null,
      password: null
    }
  },
  methods: {
    async loginProc() {
      // validation
      if (!this.id) {
        this.$swal('', 'IDを入力してください')
        return
      }

      if (!this.password) {
        this.$swal('', 'パスワードを入力してください')
        return
      }

      try {
        const { data } = await axios.post('/api/admin_login', {
          email: this.id,
          password: this.password
        })
        this.$store.dispatch('admin_auth/saveToken', {
          token: data.token,
          remember: true
        })
        await this.$store.dispatch('admin_auth/fetchUser')
        this.$router.push({ name: 'admin.dashboard' })
      } catch (error) {
        if (error.response.data.error == 'Already authenticated.') {
          console.clear();
          await this.$store.dispatch('admin_auth/fetchUser')
          this.$router.push({ name: 'admin.dashboard' })
        } else {
          this.error = 'ログインに失敗しました。'
          this.$swal('', 'メールアドレスまたはパスワードに誤りがあります。')
        }
      }
    }
  }
}
</script>