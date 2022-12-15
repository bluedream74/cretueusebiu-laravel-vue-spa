<template>
  <div class="common_page my_page form_page">
    <main>
			<section class="section mv_area">
				<h1>投稿詳細</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'mypage' }">支援者マイページ</router-link></li>
							<li><router-link :to="{ name: 'history' }">過去の回答一覧</router-link></li>
							<li><span>投稿詳細</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<section class="section lead">
					<div class="sitewrap" v-if="!!consultant">
						<div class="matching_list consultation_detail">
							<div class="ttl_wrap">
								<h2 class="list_ttl">{{ consultant.com_name }}</h2>
								<ul>
									<li class="answer">回答日：{{ !!calcAnswer() ? calcAnswer().created_at : null | dateFormat }}</li>
									<li class="limit">掲載期限：{{ consultant.expired_at | dateFormat }}</li>
								</ul>
							</div>
							<div class="company_data">
								<dl><dt>業種</dt><dd>{{ JOBS[consultant.job] }}</dd></dl>
								<dl><dt>会社所在地</dt><dd>〒{{ consultant.zipcode }} {{ consultant.prefecture }}　{{ consultant.city }}　{{ consultant.building }}</dd></dl>
								<dl><dt>従業員規模</dt><dd>{{ AMOUNTS[consultant.amount] }}</dd></dl>
								<dl><dt>年商</dt><dd>{{ PRICES[consultant.income] }}</dd></dl>
								<dl><dt>担当者氏名</dt><dd>{{ consultant.tanto_name }}</dd></dl>
								<dl><dt>部署名</dt><dd>{{ consultant.department_name }}</dd></dl>
								<dl><dt>役職</dt><dd>{{ consultant.role_name }}</dd></dl>
								<dl><dt>投資予算額</dt><dd>{{ SUPPORT_PRICES[consultant.price] }}</dd></dl>
								<dl><dt>相談内容（選択）</dt><dd>
									<ul class="consultation_type">
                    <li v-for="(item, index) in consultant.confirms" :key="index + '_confirm'">{{ SYSTEM_CONFIRM[item.confirm_id] }}</li>
                    <li v-for="(item, index) in consultant.misss" :key="index + '_miss'">{{ SYSTEM_MISS[item.miss_id] }}</li>
                    <li v-for="(item, index) in consultant.others" :key="index + '_other'">{{ SYSTEM_OTHER[item.other_id] }}</li>
									</ul>
								</dd></dl>
								<dl><dt>相談内容概略</dt><dd>{{ consultant.message_title }}</dd></dl>
								<dl><dt>相談内容詳細</dt><dd>{{ consultant.message_description }}</dd></dl>
								<dl><dt>回答</dt><dd>
									<div class="form_el">{{ !!calcAnswer() ? calcAnswer().answer : '' }}</div>
								</dd></dl>
							</div>
						</div>
						<div class="common_btn2 backbtn">
							<router-link :to="{ name: 'history' }"><span>一覧へ戻る</span></router-link>
						</div>
					</div>
				</section>
			</div>
		</main>
  </div>
</template>
<script>
import { JOBS, PRICES, AMOUNTS, SUPPORT_PRICES, SYSTEM_CONFIRM, SYSTEM_MISS, SYSTEM_OTHER } from '../../../const'
export default {
  middleware: 'auth',
  data() {
    return {
      consultant: null,
      JOBS: JOBS,
      PRICES: PRICES,
      AMOUNTS: AMOUNTS,
      SUPPORT_PRICES: SUPPORT_PRICES,
      SYSTEM_CONFIRM: SYSTEM_CONFIRM,
      SYSTEM_MISS: SYSTEM_MISS,
      SYSTEM_OTHER: SYSTEM_OTHER
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/api/get_history_detail', {
          id: this.$route.query.id
        })
        this.consultant = data.consultant
				window.document.title = `${this.consultant.com_name} | 過去の回答一覧 | 支援機関マイページ | 補助金活用.COM`
    		$('meta[name=description]').attr('事業者×支援機関マッチングサイト補助金活用.COMの過去の回答「投稿詳細」ページです。過去に支援機関様が閲覧・回答を行った事業者の相談投稿の詳細をご確認いただけます。事業者の電話番号および、支援機関様の回答内容につてもこのページからご確認いただけます。')
      } catch (error) {
      }
    },
    calcAnswer() {
      let answer = this.consultant.answers.find(item => {
        return item.user_id == this.$store.getters['auth/user'].id
      })
      return answer
    }
  }
}
</script>