<template>
  <div class="common_page news_page">
    <main>
			<section class="section mv_area">
				<h1>お知らせ一覧</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>お知らせ一覧</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area">
				<div class="section area01">
					<div class="sitewrap">
						<ul class="topics_list">
							<li v-for="(item, index) in news" :key="index">
								<article><a @click="toDetail(item)">
										<time>{{ item.created_at | dateFormat }}</time>
										<p>{{ calcContent(item) }}</p>
									</a></article>
							</li>
						</ul>
						<!-- pagination -->

            <!-- pagination -->
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
      news: []
    }
  },
  created() {
    window.document.title = 'お知らせ一覧'
    window.document.description = '事業者×支援機関マッチングサイト補助金活用.COMの「お知らせ一覧」ページです。当サイトからの事業者・支援機関様へ向けたお知らせ情報を、掲載日付順にご覧いただけます。お知らせの詳細等についてはリスト内の各リンクをご参照ください。'
  },
  mounted() {
    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/api/get_all_news')
        this.news = data.news
      } catch (error) {
      }
    },
    calcContent(item) {
      return item.title
    },
    toDetail(item) {
      if (!!item.url) {
        window.open(item.url, "_blank");
      } else if (!!item.pdf) {
        window.open(item.pdf_url, "_blank");
      } else {
        this.$router.push({ name: 'news.detail', query: { id: item.id } })
      }
    }
  }
}
</script>