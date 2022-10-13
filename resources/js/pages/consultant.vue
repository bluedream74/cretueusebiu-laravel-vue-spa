<template>
  <div class="common_page my_page">
    <main>
			<section class="section mv_area">
				<h1>相談一覧</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>相談一覧</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area">
				<div class="section area01">
					<div class="sitewrap">
						<ul class="matching_list">
							<li v-for="(item, index) in consultants" :key="index" @click="toConsultantDetail(item.id)">
								<div class="ttl_wrap">
									<h2 class="list_ttl">都道府県：{{ item.prefecture }}</h2>
									<ul>
										<li class="limit">掲載期限：{{ item.expired_at | dateFormat }}</li>
									</ul>
								</div>
								<div class="company_data">
									<dl><dt>業種</dt><dd>{{ JOBS[item.job] }}</dd></dl>
									<dl><dt>年商</dt><dd>{{ PRICES[item.income] }}</dd></dl>
									<dl><dt>従業員規模</dt><dd>{{ AMOUNTS[item.amount] }}</dd></dl>
									<dl><dt>投資予算額</dt><dd>{{ SUPPORT_PRICES[item.price] }}</dd></dl>
									<dl class="overview"><dt>概要</dt><dd>{{ item.message_title }}</dd></dl>
								</div>
							</li>
						</ul>
            <Pagination v-if="temp.length > 0" :total="temp.length" @changeCurrentPage="changeCurrentPage"  />
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
import Pagination from '../components/Pagination.vue'
import { JOBS, PRICES, AMOUNTS, SUPPORT_PRICES } from '../const'
export default {
  components: {
    Pagination
  },
  data() {
    return {
      consultants: [],
      temp: [],
      JOBS: JOBS,
      PRICES: PRICES,
      AMOUNTS: AMOUNTS,
      SUPPORT_PRICES: SUPPORT_PRICES
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    async init() {
      const { data } = await axios.post('/api/get_consultant_list')
      this.temp = data.consultants
      this.consultants = this.temp.filter((item, index) => {
        return index < 10
      })
    },

    changeCurrentPage(page) {
      this.consultants = this.temp.filter((item, index) => {
        return index >= (page - 1) * 10 && index < (page * 10)
      })
    },

		toConsultantDetail(id) {
			this.$router.push({ name: 'consultant_detail', query: { id: id } })
		}
  }
}
</script>
<style lang="scss" scoped>

</style>