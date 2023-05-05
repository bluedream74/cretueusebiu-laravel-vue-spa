<template>
  <div class="common_page form_page consultation_form">
    <main>
			<section class="section mv_area">
				<h1>事業者相談フォーム内容確認</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>事業者相談フォーム</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap check">
				<div action="thanks.html">
					<section class="section lead">
						<div class="sitewrap">
							<h2 class="h_style01">事業者相談入力欄内容確認</h2>
							<p class="lead_style">送信内容をご確認の上、送信ボタンを押してください。</p>
							<div class="table_style">
								<dl class="required">
									<dt>相談内容<i>必須</i></dt>
									<dd><div class="form_el">
										<h3 class="form_inttl">使いたい補助金や制度が決まっている方</h3>
										<div class="labels">
{{ system_confirms }}
										</div>
										<h3 class="form_inttl">該当の補助金や制度が不明な方</h3>
										<div class="labels">
{{ system_misss }}
										</div>
										<h3 class="form_inttl">その他</h3>
										<div class="labels">
{{ system_others }}
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>会社名（又は屋号）<i>必須</i></dt>
									<dd><div class="form_el">{{ com_name }}</div></dd>
								</dl>
								<dl class="required">
									<dt>業種<i>必須</i></dt>
									<dd><div class="form_el">{{ JOBS[job] }}</div></dd>
								</dl>
								<dl class="required">
									<dt>会社所在地<i>必須</i></dt>
									<dd><div class="form_el">〒{{ zipcode }}　{{ prefecture }}</div></dd>
								</dl>
								<dl class="required">
									<dt>市区町村番地<i>必須</i></dt> 
									<dd><div class="form_el">{{ city }}</div></dd>
								</dl>
								<dl class="">
									<dt>建物名・部屋番号など</dt>
									<dd><div class="form_el">{{ building }}</div></dd>
								</dl>
								<dl class="required">
									<dt>従業員規模<i>必須</i></dt>
									<dd><div class="form_el">{{ AMOUNTS[amount] }}</div></dd>
								</dl>
								<dl class="required">
									<dt>年商<i>必須</i></dt>
									<dd><div class="form_el">{{ PRICES[income] }}</div></dd>
								</dl>
								<dl class="required">
									<dt>電話番号<i>必須</i></dt>
									<dd><div class="form_el">{{ telephone }}</div></dd>
								</dl>
								<dl class="">
									<dt>FAX</dt>
									<dd><div class="form_el">{{ fax }}</div></dd>
								</dl>
								<dl class="required">
									<dt>メールアドレス<i>必須</i></dt> 
									<dd><div class="form_el">{{ email }}</div></dd>
								</dl>
								<dl class="required">
									<dt>担当者氏名<i>必須</i></dt>
									<dd><div class="form_el">{{ tanto_name }}</div></dd>
								</dl>
								<dl class="">
									<dt>部署名</dt>
									<dd><div class="form_el">{{ department_name }}</div></dd>
								</dl>
								<dl class="">
									<dt>役職名</dt>
									<dd><div class="form_el">{{ role_name }}</div></dd>
								</dl>
								<dl class="">
									<dt>投資予定額</dt>
									<dd><div class="form_el">{{ SUPPORT_PRICES[price] }}</div></dd>
								</dl>
								<dl class="required">
									<dt>相談内容概略<i>必須</i></dt> 
									<dd><div class="form_el">{{ message_title }}</div></dd>
								</dl>
								<dl class="required">
									<dt>相談内容詳細<i>必須</i></dt> 
									<dd><div class="form_el">{{ message_content }}</div></dd>
								</dl>
								<dl class="required">
									<dt>掲載期限<i>必須</i></dt> 
									<dd><div class="form_el">{{ expired_at }}</div></dd>
								</dl>
							</div>
						</div>
					</section>
					<div class="section send_area">
						<div class="sitewrap">
							<div class="send_btns">
								<label class="btn_warp next"><span><input type="button" value="この内容で送信" @click="sendContent"></span></label>
								<label class="btn_warp prev"><span><input type="button" value="内容を変更する" @click="backProc"></span></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
import moment from 'moment'
import { JOBS, SYSTEM_OTHER, SYSTEM_MISS, SYSTEM_CONFIRM, AMOUNTS, PRICES, PREFECTURES, SUPPORT_PRICES } from '../../const'
export default {
  data() {
    return {
      JOBS: JOBS,
			SYSTEM_OTHER: SYSTEM_OTHER,
			SYSTEM_MISS: SYSTEM_MISS,
			SYSTEM_CONFIRM: SYSTEM_CONFIRM,
			AMOUNTS: AMOUNTS,
			PRICES: PRICES,
			PREFECTURES: PREFECTURES,
			SUPPORT_PRICES: SUPPORT_PRICES,

			system_confirms: '',
			system_misss: '',
			system_others: '',
      system_confirms1: [],
      system_misss1: [],
			system_others1: [],
			com_name: null,
			job: null,
			zipcode: null,
			prefecture: null,
			city: null,
			building: null,
			amount: null,
			income: null,
			telephone: null,
			fax: null,
			email: null,
			tanto_name: null,
			department_name: null,
			role_name: null,
			price: null,
			message_title: null,
			message_content: null,
			expired_at: null
    }
  },
	created() {
		window.document.title = '事業者相談フォーム'
		$('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「支援機関新規登録」ページです。支援機関を新規登録する場合、本フォームより「認定支援機関情報入力欄」「支援可能条件入力欄」を入力してください。事業者相談、その他のお問い合わせは専用のフォームからお問い合わせください。')
		$('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「支援機関新規登録」ページです。支援機関を新規登録する場合、本フォームより「認定支援機関情報入力欄」「支援可能条件入力欄」を入力してください。事業者相談、その他のお問い合わせは専用のフォームからお問い合わせください。')
	},
  mounted() {
    this.init()
  },
  methods: {
    clearFormData() {
      localStorage.removeItem('com_name')
      localStorage.removeItem('job')
      localStorage.removeItem('zipcode')
      localStorage.removeItem('prefecture')
      localStorage.removeItem('city')
      localStorage.removeItem('building')
      localStorage.removeItem('amount')
      localStorage.removeItem('income')
      localStorage.removeItem('telephone')
      localStorage.removeItem('fax')
      localStorage.removeItem('email')
      localStorage.removeItem('tanto_name')
      localStorage.removeItem('department_name')
      localStorage.removeItem('role_name')
      localStorage.removeItem('price')
      localStorage.removeItem('message_title')
      localStorage.removeItem('message_content')
      localStorage.removeItem('expired_at')
      localStorage.removeItem('system_confirms')
      localStorage.removeItem('system_misss')
      localStorage.removeItem('system_others')
    },
    init() {
      this.com_name = localStorage.getItem('com_name')
      this.job = parseInt(localStorage.getItem('job'))
      this.zipcode = localStorage.getItem('zipcode')
      this.prefecture = localStorage.getItem('prefecture')
      this.city = localStorage.getItem('city')
      this.building = localStorage.getItem('building') == 'null' ? null : localStorage.getItem('building')
      this.amount = parseInt(localStorage.getItem('amount'))
      this.income = parseInt(localStorage.getItem('income'))
      this.telephone = localStorage.getItem('telephone')
      this.fax = localStorage.getItem('fax') == 'null' ? null : localStorage.getItem('fax')
      this.email = localStorage.getItem('email')
      this.tanto_name = localStorage.getItem('tanto_name')
      this.department_name = localStorage.getItem('department_name') == 'null' ? null : localStorage.getItem('department_name')
      this.role_name = localStorage.getItem('role_name') == 'null' ? null : localStorage.getItem('role_name')
      this.price = parseInt(localStorage.getItem('price'))
      this.message_title = localStorage.getItem('message_title')
      this.message_content = localStorage.getItem('message_content')
      this.expired_at = localStorage.getItem('expired_at')
      if (localStorage.getItem('system_confirms')) {
        this.system_confirms = localStorage.getItem('system_confirms').split('、').map(item => {
          return SYSTEM_CONFIRM[parseInt(item)]
        }).join('、')
        this.system_confirms1 = localStorage.getItem('system_confirms').split('、').map(item => {
          return parseInt(item)
        })
      }
      if (localStorage.getItem('system_misss')) {
        this.system_misss = localStorage.getItem('system_misss').split('、').map(item => {
          return SYSTEM_MISS[parseInt(item)]
        }).join('、')
        this.system_misss1 = localStorage.getItem('system_misss').split('、').map(item => {
          return parseInt(item)
        })
      }
      if (!!localStorage.getItem('system_others')) {
        this.system_others = localStorage.getItem('system_others').split('、').map(item => {
          return SYSTEM_OTHER[parseInt(item)]
        }).join('、')
        this.system_others1 = localStorage.getItem('system_others').split('、').map(item => {
          return parseInt(item)
        })
      }
    },

    backProc() {
      this.$router.back()
    },

    async sendContent() {
      try {
        const { data } = await axios.post('/api/send_consultant_content', {
          com_name: this.com_name,
          job: this.job,
          zipcode: this.zipcode,
          prefecture: this.prefecture,
          city: this.city,
          building: this.building == 'null' ? null : this.building,
          amount: this.amount,
          income: this.income,
          telephone: this.telephone,
          fax: this.fax == 'null' ? null : this.fax,
          email: this.email,
          tanto_name: this.tanto_name,
          department_name: this.department_name == 'null' ? null : this.department_name,
          role_name: this.role_name == 'null' ? null : this.role_name,
          price: this.price,
          message_title: this.message_title,
          message_content: this.message_content,
          expired_at: moment(this.expired_at, 'YYYY-MM-DD').format('YYYY/MM/DD HH:mm:ss'),
          system_confirms: this.system_confirms1,
          system_misss: this.system_misss1,
          system_others: this.system_others1
        })
        
        this.clearFormData()
        this.$router.push({ name: 'consultant_form.thanks' })
      } catch (error) {
      }
    },
  }
}
</script>
<style lang="scss" scoped>

</style>