<template>
  <div class="common_page form_page contact_form">
    <main>
			<section class="section mv_area">
				<h1>送信完了</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'contact' }">お問い合わせ</router-link></li>
							<li><span>送信完了</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap thanks">
				<section class="section lead">
					<div class="sitewrap">
						<h2 class="h_style01">お問い合わせの送信が完了しました</h2>
						<div class="texts spacer">
							<p>この度はお問い合わせいただきありがとうございました。<br>
お問い合わせを受け付けました。</p>

							<p>お問い合わせ内容を確認後、担当者よりご連絡いたしますので、恐れ入りますが、しばらくお待ちください。</p>

							<p>なお、ご入力いただいたメールアドレス宛に受付完了メールを配信しております。<br>
完了メールが届かない場合、【メールアドレスの間違い】や【メール受信設定されていない】または【迷惑メールフォルダ】に入ってしまっている可能性がありますので、ご確認ください。</p>
						</div>
						<div class="common_btn2 backbtn">
							<router-link :to="{ name: 'home' }" class="blue"><span>TOPへ戻る</span></router-link>
						</div>
					</div>
				</section>

			</div>
		</main>
  </div>
</template>
<script>
export default {
  created() {
    window.document.title = 'お問い合わせ 送信完了 | 補助金活用.COM'
    $('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「お問い合わせ 送信完了」ページです。お問い合わせの送信が完了しました。お問い合わせ内容を確認後、担当者よりご連絡いたしますので、恐れ入りますが、しばらくお待ちください。')
  },
}
</script>