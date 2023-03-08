<template>
  <div class="common_page news_page">
    <main>
			<section class="section mv_area">
				<h1>お知らせ詳細</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'news' }">お知らせ一覧</router-link></li>
							<li><span>{{ news.title }}</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area">
				<div class="section area01">
					<div class="sitewrap" v-if="!!news">
						<div class="article_wrap">
							<div class="article_ttl">
								<time>{{ news.created_at | dateFormat }}</time>
								<h2>{{ news.title }}</h2>
							</div>
							<div class="article_body edit_wrap" v-html="news.content"></div>
						</div>
						<div class="common_btn2 backbtn">
							<router-link :to="{ name: 'news' }" class="blue"><span>一覧へ戻る</span></router-link>
						</div>
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
export default {
  data() {
    return {
      news: null
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/api/get_news_detail', {
          id: this.$route.query.id
        })
        this.news = data.news
				window.document.title = 'お知らせ詳細'+ this.news.title +' | お知らせ一覧 | 補助金活用.COM'
    		$('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMのお知らせ'+ this.news.title +'ページです。当サイトからの事業者・支援機関様へ向けたお知らせの詳細情報を掲載しています。その他のお知らせについてはお知らせ一覧ページよりご確認ください。')
				$('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMのお知らせ'+ this.news.title +'ページです。当サイトからの事業者・支援機関様へ向けたお知らせの詳細情報を掲載しています。その他のお知らせについてはお知らせ一覧ページよりご確認ください。')
      } catch (error) {
      }
    }
  }
}
</script>