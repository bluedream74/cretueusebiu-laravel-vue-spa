<template>
  <div class="common_page my_page invoice_page">
    <main>
			<section class="section mv_area">
				<h1>課金状況・明細</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'mypage' }">支援者マイページ</router-link></li>
							<li><span>課金状況・明細</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area">
				<div class="section area01">
					<div class="sitewrap">
						<ul class="matching_list invoice_data">
							<li v-for="(item, index) in invoices" :key="index">
								<h2 class="list_ttl">{{ item.date }}利用分</h2>
								<div class="company_data">
									<dl><dt>応募件数</dt><dd>{{ item.amount }}件</dd></dl>
									<dl><dt>合計金額</dt><dd>￥{{ (item.amount * 500) | moneyFormat }}</dd></dl>
									<!-- <dl><dt>広告件数</dt><dd>2件</dd></dl> -->
									<!-- <dl><dt>合計金額</dt><dd>￥5,000</dd></dl> -->
								</div>
								<div class="common_btn2 arrow">
									<router-link :to="{ name: 'invoice.pdf', query: { user_id: $store.getters['auth/user'].id, date: item.date, price: (item.amount * 500 + (!!item.koukoku ? item.koukoku.price : 0)), amount: item.amount, koukoku_amount: (!!item.koukoku ? item.koukoku.amount : 0), koukoku_unit: (!!item.koukoku ? item.koukoku.unit : ''), koukoku_price: (!!item.koukoku ? item.koukoku.price: 0) } }" target="_blank" class="browsing_btn table_btns"><span>請求書PDF</span></router-link>
								</div>
							</li>
						</ul>
						<!-- pagination -->
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
import moment from 'moment'
export default {
  layout: 'default',
  middleware: 'auth',
  data() {
    return {
      invoices: []
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/api/get_all_invoices')
        let temp = []
        let temp1 = ['2022年10月', '2022年11月', '2022年12月', '2023年1月', '2023年2月', '2023年3月']
        temp1.forEach(item => {
          let filter = data.consultant_kakins.filter(it => {
            return moment(it.created_at).format('YYYY年MM月') == item
          })
					let koukoku_filter = data.koukokus.find(it => {
						return item == it.date
					})
          temp.push({
            amount: filter.length,
            date: item,
						koukoku: koukoku_filter
          })
        })
        this.invoices = temp
      } catch (error) {
      }
    }
  }
}
</script>