<template>
  <div class="common_page my_page form_page">
    <main>
			<section class="section mv_area">
				<h1>投稿詳細 回答確認</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><a href="../../../">TOP</a></li>
							<li><a href="../">支援者マイページ</a></li>
							<li><span>投稿詳細</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap check">
				<div>
					<section class="section lead">
						<div class="sitewrap" v-if="!!consultant">
							<h2 class="h_style01">投稿詳細 回答確認</h2>
							<p class="lead_style">支援者として回答を送信（応募）します。内容をご確認の上、送信ボタンを押してください。</p>
							<div class="matching_list consultation_detail">
								<div class="ttl_wrap">
									<h2 class="list_ttl">{{ consultant.com_name }}</h2>
									<ul>
										<li class="limit">掲載期限：{{ consultant.expired_at | dateFormat }}</li>
									</ul>
								</div>
								<div class="company_data">
									<dl><dt>業種</dt><dd>{{ JOBS[consultant.job] }}</dd></dl>
									<dl><dt>会社所在地</dt><dd>〒{{ consultant.zipcode }}　{{ consultant.prefecture }}　{{ consultant.city }} {{ consultant.building }}</dd></dl>
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
									<dl><dt>相談内容詳細</dt><dd>{{ consultant.message_content }}</dd></dl>
									<dl class="consultation_answer"><dt>回答入力</dt><dd>
										<div class="form_el">{{ answer }}</div>
									</dd></dl>
								</div>
							</div>
						</div>
					</section>
					<div class="section send_area">
						<div class="sitewrap">
							<div class="send_btns">
								<label class="btn_warp next"><span><input @click="toSendAnswer" type="button" value="この内容で送信"></span></label>
								<label class="btn_warp prev"><span><input @click="backProc" type="button" value="内容を変更する"></span></label>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</main>
  </div>
</template>
<script>
import { JOBS, PRICES, AMOUNTS, SUPPORT_PRICES, SYSTEM_CONFIRM, SYSTEM_MISS, SYSTEM_OTHER } from '../../const'
export default {
  middleware: 'auth',
  data() {
    return {
      JOBS: JOBS,
      PRICES: PRICES,
      AMOUNTS: AMOUNTS,
      SUPPORT_PRICES: SUPPORT_PRICES,
      consultant: null,
      SYSTEM_CONFIRM: SYSTEM_CONFIRM,
      SYSTEM_MISS: SYSTEM_MISS,
      SYSTEM_OTHER: SYSTEM_OTHER,

      answer: '',
    }
  },
  mounted() {
    this.init()
  },
  created() {
		window.document.title = '投稿詳細 | 支援者マイページ'
		window.document.description = '事業者×支援機関マッチングサイト補助金活用.COMの「投稿詳細」ページです。事業者相談フォームより投稿された事業者の、企業情報および相談内容の詳細をご確認いただけます。掲載期間中の投稿については支援者として回答を送信（応募）することができます。'
	},
  methods: {
    async init() {
      this.answer = localStorage.getItem('answer')
      try {
        const { data } = await axios.post('/api/get_consultant_detail', {
          id: this.$route.query.id
        })
        this.consultant = data.consultant
      } catch (error) {
      }
    },
    backProc() {
      this.$router.back()
    },
    async toSendAnswer() {
      if (this.$store.getters['auth/user']) {
        if (this.answer == '') {
          this.$swal('', '回答入力してください')
          return
        }

        localStorage.setItem('answer', this.answer)
        this.$router.push({ name: 'consultant_answer_confirm', query: { id: this.$route.query.id } })
        try {
          const { data } = await axios.post('/api/send_consultant_answer', {
            answer: this.answer,
            user_id: this.$store.getters['auth/user'].id,
            id: this.$route.query.id
          })
          localStorage.removeItem('answer')
          this.$router.push({ name: 'consultant_answer_complete' })
        } catch (error) {
        }
      } else {
        this.$swal('', 'まずはログインしてください')
        this.$router.push({ name: 'login' })
      }
    }
  }
}
</script>
<style lang="scss" scoped>

</style>