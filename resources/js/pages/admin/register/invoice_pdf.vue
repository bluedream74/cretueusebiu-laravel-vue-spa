<template>
	<div>
		<vue-html2pdf
            :show-layout="true"
            :float-layout="true"
            :enable-download="true"
            :preview-modal="true"
            :paginate-elements-by-height="1400"
            filename="領収書"
            :pdf-quality="2"
            :manual-pagination="false"
            pdf-format="a4"
            pdf-orientation="portrait"
            pdf-content-width="800px"
            ref="html2Pdf"
        >
		<div id="pdf_page" slot="pdf-content"><div class="page_wrap">
		<p class="title">御 請 求 書</p>
		<div class="access_wrap fix" v-if="!!user">
			<div class="left_area">
				<p class="com_nam">{{ user.com_name }}</p>
				<div class="address_txt">
					<p>〒{{ user.zipcode }}</p>
					<p>{{ user.prefecture }} {{ user.city }}</p>
					<p>{{ user.building }}</p>
					<p>{{ user.department_name }} {{ user.role_name }} {{ user.tanto_name }}様</p>
				</div>
				<p class="greeting">大変お世話になっております。下記、ご請求申し上げます。</p>
				<p class="price">合計金額 {{ Math.ceil(clacNormalPrice() + clacSpecialPrice() + (!!koukou ? koukou.price * koukou.amount : 0)) + Math.ceil((clacNormalPrice() + clacSpecialPrice() + (!!koukou ? koukou.price * koukou.amount : 0)) / 10) }}円</p>
			</div>
			<div class="right_area">
				<table class="day_area">
					<tr>
						<td class="tit">日付:</td>
						<td class="days_txt"><p>{{ monthLastDay }}</p></td>
					</tr>
					<tr>
						<td class="tit">請求書番号 :</td>
						<td class="days_txt"><p>W{{ invoiceNumber }}-{{ user.id }}</p></td>
					</tr>
				</table>
				<div class="cam_area fix">
					<div class="compnay_address"><img src="/admin/img/cp_seals.png"></div>
				</div>
			</div>
		</div>
		<div class="detail_wrap">
			<div class="detail">
				<table>
					<tbody>
						<tr>
							<th width="55%" class="t_center">詳細</th>
							<th width="15%" class="t_center">数量</th>
							<th width="15%" class="t_center">単価</th>
							<th width="15%" class="t_center">金額</th>
						</tr>
						<tr>
							<td>マッチングシステム利用料、{{ $route.query.date }}分</td>
							<td class="t_right">{{ filterCount(1) }}件</td>
							<td class="t_right">{{ this.master.price }}円</td>
							<td class="t_right">{{ clacNormalPrice() }}</td>
						</tr>
						<!-- if:特殊金額適用中の利用履歴がある場合-->
						<tr v-if="filterCount(2) > 0">
							<td>マッチングシステム利用料、{{ text1 }}分</td>
							<td class="t_right">{{ filterCount(2) }}</td>
							<td class="t_right">{{ this.master.special_price }}円</td>
							<td class="t_right">{{ clacSpecialPrice() }}</td>
						</tr>
						<!-- endif:特殊金額適用中の利用履歴がある場合-->
						<!-- if:広告費の利用履歴がある場合-->
						<tr v-if="!!koukou">
							<td>広告費:{{ koukou.description }}</td>
							<td class="t_right">{{ koukou.amount }}{{ koukou.unit }}</td>
							<td class="t_right">{{ koukou.price }}円</td>
							<td class="t_right">{{ koukou.price * koukou.amount }}</td>
						</tr>
						<!-- endif:広告費の利用履歴がある場合-->
						<tr>
							<td></td>
							<td class="t_right"></td>
							<td class="t_right"></td>
							<td class="t_right"></td>
						</tr>
						<tr>
							<td> </td>
							<td class="t_right"></td>
							<td class="t_right"></td>
							<td class="t_right"></td>
						</tr>
						<tr>
							<td> </td>
							<td class="t_right"></td>
							<td class="t_right"></td>
							<td class="t_right"></td>
						</tr>
						<tr>
							<td> </td>
							<td class="t_right"></td>
							<td class="t_right"></td>
							<td class="t_right"></td>
						</tr>
						<tr>
							<td> </td>
							<td class="t_right"></td>
							<td class="t_right"></td>
							<td class="t_right"></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="payee_wrap fix">
			<div class="payee">
				<table>
					<tbody>
						<tr>
							<th width="30%">振込期日</th>
							<td width="70%">{{ monthLastDay1 }}</td>
						</tr>
						<tr>
							<th>振込先</th>
							<td>株式会社八咲 カ）ハツサク<br>
								■三菱UFJ銀行 大阪駅前支店 普通0189359<br>
								■三井住友銀行 梅田支店 普通6763424</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="goukei">
				<table>
					<tbody>
						<tr>
							<th width="40%" class="t_center">小計</th>
							<td width="60%" class="t_right">{{ Math.ceil(clacNormalPrice() + clacSpecialPrice() + (!!koukou ? koukou.price * koukou.amount : 0)) }}円</td>
						</tr>
						<tr>
							<th class="t_center">消費税</th>
							<td class="t_right">{{ Math.ceil((clacNormalPrice() + clacSpecialPrice() + (!!koukou ? koukou.price * koukou.amount : 0)) / 10) }}円</td>
						</tr>
						<tr class="f_big">
							<th class="t_center">合計金額</th>
							<td class="t_right">{{ Math.ceil(clacNormalPrice() + clacSpecialPrice() + (!!koukou ? koukou.price * koukou.amount : 0)) + Math.ceil((clacNormalPrice() + clacSpecialPrice() + (!!koukou ? koukou.price * koukou.amount : 0)) / 10) }}円</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="remarks_wrap">
			<p><span>備考欄</span><br>
				明細をご確認のうえ、お振込み期限までに上記口座へお振込みをお願いいたします。<br>
				まことに勝手ながら、振込手数料は貴社にてご負担いただきますようお願いいたします。<br>
				消費税率は全て10%になります。 適格請求書発行事業者番号：T1-1200-0120-2929</p>
			<p>お手数をおかけいたしますが、よろしくお願いします。</p>
		</div>
	</div></div>
		</vue-html2pdf>
	</div>
</template>
<script>
import moment from 'moment';
import VueHtml2pdf from 'vue-html2pdf'
export default {
  layout: 'basic',
  components: {
        VueHtml2pdf
    },
  data() {
    return {
      current_date: '',
	  user: null,
	  invoiceNumber: '',
	  monthLastDay: '',
	  monthLastDay1: '',
	  text1: '',
	  consultant_kakins: [],
	  koukous: null,
	  master: null
    }
  },
  mounted() {
	this.init()
    this.current_date = moment().format('YYYY年MM月DD日')
	this.invoiceNumber = moment().format('YYYYMM')
	this.monthLastDay = moment(this.$route.query.date, 'YYYY年MM月').endOf('month').format('YYYY年MM月DD日')
	this.monthLastDay1 = moment(this.$route.query.date, 'YYYY年MM月').add(1, 'month').endOf('month').format('YYYY年MM月DD日')
	this.text1 = moment().format('YYYY年MM月')
  },
  methods: {
	async init() {
		try {
			const { data } = await axios.post('/admin/get_user_info', {
				user_id: this.$route.query.user_id
			})
			this.user = data.user_info
			this.koukou = data.koukous.find(item => {
				return item.date == this.$route.query.date
			})
			this.consultant_kakins = data.consultant_kakins.filter(item => {
				return moment(item.created_at).format('YYYYMM') == moment(this.$route.query.date, 'YYYY年MM月').format('YYYYMM')
			})
			this.master = data.master

			setTimeout(() => {
                    this.$refs.html2Pdf.generatePdf()
                }, 1000)
		} catch (error) {
		}
	},
	filterCount(status) {
		return this.consultant_kakins.filter(item => {
			return item.status == status
		}).length
	},
	clacNormalPrice() {
		let price = 0
		this.consultant_kakins.forEach(item => {
			if (item.status == 1) {
				price += item.price
			}
		})

		return price
	},
	clacSpecialPrice() {
		let price = 0
		this.consultant_kakins.forEach(item => {
			if (item.status == 2) {
				price += item.price
			}
		})

		return price
	}
  }
}
</script>
<style lang="scss" scoped>
* {
	margin:0;
	padding:0;
}
#pdf_page{
	background:#FFFFFF;
	color:#000;
	font-family:  'MS Gothic', sans-serif;
	font-size:14px;
	line-height:1.4;
	width: 100%;
	min-height: 100vh;
	padding: 0;
	margin: 0 auto;
	text-align: left;
	padding: 20px;
	padding-top: 30px;
}
table {
	font-size:100%;
	line-height: 1;
	margin-bottom: 0;
	border-collapse:collapse;
	border-spacing:0;
}
th {
	font-weight:normal;
	text-align:left;
}
h1,h2,h3,h4,h5,h6,p{
	font-size:100%;
}
#pdf_page .title{
	text-align:center;
	font-size:28px;
	margin-bottom: 20px;
}
#pdf_page .access_wrap{
	margin-bottom: 20px;
	display: block;
  height: 240px;
}
#pdf_page .access_wrap .left_area{
	float: left;
	width: 110mm;
}
#pdf_page .access_wrap .left_area .com_nam{
	font-size:20px;
	margin-bottom: 10px;
	text-decoration:underline;
}
#pdf_page .access_wrap .left_area .address_txt{
	padding-left: 16px;
	margin-bottom: 10px;
}
#pdf_page .access_wrap .left_area .greeting{
	margin-bottom: 20px;
}
#pdf_page .access_wrap .left_area .price{
	font-size:24px;
	text-decoration:underline;
}
#pdf_page .access_wrap .right_area{
	float: right;
	width: 90mm;
}
#pdf_page .access_wrap .right_area .day_area{
	width: 100%;
	margin-bottom: 10px;
}
#pdf_page .access_wrap .right_area .day_area td{
	width: 50%;
}
#pdf_page .access_wrap .right_area .day_area td.days_txt{
	text-align: right;
}
#pdf_page .access_wrap .right_area img{
	width: 100%;
}
#pdf_page .detail_wrap .detail table{
	width: 100%;
	border:3px solid #000;
	margin-bottom: 10px;
}
#pdf_page .detail_wrap .detail table th,
#pdf_page .detail_wrap .detail table td{
	border:1px solid #000;
	height: 20px;
	padding: 4px;
	font-size:14px;
}
#pdf_page .payee_wrap{
	margin-bottom: 10px;
	display: block;
  height: 100px;
}
#pdf_page .payee_wrap .payee{
	width: 115mm;
	float: left;
}
#pdf_page .payee_wrap .payee table th,
#pdf_page .payee_wrap .payee table td{
	padding-bottom: 10px;
}
#pdf_page .payee_wrap .goukei{
	float: right;
	width: 80mm;
}
#pdf_page .payee_wrap .goukei table{
	width: 100%;
	border:3px solid #000;
}
#pdf_page .payee_wrap .goukei table th,
#pdf_page .payee_wrap .goukei table td{
	border:1px solid #000;
	height: 20px;
	padding: 4px;
	font-size:14px;
}
#pdf_page .payee_wrap .goukei table .f_big th,
#pdf_page .payee_wrap .goukei table .f_big td{
	font-size:18px;
	padding:6px 4px;
}
#pdf_page .remarks_wrap{
	border:1px solid #000;
	padding: 10px;
}
#pdf_page .remarks_wrap span{
	text-decoration: underline;
}
.t_center{
	text-align: center;
}
.t_right{
	text-align: right;
}
.fix:after{
	content:"";
	display:block;
}
</style>