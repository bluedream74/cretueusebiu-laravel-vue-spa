<template>
  <div class="register__container common_page form_page register_form">
    <main>
			<section class="section mv_area">
				<h1>支援機関新規登録</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><a href="../">TOP</a></li>
							<li><span>支援機関新規登録</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap">
				<form action="check.html" class="h-adr">
					<span class="p-country-name" style="display:none;">Japan</span>
					<section class="section lead">
						<div class="sitewrap">
							<h2 class="h_style01">支援機関を新規登録する</h2>
							<p class="lead_style">以下のフォームより登録内容をご入力ください。</p>
							<ul class="txt_indent texts text_link">
								<li>・事業者相談、その他のお問い合わせは専用のフォームからお問い合わせください。</li>
								<li>・赤色の<b class="red">（必須）</b>がついた項目は必須入力項目です。 お忘れのないようご入力ください。</li>
								<li>・ご入力いただいた情報は、<a href="../privacy/" target="_blank">プライバシーポリシー</a>に基き厳重に管理いたします。</li>
								<li>・尚、反映までにお時間がかかる場合がございますのでご了承ください。</li>
								<li>※営業時間： 月曜～土曜／9:00～18:00　定休日： 日曜・祝日</li>
							</ul>
						</div>
					</section>
					<section class="section area01">
						<div class="sitewrap">
							<h2 class="h_style01">認定支援機関情報入力欄</h2>
							<div class="table_style">
								<dl class="required">
									<dt>認定支援機関ID番号<i>必須</i></dt>
									<dd><div class="form_el"><input type="tel" name="certificationId" required placeholder="※桁数は12桁となります。"></div></dd>
								</dl>
								<dl class="required">
									<dt>会社名<i>必須</i></dt>
									<dd><div class="form_el"><input type="text" name="companyName" required placeholder="株式会社AA"></div></dd>
								</dl>
								<dl class="required">
									<dt>フリガナ<i>必須</i></dt>
									<dd><div class="form_el"><input type="text" name="companyKana" required placeholder="カブシキガイシャエーエー"></div></dd>
								</dl>
								<dl class="required">
									<dt>担当者氏名<i>必須</i></dt>
									<dd><div class="form_el inline"><input type="text" name="cip" required placeholder="山田 太郎"></div></dd>
								</dl>
								<dl class="">
									<dt>部署名</dt>
									<dd><div class="form_el inline"><input type="text" name="department " placeholder="営業部"></div></dd>
								</dl>
								<dl class="">
									<dt>役職名</dt>
									<dd><div class="form_el inline"><input type="text" name="job " placeholder="部長"></div></dd>
								</dl>
								<dl class="required">
									<dt>法人／個人事業主<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
										<label for="companyType01"><input type="radio" name="companyType" id="companyType01" value="法人" checked><span>法人</span></label>
										<label for="companyType02"><input type="radio" name="companyType" id="companyType02" value="個人事業主"><span>個人事業主</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>種別<i>必須</i></dt>
									<dd><div class="form_el">
										<div class="select_wrap">
											<select>
												<option value="一般コンサルタント" selected>一般コンサルタント</option>
												<option value="公認会計士">公認会計士</option>
												<option value="税理士">税理士</option>
												<option value="中小企業診断士">中小企業診断士</option>
												<option value="弁護士">弁護士</option>
												<option value="行政書士">行政書士</option>
												<option value="司法書士">司法書士</option>
												<option value="金融機関">金融機関</option>
												<option value="その他">その他</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>会社所在地<i>必須</i></dt>
									<dd><div class="form_el inline">
										<span>〒</span><input type="tel" name="zip" class="p-postal-code" size="8" maxlength="8" placeholder="000-0000">
										<div class="select_wrap">
											<select name="pref" class="p-region-id">
												<option value="">--</option>
												<option value="1">北海道</option>
												<option value="2">青森県</option>
												<option value="3">岩手県</option>
												<option value="4">宮城県</option>
												<option value="5">秋田県</option>
												<option value="6">山形県</option>
												<option value="7">福島県</option>
												<option value="8">茨城県</option>
												<option value="9">栃木県</option>
												<option value="10">群馬県</option>
												<option value="11">埼玉県</option>
												<option value="12">千葉県</option>
												<option value="13">東京都</option>
												<option value="14">神奈川県</option>
												<option value="15">新潟県</option>
												<option value="16">富山県</option>
												<option value="17">石川県</option>
												<option value="18">福井県</option>
												<option value="19">山梨県</option>
												<option value="20">長野県</option>
												<option value="21">岐阜県</option>
												<option value="22">静岡県</option>
												<option value="23">愛知県</option>
												<option value="24">三重県</option>
												<option value="25">滋賀県</option>
												<option value="26">京都府</option>
												<option value="27">大阪府</option>
												<option value="28">兵庫県</option>
												<option value="29">奈良県</option>
												<option value="30">和歌山県</option>
												<option value="31">鳥取県</option>
												<option value="32">島根県</option>
												<option value="33">岡山県</option>
												<option value="34">広島県</option>
												<option value="35">山口県</option>
												<option value="36">徳島県</option>
												<option value="37">香川県</option>
												<option value="38">愛媛県</option>
												<option value="39">高知県</option>
												<option value="40">福岡県</option>
												<option value="41">佐賀県</option>
												<option value="42">長崎県</option>
												<option value="43">熊本県</option>
												<option value="44">大分県</option>
												<option value="45">宮崎県</option>
												<option value="46">鹿児島県</option>
												<option value="47">沖縄県</option>
											</select>
										</div>
									</div></dd>
								</dl>
								<dl class="required">
									<dt>市区町村番地<i>必須</i></dt> 
									<dd><div class="form_el"><input type="text" name="address" required placeholder="〇〇区〇〇〇〇〇〇〇" class="p-locality p-street-address p-extended-address" /></div></dd>
								</dl>
								<dl class="">
									<dt>建物名・部屋番号など</dt>
									<dd><div class="form_el"><input type="text" name="address2" placeholder="〇〇ビル5F" /></div></dd>
								</dl>
								<dl class="">
									<dt>電話番号</dt>
									<dd><div class="form_el"><input type="tel" name="tel" placeholder="※桁数は11桁となります。" /></div></dd>
								</dl>
								<dl class="">
									<dt>FAX</dt>
									<dd><div class="form_el"><input type="tel" name="fax" placeholder="03-0000-0001" /></div></dd>
								</dl>
								<dl class="required">
									<dt>メールアドレス<i>必須</i></dt> 
									<dd><div class="form_el"><input type="email" name="email" required placeholder="aaa@gmail.com" /></div></dd>
								</dl>
								<dl class="required">
									<dt>マイページパスワード<i>必須</i></dt> 
									<dd><div class="form_el"><input type="password" name="password" required placeholder="8桁の半角英数字にて入力ください" maxlength="8" minlength="8" /></div></dd>
								</dl>
								<dl class="">
									<dt>PRポイント</dt> 
									<dd><div class="form_el"><textarea placeholder="過去に○○件の補助金の申請を受給までサポート。 補助金支援のプロフェッショナルです。 ぜひ私共におまかせください。 Webサイト⇒https://aaaaaaaaaa.co.jp"></textarea></div></dd>
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
<label for="conditions_1_01"><input type="checkbox" id="conditions_1_01" value="事業再構築補助金" name="conditions_1"><span>事業再構築補助金</span></label>
<label for="conditions_1_02"><input type="checkbox" id="conditions_1_02" value="ものづくり補助金" name="conditions_1"><span>ものづくり補助金</span></label>
<label for="conditions_1_03"><input type="checkbox" id="conditions_1_03" value="小規模事業者補助金" name="conditions_1"><span>小規模事業者補助金</span></label>
<label for="conditions_1_04"><input type="checkbox" id="conditions_1_04" value="創業支援" name="conditions_1"><span>創業支援</span></label>
<label for="conditions_1_05"><input type="checkbox" id="conditions_1_05" value="事業承継支援" name="conditions_1"><span>事業承継支援</span></label>
<label for="conditions_1_06"><input type="checkbox" id="conditions_1_06" value="経営改善計画策定" name="conditions_1"><span>経営改善計画策定</span></label>
<label for="conditions_1_07"><input type="checkbox" id="conditions_1_07" value="IT導入補助金" name="conditions_1"><span>IT導入補助金</span></label>
<label for="conditions_1_08"><input type="checkbox" id="conditions_1_08" value="経営力向上計画" name="conditions_1"><span>経営力向上計画</span></label>
<label for="conditions_1_09"><input type="checkbox" id="conditions_1_09" value="先端設備等導入計画" name="conditions_1"><span>先端設備等導入計画</span></label>
<label for="conditions_1_10"><input type="checkbox" id="conditions_1_10" value="経営革新計画" name="conditions_1"><span>経営革新計画</span></label>
<label for="conditions_1_11"><input type="checkbox" id="conditions_1_11" value="事業継続力強化計画" name="conditions_1"><span>事業継続力強化計画</span></label>
<label for="conditions_1_12"><input type="checkbox" id="conditions_1_12" value="その他" name="conditions_1"><span>その他</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能業種<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
<label for="conditions_2_01"><input type="checkbox" id="conditions_2_01" value="農業、林業" name="conditions_2"><span>農業、林業</span></label>
<label for="conditions_2_02"><input type="checkbox" id="conditions_2_02" value="漁業" name="conditions_2"><span>漁業</span></label>
<label for="conditions_2_03"><input type="checkbox" id="conditions_2_03" value="鉱業、採石業、砂利採取業" name="conditions_2"><span>鉱業、採石業、砂利採取業</span></label>
<label for="conditions_2_04"><input type="checkbox" id="conditions_2_04" value="建設業" name="conditions_2"><span>建設業</span></label>
<label for="conditions_2_05"><input type="checkbox" id="conditions_2_05" value="製造業" name="conditions_2"><span>製造業</span></label>
<label for="conditions_2_06"><input type="checkbox" id="conditions_2_06" value="電気" name="conditions_2"><span>電気</span></label>
<label for="conditions_2_07"><input type="checkbox" id="conditions_2_07" value="ガス" name="conditions_2"><span>ガス</span></label>
<label for="conditions_2_08"><input type="checkbox" id="conditions_2_08" value="熱供給" name="conditions_2"><span>熱供給</span></label>
<label for="conditions_2_09"><input type="checkbox" id="conditions_2_09" value="水道業" name="conditions_2"><span>水道業</span></label>
<label for="conditions_2_10"><input type="checkbox" id="conditions_2_10" value="情報通信業" name="conditions_2"><span>情報通信業</span></label>
<label for="conditions_2_11"><input type="checkbox" id="conditions_2_11" value="運輸業" name="conditions_2"><span>運輸業</span></label>
<label for="conditions_2_12"><input type="checkbox" id="conditions_2_12" value="郵便業" name="conditions_2"><span>郵便業</span></label>
<label for="conditions_2_13"><input type="checkbox" id="conditions_2_13" value="卸売業、小売業" name="conditions_2"><span>卸売業、小売業</span></label>
<label for="conditions_2_14"><input type="checkbox" id="conditions_2_14" value="金融業、保険業" name="conditions_2"><span>金融業、保険業</span></label>
<label for="conditions_2_15"><input type="checkbox" id="conditions_2_15" value="不動産業、物品賃貸業" name="conditions_2"><span>不動産業、物品賃貸業</span></label>
<label for="conditions_2_16"><input type="checkbox" id="conditions_2_16" value="学術研究、専門" name="conditions_2"><span>学術研究、専門</span></label>
<label for="conditions_2_17"><input type="checkbox" id="conditions_2_17" value="技術サービス業" name="conditions_2"><span>技術サービス業</span></label>
<label for="conditions_2_18"><input type="checkbox" id="conditions_2_18" value="宿泊業、飲食サービス業" name="conditions_2"><span>宿泊業、飲食サービス業</span></label>
<label for="conditions_2_19"><input type="checkbox" id="conditions_2_19" value="生活関連サービス業、娯楽業" name="conditions_2"><span>生活関連サービス業、娯楽業</span></label>
<label for="conditions_2_20"><input type="checkbox" id="conditions_2_20" value="教育、学習支援業" name="conditions_2"><span>教育、学習支援業</span></label>
<label for="conditions_2_21"><input type="checkbox" id="conditions_2_21" value="医療、福祉" name="conditions_2"><span>医療、福祉</span></label>
<label for="conditions_2_22"><input type="checkbox" id="conditions_2_22" value="複合サービス事業" name="conditions_2"><span>複合サービス事業</span></label>
<label for="conditions_2_23"><input type="checkbox" id="conditions_2_23" value="サービス業（他に分類されないもの）" name="conditions_2"><span>サービス業（他に分類されないもの）</span></label>
<label for="conditions_2_24"><input type="checkbox" id="conditions_2_24" value="公務（他に分類されるものを除く）" name="conditions_2"><span>公務（他に分類されるものを除く）</span></label>
<label for="conditions_2_25"><input type="checkbox" id="conditions_2_25" value="分類不能の産業" name="conditions_2"><span>分類不能の産業</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能年商<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
<label for="conditions_3_01"><input type="checkbox" id="conditions_3_01" value="5,000万円未満 " name="conditions_3"><span>5,000万円未満 </span></label>
<label for="conditions_3_02"><input type="checkbox" id="conditions_3_02" value="5,000万円以上3億円未満 " name="conditions_3"><span>5,000万円以上3億円未満 </span></label>
<label for="conditions_3_03"><input type="checkbox" id="conditions_3_03" value="3億円以上10億円未満" name="conditions_3"><span>3億円以上10億円未満</span></label>
<label for="conditions_3_04"><input type="checkbox" id="conditions_3_04" value="10億円以上" name="conditions_3"><span>10億円以上</span></label>
									</div></div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能従業員規模<i>必須</i></dt>
									<dd><div class="form_el"><div class="labels">
<label for="conditions_4_01"><input type="checkbox" id="conditions_4_01" value="5人未満" name="conditions_4"><span>5人未満</span></label>
<label for="conditions_4_02"><input type="checkbox" id="conditions_4_02" value="5～9人" name="conditions_4"><span>5～9人</span></label>
<label for="conditions_4_03"><input type="checkbox" id="conditions_4_03" value="10～29人" name="conditions_4"><span>10～29人</span></label>
<label for="conditions_4_04"><input type="checkbox" id="conditions_4_04" value="30～99人" name="conditions_4"><span>30～99人</span></label>
<label for="conditions_4_05"><input type="checkbox" id="conditions_4_05" value="100～499人" name="conditions_4"><span>100～499人</span></label>
<label for="conditions_4_06"><input type="checkbox" id="conditions_4_06" value="500～999人" name="conditions_4"><span>500～999人</span></label>
<label for="conditions_4_07"><input type="checkbox" id="conditions_4_07" value="1,000人以上" name="conditions_4"><span>1,000人以上</span></label>
									</div></div></dd>
								</dl>
							</div>
						</div>
					</section>
					<div class="section send_area">
						<div class="sitewrap">
							<div class="send_btns">
								<label class="btn_warp next"><span><input type="submit" value="送信内容を確認"></span></label>
							</div>
						</div>
					</div>
				</form>
			</div>
		</main>
  </div>
</template>
<script>
export default {
  layout: 'default',
  middleware: 'guest',
  components: {
  },
  data() {
    return {
    }
  },
  mounted() {
  },
  methods: {
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