<template>
  <div class="common_page form_page contact_form">
    <main>
			<section class="section mv_area">
				<h1>お問い合わせ</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>お問い合わせ</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<form @submit.prevent="sendContact">
					<section class="section lead">
						<div class="sitewrap">
							<h2 class="h_style01">お問い合わせ内容入力</h2>
							<p class="lead_style">以下のフォームよりお気軽にお問合せください。 担当者より折り返しご連絡いたします。</p>
							<ul class="txt_indent texts text_link">
								<li>・支援機関の新規登録、事業相談は専用のフォームからお問い合わせください。</li>
								<li>・赤色の<b class="red">（必須）</b>がついた項目は必須入力項目です。 お忘れのないようご入力ください。</li>
								<li>・ご入力いただいた情報は、<a href="../privacy" target="_blank">プライバシーポリシー</a>に基き厳重に管理いたします。</li>
								<li>・尚、反映までにお時間がかかる場合がございますのでご了承ください。</li>
								<li>※営業時間： 月曜～土曜／9:00～18:00　定休日： 日曜・祝日</li>
							</ul>
						</div>
					</section>
					<div class="section area01">
						<div class="sitewrap">
							<div class="table_style">
								<dl class="required">
									<dt>氏名<i>必須</i></dt>
									<dd><div class="form_el inline"><input type="text" name="youreName" required placeholder="山田 太郎" v-model="name"></div></dd>
								</dl>
								<dl class="required">
									<dt>フリガナ<i>必須</i></dt>
									<dd><div class="form_el"><input type="text" name="youreKana" required placeholder="ヤマダ　タロウ" v-model="huri_name"></div></dd>
								</dl>
								<dl class="required">
									<dt>メールアドレス<i>必須</i></dt> 
									<dd><div class="form_el"><input type="email" name="email" required placeholder="aaa@gmail.com" v-model="email"/></div></dd>
								</dl>
								<dl class="required">
									<dt>電話番号<i>必須</i></dt>
									<dd><div class="form_el"><input type="tel" name="tel" required placeholder="※桁数は11桁となります。" v-model="telephone"/></div></dd>
								</dl>
								<dl class="">
									<dt>FAX</dt>
									<dd><div class="form_el"><input type="tel" name="fax" placeholder="03-0000-0001" v-model="fax"/></div></dd>
								</dl>
								<dl class="required">
									<dt>お問合せ内容<i>必須</i></dt> 
									<dd><div class="form_el"><textarea required placeholder="支援機関の新規登録、事業相談は専用フォームからお問い合わせ下さい。" v-model="content"></textarea></div></dd>
								</dl>
							</div>
						</div>
					</div>
					<div class="section send_area">
						<div class="sitewrap">
							<p class="text text_link mb60_h">個人情報の取り扱いについては、<router-link :to="{ name: 'privacy' }">プライバシーポリシー</router-link>をお読みいただき、同意のうえお問い合わせください。</p>
							<div class="send_btns">
								<label class="btn_warp next"><span><input type="submit" value="送信内容を確認"></span></label>
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
	created() {
    window.document.title = 'お問い合わせ | 補助金活用.COM'
    $('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「お問い合わせ」ページです。当サイトについてお気軽にお問合せください。担当者より折り返しご連絡いたします。支援機関の新規登録、事業相談は専用のフォームからお問い合わせください。')
		$('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「お問い合わせ」ページです。当サイトについてお気軽にお問合せください。担当者より折り返しご連絡いたします。支援機関の新規登録、事業相談は専用のフォームからお問い合わせください。')
  },
  methods: {
    async sendContact() {
      if (this.name == '') {
        this.$swal('', '氏名を入力してください')
        return
      }
      if (this.huri_name == '') {
        this.$swal('', 'フリガナを入力してください')
        return
      }
      if (this.email == '') {
        this.$swal('', 'メールアドレスを入力してください')
        return
      }
      if (this.telephone == '') {
        this.$swal('', '電話番号を入力してください')
        return
      }
      if (this.content == '') {
        this.$swal('', 'お問合せ内容を入力してください')
        return
      }

      localStorage.setItem('name', this.name)
      localStorage.setItem('huri_name', this.huri_name)
      localStorage.setItem('email', this.email)
      localStorage.setItem('telephone', this.telephone)
      localStorage.setItem('content', this.content)
      localStorage.setItem('fax', this.fax)
      this.$router.push({ name: 'contact.check' })
    } 
  }
}
</script>