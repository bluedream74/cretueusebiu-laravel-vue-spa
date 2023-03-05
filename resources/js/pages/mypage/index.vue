<template>
  <div class="common_page my_page">
    <main>
			<section class="section mv_area">
				<h1>支援機関マイページ</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>支援機関マイページ</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area">
				<div class="section area01">
					<div class="sitewrap">
						<h2 class="h_style02"><span>マッチング事業者リスト</span></h2>
						<ul class="matching_list">
							<li v-for="(item, index) in list" :key="index">
								<h3 class="list_ttl">{{ item.com_name }}</h3>
								<div class="company_data">
									<dl><dt>都道府県</dt><dd>{{ item.prefecture }}</dd></dl>
									<dl><dt>業種</dt><dd>{{ JOBS[item.job] }}</dd></dl>
									<dl><dt>年商</dt><dd>{{ PRICES[item.income] }}</dd></dl>
									<dl><dt>従業員規模</dt><dd>{{ AMOUNTS[item.amount] }}</dd></dl>
									<dl><dt>投資予算額</dt><dd>{{ SUPPORT_PRICES[item.price] }}</dd></dl>
									<dl class="overview"><dt>概要</dt><dd>{{ item.message_title }}</dd></dl>
								</div>
								<div class="common_btn2 arrow">
									<a @click="showDetail(item)" :data-target="'modal-content-' + (index + 1)"><span>詳細を見る</span></a>
								</div>
							</li>
						</ul>
						<Pagination v-if="temp.length > 0" :total="temp.length" @changeCurrentPage="changeCurrentPage"  />
						<ul class="mypage_menu common_btn2">
							<li><router-link :to="{ name: 'profile' }" class="blue"><span><img src="/assets/img/mypage/ico_profile.png">マイプロフィール</span></router-link></li>
							<li><router-link :to="{ name: 'history' }" class="blue"><span><img src="/assets/img/mypage/ico_ansew.png">過去の回答一覧</span></router-link></li>
							<li><router-link :to="{ name: 'invoice' }" class="blue"><span><img src="/assets/img/mypage/ico_billing.png">課金状況確認</span></router-link></li>
						</ul>
					</div>
				</div>
			</div>
		</main>

		<div id="modal-overlay" v-if="isShowModal">
			<div class="modal-content">
				<a class="modal-close close_btn" @click="closeKakin">×</a>
				<div class="modal-wrap">
					<div class="modal-ttl">詳細情報の閲覧には、当サイトの「<a href="/terms/#terms02" target="_blank">利用規約</a>」に基づき、月末締めで閲覧回数に応じた利用料金が請求されます。宜しいでしょうか？</div>
					<div class="texts">
<p class="txt_indent"><b class="red">※掲載期間が終了したら応募が出来なくなります。ご注意ください。</b></p>
<p><b class="red">初回メールをお送りしましたら電話番号が表示されます</b></p>
					</div>
					<div class="section send_area">
						<div class="send_btns common_btn2">
								<a @click="agreeKakin"><span>規約に同意して閲覧</span></a>
								<a @click="closeKakin" class="modal-close prev blue"><span>戻る</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
  </div>
</template>
<script>
import { JOBS, PRICES, AMOUNTS, SUPPORT_PRICES } from '../../const'
import Pagination from '../../components/Pagination.vue'
import moment from 'moment'
export default {
  layout: 'default',
	middleware: 'auth',
	components: {
		Pagination
	},
	created() {
		window.document.title = '支援機関マイページ | 補助金活用.COM'
		$('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「支援機関マイページ」です。各マッチング事業者の情報をリストからご確認いただけます。支援機関マイページではこのほかマイプロフィール、過去の回答一覧、課金状況確認がご覧いただけます。')
		$('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「支援機関マイページ」です。各マッチング事業者の情報をリストからご確認いただけます。支援機関マイページではこのほかマイプロフィール、過去の回答一覧、課金状況確認がご覧いただけます。')
	},
	mounted() {
		this.init()
	},
	data() {
		return {
			list: [],
			temp: [],
			JOBS: JOBS,
			PRICES: PRICES,
			AMOUNTS: AMOUNTS,
			SUPPORT_PRICES: SUPPORT_PRICES,
			consultant_kakins: [],

			isShowModal: false,
			tempConsultant: null
		}
	},
	methods: {
		intersection(arrA, arrB) {
			return arrA.filter(x => arrB.includes(x));
		},
		changeCurrentPage(page) {
      this.list = this.temp.filter((item, index) => {
        return index >= (page - 1) * 10 && index < (page * 10)
      })
    },
		closeKakin() {
			this.isShowModal = false
		},
		async agreeKakin() {
			let consultant = this.tempConsultant
			// confirm(`利用サービス：「${this.tempConsultant.com_name}」有料相談者情報の開示\n利用料：￥500\n利用者：${this.$store.getters['auth/user'].com_name}\n利用日：${ moment().format('YYYY/MM/DD') }\n請求日：${moment().endOf('month').format('YYYY/MM/DD')}`);
			let find = this.consultant_kakins.find(item => {
				return item.consultant_id == consultant.id
			})
			if (!find) {
				try {
					const { data } = await axios.post('/api/agree_kakin', {
						consultant_id: consultant.id
					})
					this.$router.push({ name: 'consultant_detail', query: {
						id: consultant.id
					} })
					this.tempConsultant = null
				} catch (error) {
				}
			}
		},
		showDetail(consultant) {
			let find = this.consultant_kakins.find(item => {
				return item.consultant_id == consultant.id
			})
			if (!!find) {
				this.$router.push({ name: 'consultant_detail', query: {
					id: consultant.id
				} })
			} else {
				this.tempConsultant = consultant
				this.isShowModal = true
			}
		},
		async init() {
			try {
				const { data } = await axios.post('/api/get_matching_list')
				this.consultant_kakins = data.consultant_kakins
				let available_amounts = data.available_amounts.map(it => {
					return it.amount_id
				})
				let available_contents = data.available_contents.map(it => {
					return it.content_id
				})
				let available_jobs = data.available_jobs.map(it => {
					return it.job_id
				})
				let available_prices = data.available_prices.map(it => {
					return it.price_id
				})
				this.temp = data.consultants.filter(item => {
					return !item.answers.find(it => {
						return it.user_id == this.$store.getters['auth/user'].id
					})
				}).filter(item => {
					return item.available == 1 && moment(item.expired_at).format('YYYYMMDD') >= moment().format('YYYYMMDD')
				}).filter(item => {
					let confirms = item.confirms.map(it => {
						return it.confirm_id
					})
					let misss = item.misss.map(it => {
						return it.miss_id
					}).map(it => {
						if(it == 0) {
							return [0, 1, 2, 6, 8]
						} else if (it == 1) {
							return [0, 1, 2, 6]
						} else if (it == 2) {
							return [0, 1, 2, 6]
						} else if (it == 3) {
							return [0, 1, 2, 8]
						} else if (it == 4) {
							return [0, 1, 2, 8]
						} else if (it == 5) {
							return [0, 1, 2, 6]
						} else if (it == 6) {
							return [11]
						} else if (it == 7) {
							return [1, 5, 7, 9]
						} else if (it == 8) {
							return [1, 5, 7, 9]
						} else if (it == 9) {
							return [3]
						} else if (it == 10) {
							return [0, 1, 2, 6]
						} else if (it == 11) {
							return [6]
						} else if (it == 12) {
							return [0, 1]
						} else if (it == 13) {
							return [0, 1]
						} else if (it == 14) {
							return [4]
						} else if (it == 15) {
							return [0, 3]
						} else if (it == 16) {
							return [10]
						} else if (it == 17) {
							return [11]
						} else if (it == 18) {
							return [0, 1, 2]
						} else if (it == 19) {
							return [2, 3]
						}
					})
					let others = item.others.map(it => {
						return it.other_id
					})
					let flag1 = false;
					if (this.intersection(available_contents, confirms).length > 0) {
						flag1 = true
					}

					let flag = false
					misss.forEach(it => {
						if (this.intersection(available_contents, it).length > 0) {
							flag = true
						}
					})
					if (flag == true) {
						flag1 = true
					}

					if (flag1 == false) {
						return false
					}

					if (available_amounts.includes(item.amount)) {
						flag1 = true
					} else {
						return false
					}

					if (available_jobs.includes(item.job)) {
						flag1 = true
					} else {
						return false
					}

					if (available_prices.includes(item.price)) {
						flag1 = true
					} else {
						return false
					}

					return true
				})

				this.list = this.temp.filter((item, index) => {
					return index < 10
				})

				setTimeout(() => {
				let recaptchaScript = document.createElement('script')
					recaptchaScript.setAttribute('src', 'https://hojyokin-katsuyou.com/assets/js/modal-multi.js')
					document.head.appendChild(recaptchaScript)
				}, 1000)
			} catch (error) {
			}
		}
	}
}
</script>
<style lang="scss" scoped>

</style>