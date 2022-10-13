<template>
  <div class="common_page my_page history_page">
    <main>
			<section class="section mv_area">
				<h1>過去の回答一覧</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><a href="../../">TOP</a></li>
							<li><a href="../">支援者マイページ</a></li>
							<li><span>過去の回答一覧</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area">
				<div class="section area01">
					<div class="sitewrap">
						<ul class="matching_list">
							<li v-for="(item, index) in consultants" :key="index">
								<div class="ttl_wrap">
									<h2 class="list_ttl">{{ item.com_name }}</h2>
									<ul>
										<li class="answer">回答日：{{ !!calcAnswer(item) ? calcAnswer(item).created_at : null | dateFormat }}</li>
										<li class="limit">掲載期限：{{ item.expired_at | dateFormat }}</li>
									</ul>
								</div>
								<div class="company_data">
									<dl><dt>都道府県</dt><dd>{{ item.prefecture }}</dd></dl>
									<dl><dt>業種</dt><dd>{{ JOBS[item.job] }}</dd></dl>
									<dl><dt>年商</dt><dd>{{ PRICES[item.income] }}</dd></dl>
									<dl><dt>従業員規模</dt><dd>{{ AMOUNTS[item.amount] }}</dd></dl>
									<dl><dt>投資予算額</dt><dd>{{ SUPPORT_PRICES[item.price] }}</dd></dl>
									<dl class="overview"><dt>概要</dt><dd>{{ item.message_title }}</dd></dl>
								</div>
								<div class="common_btn2 arrow">
									<router-link :to="{ name: 'history_detail', query: { id: item.id } }"><span>詳細を見る</span></router-link>
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
import Pagination from '../../../components/Pagination.vue'
import { JOBS, PRICES, AMOUNTS, SUPPORT_PRICES } from '../../../const'
export default {
  components: {
    Pagination
  },
  data() {
    return {
      temp: [],
      consultants: [],
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
      try {
        const { data } = await axios.post('/api/get_history_list')
        this.temp = data.consultants
        this.consultants = this.temp.filter((item, index) => {
        return index < 10
      })
      } catch (error) {
      }
    },

    calcAnswer(consultant) {
      let answer = consultant.answers.find(item => {
        return item.user_id == this.$store.getters['auth/user'].id
      })

      return answer
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