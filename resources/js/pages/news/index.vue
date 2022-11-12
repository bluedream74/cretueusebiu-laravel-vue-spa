<template>
  <div>
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
      if (!!item.url) {
        return item.url
      } else if (!!item.pdf) {
        return item.pdf_url
      } else {
        return item.content
      }
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