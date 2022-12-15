<template>
  <div class="common_page form_page consultation_form">
    <main>
			<section class="section mv_area">
				<h1>事業者相談フォーム</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>事業者相談フォーム</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<div action="check.html" class="h-adr">
					<span class="p-country-name" style="display:none;">Japan</span>
					<section class="section lead">
						<div class="sitewrap">
							<h2 class="h_style01">事業者として相談をする</h2>
							<p class="lead_style">以下のフォームより登録内容をご入力ください。</p>
							<ul class="txt_indent texts text_link">
								<li>・支援機関新規登録、その他のお問い合わせは専用のフォームからお問い合わせください。</li>
								<li>・赤色の<b class="red">（必須）</b>がついた項目は必須入力項目です。 お忘れのないようご入力ください。</li>
								<li>・ご入力いただいた情報は、<a href="../privacy" target="_blank">プライバシーポリシー</a>に基き厳重に管理いたします。</li>
								<li>・尚、反映までにお時間がかかる場合がございますのでご了承ください。</li>
								<li>※営業時間： 月曜～土曜／9:00～18:00　定休日： 日曜・祝日</li>
							</ul>
						</div>
					</section>
					<section class="section area01">
						<div class="sitewrap">
							<h2 class="h_style01">事業者相談入力欄</h2>
							<div class="table_style">
								<dl class="required">
									<dt>相談内容<i>必須</i></dt>
									<dd><div class="form_el">
										<h3 class="form_inttl">使いたい補助金や制度が決まっている方</h3>
										<div class="labels">
											<label :for="'consultation_1_'+(index+1)" v-for="(item, index) in SYSTEM_CONFIRM" :key="index"><input type="checkbox" :id="'consultation_1_'+(index+1)" :value="index" name="consultation_1" :checked="system_confirms.includes(index)" @change="changeSystemConfirms($event, item, index)"><span>{{ item }}</span></label>
										</div>
										<h3 class="form_inttl">該当の補助金や制度が不明な方</h3>
										<div class="labels">
											<label :for="'consultation_2_'+(index+1)" v-for="(item, index) in SYSTEM_MISS" :key="index"><input type="checkbox" :id="'consultation_2_'+(index+1)" :value="index" name="consultation_2" :checked="system_misss.includes(index)" @change="changeSystemMisss($event, item, index)"><span>{{ item }}</span></label>
										</div>
										<h3 class="form_inttl">その他</h3>
										<div class="labels">
											<label :for="'consultation_3_'+(index+1)" v-for="(item, index) in SYSTEM_OTHER" :key="index"><input type="checkbox" :id="'consultation_3_'+(index+1)" :value="index" name="consultation_3" :checked="system_others.includes(index)" @change="changeSystemOthers($event, item, index)"><span>{{ item }}</span></label>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>会社名<i>必須</i></dt>
									<dd><div class="form_el"><input v-model="com_name" type="text" name="companyName" required placeholder="株式会社AA"></div></dd>
								</dl>
								<dl class="required">
									<dt>業種<i>必須</i></dt>
									<dd><div class="form_el">
										<div class="select_wrap">
											<select name="jobType" v-model="job">
												<option :value="index" v-for="(item, index) in JOBS" :key="index">{{ item }}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>会社所在地<i>必須</i></dt>
									<dd><div class="form_el inline">
										<span>〒</span><input type="text" v-model="zipcode" @change="changeZip" name="zip" class="p-postal-code" size="8" maxlength="8" placeholder="000-0000">
										<div class="select_wrap">
											<select name="pref" class="p-region-id" v-model="prefecture">
												<option :value="null">--</option>
												<option :value="item" v-for="(item, index) in PREFECTURES" :key="index">{{ item }}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>市区町村番地<i>必須</i></dt> 
									<dd><div class="form_el"><input v-model="city" type="text" name="address" required placeholder="〇〇区〇〇〇〇〇〇〇" class="p-locality p-street-address p-extended-address" /></div></dd>
								</dl>
								<dl class="">
									<dt>建物名・部屋番号など</dt>
									<dd><div class="form_el"><input v-model="building" type="text" name="address2" placeholder="〇〇ビル5F" /></div></dd>
								</dl>
								<dl class="required">
									<dt>従業員規模<i>必須</i></dt>
									<dd><div class="form_el"><div class="select_wrap">
										<select name="employee" v-model="amount">
											<option :value="index" v-for="(item, index) in AMOUNTS" :key="index">{{ item }}</option>
										</select>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>年商<i>必須</i></dt>
									<dd><div class="form_el"><div class="select_wrap">
										<select name="yearlySales" v-model="income">
											<option :value="index" v-for="(item, index) in PRICES" :key="index">{{item }}</option>
										</select>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>電話番号<i>必須</i></dt>
									<dd><div class="form_el"><input v-model="telephone" type="tel" name="tel" required placeholder="※桁数は11桁となります。" /></div></dd>
								</dl>
								<dl class="">
									<dt>FAX</dt>
									<dd><div class="form_el"><input v-model="fax" type="tel" name="fax" placeholder="03-0000-0001" /></div></dd>
								</dl>
								<dl class="required">
									<dt>メールアドレス<i>必須</i></dt> 
									<dd><div class="form_el"><input v-model="email" type="email" name="email" required placeholder="aaa@gmail.com" /></div></dd>
								</dl>
								<dl class="required">
									<dt>担当者氏名<i>必須</i></dt>
									<dd><div class="form_el inline"><input v-model="tanto_name" type="text" name="cip" required placeholder="山田 太郎"></div></dd>
								</dl>
								<dl class="">
									<dt>部署名</dt>
									<dd><div class="form_el inline"><input v-model="department_name" type="text" name="department " placeholder="営業部"></div></dd>
								</dl>
								<dl class="">
									<dt>役職名</dt>
									<dd><div class="form_el inline"><input v-model="role_name" type="text" name="job " placeholder="部長"></div></dd>
								</dl>
								<dl class="">
									<dt>投資予定額</dt>
									<dd><div class="form_el">
										<div class="select_wrap">
											<select name="investment" v-model="price">
												<option :value="null">未定</option>
												<option :value="index" v-for="(item, index) in SUPPORT_PRICES" :key="index">{{ item }}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>相談内容概略<i>必須</i></dt> 
									<dd><div class="form_el"><textarea maxlength="100" v-model="message_title" class="limit" required placeholder="設備投資を補助してほしい。金属加工用の大きな機械の導入を検討しているが、補助をうけることはできるのか。"></textarea></div></dd>
								</dl>
								<dl class="required">
									<dt>相談内容詳細<i>必須</i></dt> 
									<dd><div class="form_el"><textarea required v-model="message_content" placeholder="設備投資を補助してほしいが、まずなにからしていいのかがそもそもわからない。また、5000万程の機械の導入を検討しているが、どの程度の補助金が受けられるのか知りたい。"></textarea></div></dd>
								</dl>
								<dl class="required">
									<dt>掲載期限<i>必須</i></dt> 
									<dd><div class="form_el"><input v-model="expired_at" type="date" name="viewingPeriod" required placeholder="2023/03/02" id="viewingPeriod" /></div></dd>
								</dl>
							</div>
						</div>
					</section>
					<div class="section send_area">
						<div class="sitewrap">
							<div class="send_btns">
								<label class="btn_warp next"><span><input @click="toConfirmPage" type="button" value="送信内容を確認"></span></label>
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
var postal_code = require('japan-postal-code')
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

			system_confirms: [],
			system_misss: [],
			system_others: [],
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
		window.document.title = '事業者相談フォーム | 補助金活用.COM'
		window.document.description = '事業者×支援機関マッチングサイト補助金活用.COMの「事業者相談フォーム」ページです。事業者として相談をするする場合、本フォームより「事業者相談入力欄」を入力してください。支援機関新規登録、その他のお問い合わせは専用のフォームからお問い合わせください。'
	},
	mounted() {
		if (localStorage.getItem('com_name')) {
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
			this.system_confirms = localStorage.getItem('system_confirms').split('、').map(item => {
        return parseInt(item)
      })
      this.system_misss = localStorage.getItem('system_confirms').split('、').map(item => {
        return parseInt(item)
      })
      this.system_others = localStorage.getItem('system_confirms').split('、').map(item => {
        return parseInt(item)
      })
		}
	},
	methods: {
		changeSystemConfirms(event, item, index) {
			if (event.target.checked == true) {
				this.system_confirms.push(index)
			} else {
				let temp = this.system_confirms.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.system_confirms = temp
			}
		},
		changeSystemMisss(event, item, index) {
			if (event.target.checked == true) {
				this.system_misss.push(index)
			} else {
				let temp = this.system_misss.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.system_misss = temp
			}
		},
		changeSystemOthers(event, item, index) {
			if (event.target.checked == true) {
				this.system_others.push(index)
			} else {
				let temp = this.system_others.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.system_others = temp
			}
		},
		async changeZip() {
			if (!this.zipcode || this.zipcode.length != 7) {
        this.$swal('', '郵便番号の形式が違います')
        return
      }

      let self = this
      postal_code.get(this.zipcode, function(address) {
        self.prefecture = address.prefecture
        self.city = address.city + address.area
      })
		},
		toConfirmPage() {
			// validation
			if (this.system_confirms.length + this.system_misss.length + this.system_others.length == 0) {
				this.$swal('', '相談内容を選択してください')
				return
			}

			if (!this.com_name) {
				this.$swal('', '会社名を入力してください')
				return
			}

			if (this.job == null) {
				this.$swal('', '業種を選択してください')
				return
			}

			if (!this.zipcode) {
				this.$swal('', '郵便番号を入力してください')
				return
			}

			if (this.prefecture == null) {
				this.$swal('', '都道府県を選択してください')
				return
			}

			if (!this.city) {
				this.$swal('', '市区町村番地を入力してください')
				return
			}

			if (this.amount == null) {
				this.$swal('', '従業員規模を選択してください')
				return
			}

			if (this.income == null) {
				this.$swal('', '年商を選択してください')
				return
			}

			if (!this.telephone) {
				this.$swal('', '電話番号を入力してください')
				return
			}

			if (!this.email) {
				this.$swal('', 'メールアドレスを入力してください')
				return
			}

			if (!this.tanto_name) {
				this.$swal('', '担当者氏名を入力してください')
				return
			}

			if (!this.message_title) {
				this.$swal('', '相談内容概略を入力してください')
				return
			}

			if (!this.message_content) {
				this.$swal('', '相談内容詳細を入力してください')
				return
			}

			if (!this.expired_at) {
				this.$swal('', '掲載期限を設定してください')
				return
			}

			localStorage.setItem('system_confirms', this.system_confirms.join('、'))
			localStorage.setItem('system_misss', this.system_misss.join('、'))
			localStorage.setItem('system_others', this.system_others.join('、'))
			localStorage.setItem('com_name', this.com_name)
			localStorage.setItem('job', this.job)
			localStorage.setItem('zipcode', this.zipcode)
			localStorage.setItem('prefecture', this.prefecture)
			localStorage.setItem('city', this.city)
			localStorage.setItem('building', this.building)
			localStorage.setItem('amount', this.amount)
			localStorage.setItem('income', this.income)
			localStorage.setItem('telephone', this.telephone)
			localStorage.setItem('fax', this.fax)
			localStorage.setItem('email', this.email)
			localStorage.setItem('tanto_name', this.tanto_name)
			localStorage.setItem('department_name', this.department_name)
			localStorage.setItem('role_name', this.role_name)
			localStorage.setItem('price', this.price)
			localStorage.setItem('message_title', this.message_title)
			localStorage.setItem('message_content', this.message_content)
			localStorage.setItem('expired_at', moment(this.expired_at).format('YYYY-MM-DD'))

			this.$router.push({ name: 'consultant_form.confirm' })
		}
	}
}
</script>
<style lang="scss" scoped>
</style>