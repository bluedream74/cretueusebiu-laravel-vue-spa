<template>
  <div id="pdf_page">
		<p class="title">御 請 求 書</p>
		<div class="access_wrap fix">
			<div class="left_area">
				<p class="com_nam">株式会社⼋咲</p>
				<div class="address_txt">
					<p>〒530-0001</p>
					<p>⼤阪府 ⼤阪市北区梅⽥1-11-4-1000</p>
					<p>⼤阪駅前第4ビル10階</p>
					<p>管理本部 代表取締役社⻑ 中⻄弘和 様</p>
				</div>
				<p class="greeting">⼤変お世話になっております。下記、ご請求申し上げます。</p>
				<p class="price">合計⾦額 {{ $route.query.price }}円</p>
			</div>
			<div class="right_area">
				<table class="day_area">
					<tr>
						<td class="tit">⽇付 :</td>
						<td class="days_txt">{{ current_date }}</td>
					</tr>
				</table>
				<div class="cam_area fix">
					<div class="compnay_address"><img src="/admin/img/pdf_address.png"></div>
					<div class="logo"><img src="/admin/img/pdf_logo.png"></div>
				</div>
			</div>
		</div>
		<div class="detail_wrap">
			<div class="detail">
				<table>
					<tbody>
						<tr>
							<th width="60%" class="t_center">詳細</th>
							<th width="10%" class="t_center">数量</th>
							<th width="15%" class="t_center">単価</th>
							<th width="15%" class="t_center">⾦額</th>
						</tr>
						<tr>
							<td>マッチングシステム利⽤料、{{ $route.query.date }}分</td>
							<td class="t_right">{{ $route.query.amount }}件</td>
							<td class="t_right">500</td>
							<td class="t_right">{{ $route.query.amount * 500 | moneyFormat }}</td>
						</tr>
						<tr>
							<td>広告掲載料、{{ $route.query.date }}</td>
							<td class="t_right">{{ $route.query.koukoku_amount }}{{ $route.query.koukoku_unit }}</td>
							<td class="t_right">{{ $route.query.koukoku_price }}</td>
							<td class="t_right">{{ $route.query.koukoku_price }}</td>
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
							<th width="30%">振込期⽇</th>
							<td width="70%">{{ $route.query.date }}30⽇</td>
						</tr>
						<tr>
							<th>振込先</th>
							<td>株式会社⼋咲 カ）ハツサク<br>
								■三菱UFJ銀⾏ ⼤阪駅前⽀店 普通0189359<br>
								■三井住友銀⾏ 梅⽥⽀店 普通6763424</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="goukei">
				<table>
					<tbody>
						<tr>
							<th width="40%" class="t_center">⼩計</th>
							<td width="60%" class="t_right">{{ $route.query.price | moneyFormat }}円</td>
						</tr>
						<tr>
							<th class="t_center">消費税</th>
							<td class="t_right">{{ $route.query.price | moneyFormat }}円</td>
						</tr>
						<tr class="f_big">
							<th class="t_center">合計⾦額</th>
							<td class="t_right">{{ $route.query.price | moneyFormat }}円</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="remarks_wrap">
			<p><span>備考欄</span><br>
				いつもありがとうございます。<br>
				お⼿数をおかけいたしますが、よろしくお願いします。<br>
				※ 明細をご確認のうえ、お振込み期限までに上記⼝座へお振込みをお願いいたします。<br>
				※ まことに勝⼿ながら、振込⼿数料は貴社にてご負担いただきますようお願いいたします。<br>
				※ 消費税率は全て10%になります。 適格請求書発⾏事業者番号：T1-1200-0120-2929</p>
		</div>
	</div>
</template>
<script>
import moment from 'moment';
import html2pdf from "html2pdf.js";
export default {
  layout: 'basic',
  data() {
    return {
      current_date: ''
    }
  },
  mounted() {
    this.current_date = moment().format('YYYY年MM月DD日')
		html2pdf(document.getElementById("pdf_page"), {
			margin: 1,
			filename: "請求書.pdf",
		});
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
	width: 210mm;
	height: 297mm;
	padding: 0;
	margin: 0 auto;
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