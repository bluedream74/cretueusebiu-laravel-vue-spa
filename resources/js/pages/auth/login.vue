<template>
  <div class="common_page form_page login_form">
    <main>
			<section class="section mv_area">
				<h1>支援機関ログイン</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>支援機関ログイン</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<div>
					<div class="section login_area">
						<div class="sitewrap">
							<div class="center_form">
								<div class="form_el"><input type="email" v-model="email" required placeholder="メールアドレス"></div>
								<div class="form_el"><input type="password" v-model="password" required placeholder="パスワード"></div>
								<p class="text_link"><router-link :to="{ name: 'forget' }">パスワードを忘れた方はこちら</router-link></p>
								<div class="send_btns">
									<label class="btn_warp next"><span><input type="button" @click="loginProc" value="ログイン"></span></label>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section area01">
					<div class="sitewrap">
						<h2 class="h_style02"><span>会員登録をしていない方はこちら</span></h2>
						<div class="common_btn2 arrow">
							<router-link :to="{ name: 'register' }"><span>新規登録</span></router-link>
						</div>
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
export default {
  layout: 'default',
  middleware: 'guest',
  data() {
    return {
      email: '',
      password: ''
    }
  },
  mounted() {
  },
  methods: {
    // validation
    async loginProc() {
      if (this.email == '') {
        this.$swal('', 'メールアドレスを入力してください')
        return
      }
      if (this.password == '') {
        this.$swal('', 'パスワードを入力してください')
        return
      }
      try {
        const { data } = await axios.post('/api/login', {
          email: this.email,
          password: this.password
        })
        this.$store.dispatch('auth/saveToken', {
          token: data.token,
          remember: true
        })
        await this.$store.dispatch('auth/fetchUser')
        this.$router.push({ name: 'home' })
        this.$swal('', 'ログインできました')
      } catch (error) {
      }
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

.common_page {
  padding-bottom: 30px;
}
</style>