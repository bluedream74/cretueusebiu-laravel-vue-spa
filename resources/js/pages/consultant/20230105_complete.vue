<template>
  <div class="common_page my_page form_page">
    <main>
			<section class="section mv_area">
				<h1>投稿詳細 送信完了</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'mypage' }">支援者マイページ</router-link></li>
							<li><span>投稿詳細 送信完了</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap thanks">
				<section class="section lead">
					<div class="sitewrap">
						<h2 class="h_style01">回答の送信が完了しました</h2>
						<div class="texts spacer text_link">
							<p>事業者相談へのご回答ありがとうございます。入力頂いた内容にて、事業者に相談への回答を送信（応募）しました。</p>
							<p>登録いただいているメールアドレス宛に、完了メールを配信しております。<br>
本機能でのメール送信は初回のみのご利用となります。以降の事業者様との連絡・相談につきましては、完了メール内に記載の連絡先電話番号をご利用ください。<br>
完了メールが届かない場合、【メールアドレスの間違い】や【メール受信設定されていない】または【迷惑メールフォルダ】に入ってしまっている可能性がありますので、ご確認ください。</p>
							<p>なお送信済みの回答内容及び、連絡先電話番号につきましてはマイページ内の「<a href="../../history/">過去の回答</a>」一覧からもご確認いただけます。</p>
						</div>
						<div class="common_btn2 backbtn">
							<router-link :to="{ name: 'mypage' }" class="blue"><span>マイページへ戻る</span></router-link>
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
		window.document.title = '送信完了 | 支援機関マイページ | 補助金活用.COM'
		$('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「投稿詳細 送信完了」ページです。マッチング事業者に、相談への回答を送信（応募）しました。回答内容及び、事業者の連絡先電話番号はマイページ内の「過去の回答」一覧からご確認いただけます。')
		$('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「投稿詳細 送信完了」ページです。マッチング事業者に、相談への回答を送信（応募）しました。回答内容及び、事業者の連絡先電話番号はマイページ内の「過去の回答」一覧からご確認いただけます。')
	}
}
</script>
<style lang="scss" scoped>

</style>