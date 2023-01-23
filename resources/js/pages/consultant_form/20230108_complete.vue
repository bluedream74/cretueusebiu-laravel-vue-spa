<template>
  <div class="common_page form_page consultation_form">
    <main v-if="flag">
			<section class="section mv_area">
				<h1>登録完了</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'consultant_form' }">事業者相談フォーム</router-link></li>
							<li><span>登録完了</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap thanks">
				<section class="section lead">
					<div class="sitewrap">
						<h2 class="h_style01">事業者相談内容の登録が完了しました</h2>
						<div class="texts spacer">
							<p>承認が完了し、事業者相談の掲載を受け付けました。</p>

							<p>完了より6時間後に送信いただいた相談内容が本サイト上に掲載されます。<br>掲載された相談内容は、ご登録いただいた掲載期限までの間、支援機関と登録条件によって随時マッチングされます。</p>
						</div>
						<div class="common_btn2 backbtn">
							<router-link :to="{ name: 'home' }" class="blue"><span>TOPへ戻る</span></router-link>
						</div>
					</div>
				</section></div>
		</main>
  </div>
</template>
<script>
export default {
  created() {
		window.document.title = '事業者相談フォーム 登録完了 | 補助金活用.COM'
		$('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「事業者相談フォーム 登録完了」ページです。事業者相談の登録が完了しました。完了より6時間後に、送信いただいた相談内容が掲載されます。掲載された相談内容は随時支援機関とマッチングされます。')
		$('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「事業者相談フォーム 登録完了」ページです。事業者相談の登録が完了しました。完了より6時間後に、送信いただいた相談内容が掲載されます。掲載された相談内容は随時支援機関とマッチングされます。')
	},
	data() {
		return {
			flag: false
		}
	},
	async mounted() {
		try {
			const { data } = await axios.post('/api/accept_consultant', {
				id: this.$route.query.id
			})
			if (data.flag) {
				this.flag = true
			}
		} catch (error) {
		}
	}
}
</script>
<style lang="scss" scoped>

</style>