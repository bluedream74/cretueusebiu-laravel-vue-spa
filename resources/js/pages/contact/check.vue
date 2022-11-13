<template>
  <div>
    <main>
			<section class="section mv_area">
				<h1>お問い合わせ内容確認</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>お問い合わせ</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap check">
				<form @submit.prevent="sendContact">
					<section class="section lead">
						<div class="sitewrap">
							<h2 class="h_style01">お問い合わせ内容確認</h2>
							<p class="lead_style">送信内容をご確認の上、送信ボタンを押してください。</p>
							<div class="table_style">
								<dl class="required">
									<dt>氏名<i>必須</i></dt>
									<dd><div class="form_el">{{ name }}</div></dd>
								</dl>
								<dl class="required">
									<dt>フリガナ<i>必須</i></dt>
									<dd><div class="form_el">{{ huri_name }}</div></dd>
								</dl>
								<dl class="required">
									<dt>メールアドレス<i>必須</i></dt> 
									<dd><div class="form_el">{{ email }}</div></dd>
								</dl>
								<dl class="required">
									<dt>電話番号<i>必須</i></dt>
									<dd><div class="form_el">{{ telephone }}</div></dd>
								</dl>
								<dl class="">
									<dt>FAX</dt>
									<dd><div class="form_el">{{ fax }}</div></dd>
								</dl>
								<dl class="required">
									<dt>お問合せ内容</dt> 
									<dd><div class="form_el">{{ content }}</div></dd>
								</dl>
							</div>
						</div>
					</section>
					<div class="section send_area">
						<div class="sitewrap">
							<div class="send_btns">
								<label class="btn_warp next"><span><input type="submit" value="この内容で送信"></span></label>
								<label class="btn_warp prev"><span><input type="button" value="内容を変更する" @click="backProc"></span></label>
							</div>
						</div>
					</div>
				</form>
			</div>
		</main>
  </div>
</template>
<script>
export default {
  data() {
    return {
      name: '',
      huri_name: '',
      email: '',
      telephone: '',
      fax: '',
      content: ''
    }
  },
  mounted() {
    this.name = localStorage.getItem('name')
    this.huri_name = localStorage.getItem('huri_name')
    this.email = localStorage.getItem('email')
    this.telephone = localStorage.getItem('telephone')
    this.fax = localStorage.getItem('fax')
    this.content = localStorage.getItem('content')
  },
  methods: {
    backProc() {
      this.$router.back()
    },
    async sendContact() {
      try {
        const { data } = await axios.post('/api/send_contact', {
          name: this.name,
          huri_name: this.huri_name,
          email: this.email,
          telephone: this.telephone,
          fax: this.fax,
          content: this.content,
        })
        this.$router.push({ name: 'contact.thanks' })
      } catch (error) {
      }
    }
  }
}
</script>