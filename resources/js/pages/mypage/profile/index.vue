<template>
  <div class="register__container common_page form_page register_form">
    <main>
			<section class="section mv_area">
				<h1>マイプロフィール</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'mypage' }">支援者マイページ</router-link></li>
							<li><span>マイプロフィール</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<div class="h-adr">
					<span class="p-country-name" style="display:none;">Japan</span>
					<section class="section area01">
						<div class="sitewrap">
							<div class="table_style">
								<dl class="required">
									<dt>認定支援機関ID番号<i>必須</i></dt>
									<dd><div class="form_el"><input type="tel" name="certificationId" v-model="kikan_id" required placeholder="※桁数は12桁となります。"></div></dd>
								</dl>
								<dl class="required">
									<dt>会社名<i>必須</i></dt>
									<dd><div class="form_el"><input type="text" name="companyName" v-model="com_name" required placeholder="株式会社AA"></div></dd>
								</dl>
								<dl class="required">
									<dt>フリガナ<i>必須</i></dt>
									<dd><div class="form_el"><input type="text" name="companyKana" v-model="com_huri_name" required placeholder="カブシキガイシャエーエー"></div></dd>
								</dl>
								<dl class="required">
									<dt>担当者氏名<i>必須</i></dt>
									<dd><div class="form_el inline"><input type="text" name="cip" v-model="tanto_name" required placeholder="山田 太郎"></div></dd>
								</dl>
								<dl class="">
									<dt>部署名</dt>
									<dd><div class="form_el inline"><input type="text" name="department" v-model="department_name" placeholder="営業部"></div></dd>
								</dl>
								<dl class="">
									<dt>役職名</dt>
									<dd><div class="form_el inline"><input type="text" name="job" v-model="role_name" placeholder="部長"></div></dd>
								</dl>
								<dl class="required">
									<dt>法人／個人事業主<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label for="companyType01"><input type="radio" name="companyType" id="companyType01" value="法人" @click="() => {
											is_personal = 0
										}" :checked="is_personal == 0"><span>法人</span></label>
										<label for="companyType02"><input type="radio" name="companyType" id="companyType02" value="個人事業主" @click="() => {
											is_personal = 1
										}" :checked="is_personal == 1"><span>個人事業主</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>種別<i>必須</i></dt>
									<dd><div class="form_el">
										<div class="select_wrap">
											<select v-model="kind">
												<option :value="index" v-for="(item, index) in JOB_KINDS" :key="index">{{item}}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>会社所在地<i>必須</i></dt>
									<dd><div class="form_el inline">
										<span>〒</span><input type="tel" name="zip" v-model="zipcode" class="p-postal-code" size="8" maxlength="8" placeholder="000-0000">
										<div class="select_wrap">
											<select name="pref" class="p-region-id" v-model="prefecture">
												<option :value="null">--</option>
												<option v-for="(item, index) in PREFECTURES" :key="index" :value="item">{{ item }}</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>市区町村番地<i>必須</i></dt> 
									<dd><div class="form_el"><input type="text" name="address" required placeholder="〇〇区〇〇〇〇〇〇〇" class="p-locality p-street-address p-extended-address" v-model="city" /></div></dd>
								</dl>
								<dl class="">
									<dt>建物名・部屋番号など</dt>
									<dd><div class="form_el"><input type="text" name="address2" placeholder="〇〇ビル5F" v-model="building" /></div></dd>
								</dl>
								<dl class="">
									<dt>電話番号</dt>
									<dd><div class="form_el"><input type="tel" name="tel" placeholder="※桁数は11桁となります。" v-model="telephone" /></div></dd>
								</dl>
								<dl class="">
									<dt>FAX</dt>
									<dd><div class="form_el"><input type="tel" name="fax" placeholder="03-0000-0001" v-model="fax" /></div></dd>
								</dl>
								<dl class="required">
									<dt>メールアドレス<i>必須</i></dt> 
									<dd><div class="form_el"><input type="email" name="email" required placeholder="aaa@gmail.com" v-model="email" /></div></dd>
								</dl>
								<dl class="">
									<dt>PRポイント</dt> 
									<dd><div class="form_el"><textarea placeholder="過去に○○件の補助金の申請を受給までサポート。 補助金支援のプロフェッショナルです。 ぜひ私共におまかせください。 Webサイト⇒https://aaaaaaaaaa.co.jp" v-model="introduction"></textarea></div></dd>
								</dl>
							</div>
						</div>
					</section>
					<section class="section area01">
						<div class="sitewrap">
							<h2 class="h_style01">支援可能条件入力欄</h2>
							<p class="lead_style">「支援可能内容」「支援可能業種」「支援可能年商」「支援可能従業員規模」の4項目すべての条件を満たす場合マイページに相談が表示されます。</p>
							<div class="table_style">
								<dl class="required">
									<dt>支援可能内容<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label :for="'conditions_1_'+(index+1)" v-for="(item, index) in CONTENTS" :key="index"><input type="checkbox" :id="'conditions_1_' + (index + 1)" :value="index" name="conditions_1" :checked="available_contents.includes(index)" @change="changeContent($event, item, index)"><span>{{item}}</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能業種<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label :for="'conditions_2_'+(index + 1)" v-for="(item, index) in JOBS" :key="index"><input type="checkbox" :id="'conditions_2_' + (index + 1)" :value="index" name="conditions_2" :checked="available_jobs.includes(index)" @change="changeJob($event, item, index)"><span>{{ item }}</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能年商<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label :for="'conditions_3_'+(index+1)" v-for="(item, index) in PRICES" :key="index"><input type="checkbox" :id="'conditions_3_'+(index+1)" :value="index" name="conditions_3" :checked="available_prices.includes(index)" @change="changePrice($event, item, index)"><span>{{ item }}</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能従業員規模<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label :for="'conditions_4_'+(index+1)" v-for="(item, index) in AMOUNTS" :key="index"><input type="checkbox" :id="'conditions_4_'+(index+1)" :value="index" name="conditions_4" :checked="available_amounts.includes(index)" @change="changeAmount($event, item, index)"><span>{{ item }}</span></label>
									</div></div></dd>
								</dl>
							</div>
						</div>
					</section>
					<div class="section send_area">
						<div class="sitewrap">
							<div class="send_btns">
								<label class="btn_warp next"><span><input @click="confirmContent" type="button" value="送信内容を確認"></span></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
import { JOB_KINDS, CONTENTS, JOBS, PRICES, AMOUNTS, PREFECTURES } from '../../../const';
export default {
  layout: 'default',
  middleware: 'auth',
  components: {
  },
  data() {
    return {
			JOB_KINDS: JOB_KINDS,
			CONTENTS: CONTENTS,
			JOBS: JOBS,
			PRICES: PRICES,
			AMOUNTS: AMOUNTS,
			PREFECTURES,

			kikan_id: null,
			com_name: null,
			com_huri_name: null,
			tanto_name: null,
			department_name: null,
			role_name: null,
			is_personal: 0,
			kind: null,
			zipcode: null,
			prefecture: null,
			city: null,
			building: null,
			telephone: null,
			fax: null,
			email: null,
			password: null,
			introduction: null,
			available_contents: [],
			available_jobs: [],
			available_prices: [],
			available_amounts: []
    }
  },
	created() {
		window.document.title = 'マイプロフィール | 支援機関マイページ | 補助金活用.COM'
		$('meta[name=description]').attr('事業者×支援機関マッチングサイト補助金活用.COMの「マイプロフィール」ページです。認定支援機関の登録情報および、支援可能条件についてはこちらから変更いただけます。必須項目を確認のうえ、フォームに必定な変更内容を入力してください。')
	},
  mounted() {
		// this.clearContent()
		this.init()
  },
  methods: {
		clearContent() {
			localStorage.removeItem('kikan_id')
			localStorage.removeItem('com_name')
			localStorage.removeItem('com_huri_name')
			localStorage.removeItem('tanto_name')
			localStorage.removeItem('department_name')
			localStorage.removeItem('role_name')
			localStorage.removeItem('is_personal')
			localStorage.removeItem('kind')
			localStorage.removeItem('zipcode')
			localStorage.removeItem('prefecture')
			localStorage.removeItem('city')
			localStorage.removeItem('building')
			localStorage.removeItem('telephone')
			localStorage.removeItem('fax')
			localStorage.removeItem('email')
			localStorage.removeItem('password')
			localStorage.removeItem('introduction')
			localStorage.removeItem('available_contents')
			localStorage.removeItem('available_jobs')
			localStorage.removeItem('available_prices')
			localStorage.removeItem('available_amounts')
		},
		async init() {
      try {
        const { data } = await axios.post('/api/get_profile_info')
        this.kikan_id = data.profile.kikan_id
        this.com_name = data.profile.com_name,
        this.com_huri_name = data.profile.com_huri_name
        this.tanto_name = data.profile.tanto_name
        this.department_name = data.profile.department_name
        this.role_name = data.profile.role_name
        this.is_personal = data.profile.is_personal
        this.kind = data.profile.kind
        this.zipcode = data.profile.zipcode
        this.prefecture = data.profile.prefecture
        this.city = data.profile.city
        this.building = data.profile.building
        this.telephone = data.profile.telephone
        this.fax = data.profile.fax
        this.email = data.profile.email
        this.introduction = data.profile.introduction
        this.available_contents = data.profile.available_contents.map(item => {
          return item.content_id
        })
        this.available_jobs = data.profile.available_jobs.map(item => {
          return item.job_id
        })
        this.available_prices = data.profile.available_prices.map(item => {
          return item.price_id
        })
        this.available_amounts = data.profile.available_amounts.map(item => {
          return item.amount_id
        })
      } catch (error) {
      }
		},
		changeContent(event, content, index) {
			if (event.target.checked == true) {
				this.available_contents.push(index)
			} else {
				let temp = this.available_contents.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_contents = temp
			}
		},
		changeJob(event, job, index) {
			if (event.target.checked == true) {
				this.available_jobs.push(index)
			} else {
				let temp = this.available_jobs.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_jobs = temp
			}
		},
		changePrice(event, price, index) {
			if (event.target.checked == true) {
				this.available_prices.push(index)
			} else {
				let temp = this.available_prices.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_prices = temp
			}
		},
		changeAmount(event, amount, index) {
			if (event.target.checked == true) {
				this.available_amounts.push(index)
			} else {
				let temp = this.available_amounts.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_amounts = temp
			}
		},
		confirmContent() {
			// validation
			if (!this.kikan_id) {
				this.$swal('', '認定支援機関ID番号を入力してください')
				return
			}
			if (this.kikan_id.length != 12) {
				this.$swal('', '桁数は12桁となります')
				return
			}

			if (!this.com_name) {
				this.$swal('', '会社名を入力してください')
				return
			}

			if (!this.com_huri_name) {
				this.$swal('', '会社名(フリガナ)を入力してください')
				return
			}

			if (!this.tanto_name) {
				this.$swal('', '担当者氏名を入力してください')
				return
			}

			if (!this.kind) {
				this.$swal('', '種別を選択してください')
				return
			}

			if (!this.zipcode) {
				this.$swal('', '会社所在地の郵便番号を入力してください')
				return
			}

			if (!this.prefecture) {
				this.$swal('', '会社所在地の都道府県を選択してください')
				return
			}

			if (!this.city) {
				this.$swal('', '市区町村番地を入力してください')
				return
			}

			if (!this.email) {
				this.$swal('', 'メールアドレスを入力してください')
				return
			}

			if (this.available_contents.length == 0) {
				this.$swal('', '支援可能内容を設定してください')
				return
			}

			if (this.available_jobs.length == 0) {
				this.$swal('', '支援可能業種を設定してください')
				return
			}

			if (this.available_prices.length == 0) {
				this.$swal('', '支援可能年商を設定してください')
				return
			}

			if (this.available_amounts.length == 0) {
				this.$swal('', '支援可能従業員規模を設定してください')
				return
			}

			localStorage.setItem('kikan_id', this.kikan_id)
			localStorage.setItem('com_name', this.com_name)
			localStorage.setItem('com_huri_name', this.com_huri_name)
			localStorage.setItem('tanto_name', this.tanto_name)
			localStorage.setItem('department_name', this.department_name)
			localStorage.setItem('role_name', this.role_name)
			localStorage.setItem('is_personal', this.is_personal)
			localStorage.setItem('kind', this.kind)
			localStorage.setItem('zipcode', this.zipcode)
			localStorage.setItem('prefecture', this.prefecture)
			localStorage.setItem('city', this.city)
			localStorage.setItem('building', this.building)
			localStorage.setItem('telephone', this.telephone)
			localStorage.setItem('fax', this.fax)
			localStorage.setItem('email', this.email)
			localStorage.setItem('password', this.password)
			localStorage.setItem('introduction', this.introduction)
			localStorage.setItem('available_contents', this.available_contents.join('、'))
			localStorage.setItem('available_jobs', this.available_jobs.join('、'))
			localStorage.setItem('available_prices', this.available_prices.join('、'))
			localStorage.setItem('available_amounts', this.available_amounts.join('、'))

			this.$router.push({ name: 'profile.check' })
		}
  }
}
</script>
<style lang="scss" scoped>
@mixin sp {
    @media screen and (max-width: 768px) {
        @content;
    }
}
</style>