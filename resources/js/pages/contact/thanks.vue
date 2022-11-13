<template>
  <div>
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
							<li><router-link :to="{ name: 'home' }" class="blue"><span>TOPへ戻る</span></router-link></li>
						</div>
					</div>
				</section>

			</div>
		</main>
  </div>
</template>
<script>
export default {
  
}
</script>