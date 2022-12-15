<template>
  <div class="common_page form_page consultation_form">
    <main>
			<section class="section mv_area">
				<h1>送信完了</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'consultant_form' }">事業者相談フォーム</router-link></li>
							<li><span>仮登録完了</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap thanks">
				<section class="section lead">
					<div class="sitewrap">
						<h2 class="h_style01">事業者相談の仮登録が完了しました</h2>
						<div class="texts spacer">
							<p>この度はご利用いただきありがとうございました。<br>
事業者相談の仮登録が完了いたしました。</p>
							<p><b class="red">登録いただいた内容をサイトに掲載するには、事業者様の承認が必要になります。</b><br>
ご入力いただいたメールアドレス宛に、承認用のURLを記載したメールを配信しております。</p>
							<p>メールが届かない場合、【メールアドレスの間違い】や【メール受信設定されていない】または【迷惑メールフォルダ】に入ってしまっている可能性がありますので、ご確認ください。</p>
						</div>
						<div class="common_btn2 backbtn">
							<router-link :to="{ name: 'home' }"><span>TOPへ戻る</span></router-link></li>
						</div>
					</div>
				</section

			></div>
		</main>
  </div>
</template>
<script>
export default {
  created() {
		window.document.title = '事業者相談フォーム 仮登録完了 | 補助金活用.COM'
		$('meta[name=description]').attr('事業者×支援機関マッチングサイト補助金活用.COMの「事業者相談フォーム 仮登録完了」ページです。事業者相談の登録はまだ完了しておりません。ご入力いただいたメールアドレス宛に、承認用のURLを記載したメールを配信しております。')
	},
}
</script>