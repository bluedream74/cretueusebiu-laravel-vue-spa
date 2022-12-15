<template>
  <div>
    <main class="common_page my_page">
			<section class="section mv_area">
				<h1>パスワード再設定</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'mypage' }">支援者マイページ</router-link></li>
							<li><span>パスワード再設定</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<div action="complete.html">
					<div class="section login_area">
						<div class="sitewrap">
							<div class="center_form">
								<div class="form_el"><input type="password" v-model="password" required placeholder="新規パスワード"></div>
								<div class="form_el"><input type="password" v-model="confirm_password" required placeholder="新規パスワード(確認用)"></div>
									<div class="send_btns">
									<label class="btn_warp next"><span><input @click="changePassword" type="button" value="確定"></span></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
export default {
  middleware: 'auth',
  data() {
    return {
      password: '',
      confirm_password: ''
    }
  },
  created() {
    window.document.title = 'パスワード再設定 | 支援機関マイページ | 補助金活用.COM'
    $('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「パスワードの再設定」ページです。支援機関登録済みの方がマイページへログインするためのパスワードを、入力した新規パスワードに変更します。新規パスワードは確認のため2回入力してください。')
  },
  methods: {
    async changePassword() {
      // validation
      if (this.password == '') {
        this.$swal('', '新規パスワードを入力してください')
        return
      }

      if (this.password.length < 8) {
        this.$swal('', 'パスワードは８文字以上で入力してください')
        return
      }

      if(this.password != this.confirm_password) {
        this.$swal('', '確認用パスワードと一致しません。')
        return
      }

      try {
        const { data } = await axios.post('/api/update_password', {
          password: this.password
        })
        await this.$store.dispatch('auth/fetchUser')
      } catch (error) {
      }
    }
  }
}
</script>