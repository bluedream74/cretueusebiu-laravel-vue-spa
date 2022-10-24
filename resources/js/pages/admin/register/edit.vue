<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><router-link :to="{ name: 'admin.register' }">支援機関管理一覧</router-link></li>
            <li><span>支援機関入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>支援機関入力(編集)</span></h2>
        <form class="edit_form" action="check.html">
            <dl>
              <dt>ID</dt>
              <dd>1</dd>
            </dl>
            <dl>
              <dt>利用可否<span>必須</span></dt>
              <dd>
                <input type="radio" id="koukai" name="koukai_cat" checked="checked">
                <label for="koukai">可</label>
                <input type="radio" id="hikoukai" name="koukai_cat">
                <label for="hikoukai">否</label>
              </dd>
            </dl>
            <dl>
              <dt>請求有無<span>必須</span></dt>
              <dd>
                <input type="radio" id="invoice" name="invoice_cat" checked="checked">
                <label for="invoice">有</label>
                <input type="radio" id="invoice_no" name="invoice_cat">
                <label for="invoice_no">無</label>
              </dd>
            </dl>
            <dl>
              <dt>初回登録日</dt>
              <dd>
                <span>2022/07/14</span>
              </dd>
            </dl>
            <dl>
              <dt>認定支援機関ID番号<span>必須</span></dt>
              <dd>
                <input type="text" class="w_150">
              </dd>
            </dl>
            <dl>
              <dt>会社名<span>必須</span></dt>
              <dd>
                <input type="text">
                <p class="mt05">カナ</p>
                <input type="text">
              </dd>
            </dl>
            <dl>
              <dt>担当名</dt>
              <dd>
                <input type="text">
              </dd>
            </dl>
            <dl>
              <dt>部署名<span>必須</span></dt>
              <dd>
                <input type="text">
              </dd>
            </dl>
            <dl>
              <dt>法人／個人事業主<span>必須</span></dt>
              <dd>
                <input type="radio" id="corporation" name="registration_cat" checked="checked">
                <label for="corporation">法人</label>
                <input type="radio" id="freelance" name="registration_cat">
                <label for="freelance">個人事業主</label>
              </dd>
            </dl>
            <dl>
              <dt>種別<span>必須</span></dt>
              <dd>
                <div class="wrap">
                  <select class="w_200">
                    <option value="公認会計士">公認会計士</option>
                    <option value="税理士">税理士</option>
                    <option value="中小企業診断士">中小企業診断士</option>
                    <option value="一般コンサルタント">一般コンサルタント</option>
                    <option value="弁護士">弁護士</option>
                    <option value="行政書士">行政書士</option>
                    <option value="司法書士">司法書士</option>
                    <option value="金融機関">金融機関</option>
                    <option value="その他">その他</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>会社所在地<span>必須</span></dt>
              <dd>
                〒<input type="text" name="" class="w_200 ml05">
                <div class="wrap ml20">
                  <select class="w_100">
                    <option value="北海道">北海道</option>
                    <option value="青森県">青森県</option>
                    <option value="岩手県">岩手県</option>
                    <option value="宮城県">宮城県</option>
                    <option value="秋田県">秋田県</option>
                    <option value="山形県">山形県</option>
                    <option value="福島県">福島県</option>
                    <option value="茨城県">茨城県</option>
                    <option value="栃木県">栃木県</option>
                    <option value="群馬県">群馬県</option>
                    <option value="埼玉県">埼玉県</option>
                    <option value="千葉県">千葉県</option>
                    <option value="東京都">東京都</option>
                    <option value="神奈川県">神奈川県</option>
                    <option value="新潟県">新潟県</option>
                    <option value="富山県">富山県</option>
                    <option value="石川県">石川県</option>
                    <option value="福井県">福井県</option>
                    <option value="山梨県">山梨県</option>
                    <option value="長野県">長野県</option>
                    <option value="岐阜県">岐阜県</option>
                    <option value="静岡県">静岡県</option>
                    <option value="愛知県">愛知県</option>
                    <option value="三重県">三重県</option>
                    <option value="滋賀県">滋賀県</option>
                    <option value="京都府">京都府</option>
                    <option value="大阪府">大阪府</option>
                    <option value="兵庫県">兵庫県</option>
                    <option value="奈良県">奈良県</option>
                    <option value="和歌山県">和歌山県</option>
                    <option value="鳥取県">鳥取県</option>
                    <option value="島根県">島根県</option>
                    <option value="岡山県">岡山県</option>
                    <option value="広島県">広島県</option>
                    <option value="山口県">山口県</option>
                    <option value="徳島県">徳島県</option>
                    <option value="香川県">香川県</option>
                    <option value="愛媛県">愛媛県</option>
                    <option value="高知県">高知県</option>
                    <option value="福岡県">福岡県</option>
                    <option value="佐賀県">佐賀県</option>
                    <option value="長崎県">長崎県</option>
                    <option value="熊本県">熊本県</option>
                    <option value="大分県">大分県</option>
                    <option value="宮崎県">宮崎県</option>
                    <option value="鹿児島県">鹿児島県</option>
                    <option value="沖縄県">沖縄県</option>
                  </select>
                </div>
                <p class="mt05">市区町村・番地</p>
                <input type="text">
                <p class="mt05">建物名・部屋番号など</p>
                <input type="text">
              </dd>
            </dl>
            <dl>
              <dt>電話番号</dt>
              <dd>
                <input type="text" class="w_200">
              </dd>
            </dl>
            <dl>
              <dt>FAX</dt>
              <dd>
                <input type="text" class="w_200">
              </dd>
            </dl>
            <dl>
              <dt>メールアドレス<span>必須</span></dt>
              <dd>
                <input type="text">
              </dd>
            </dl>
            <dl>
              <dt>PRポイント</dt>
              <dd>
                <textarea cols="30" rows="5"></textarea>
              </dd>
            </dl>
            <dl>
              <dt>支援可能内容<span>必須</span></dt>
              <dd>
                <div>
                  <input type="checkbox" id="display01" checked><label for="display01">事業再構築補助金</label>
                  <input type="checkbox" id="display02"><label for="display02">ものづくり補助金</label>
                  <input type="checkbox" id="display03"><label for="display03">小規模事業者補助金</label>
                  <input type="checkbox" id="display04"><label for="display04">創業支援</label>
                  <input type="checkbox" id="display05"><label for="display05">事業承継支援</label>
                  <input type="checkbox" id="display06"><label for="display06">経営改善計画策定</label>
                  <input type="checkbox" id="display07"><label for="display07">IT導入補助金</label>
                  <input type="checkbox" id="display09"><label for="display09">経営力向上計画</label>
                  <input type="checkbox" id="display10"><label for="display10">先端設備等導入計画</label>
                  <input type="checkbox" id="display11" checked><label for="display11">経営革新計画</label>
                  <input type="checkbox" id="display12"><label for="display12">事業継続力強化計画</label>
                  <input type="checkbox" id="display13"><label for="display13">その他</label>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>支援可能業種<span>必須</span></dt>
              <dd>
                <div>
                  <input type="checkbox" id="display14"><label for="display14">農業、林業</label>
                  <input type="checkbox" id="display15"><label for="display15">漁業</label>
                  <input type="checkbox" id="display16" checked><label for="display16">鉱業、採石業、砂利採取業</label>
                  <input type="checkbox" id="display17"><label for="display17">建設業</label>
                  <input type="checkbox" id="display18" checked><label for="display18">製造業</label>
                  <input type="checkbox" id="display19"><label for="display19">電気</label>
                  <input type="checkbox" id="display20"><label for="display20">ガス</label>
                  <input type="checkbox" id="display21"><label for="display21">熱供給</label>
                  <input type="checkbox" id="display22"><label for="display22">水道業</label>
                  <input type="checkbox" id="display23" checked><label for="display23">情報通信業</label>
                  <input type="checkbox" id="display24"><label for="display24">運輸業</label>
                  <input type="checkbox" id="display25"><label for="display25">郵便業</label>
                  <input type="checkbox" id="display26"><label for="display26">卸売業、小売業</label>
                  <input type="checkbox" id="display27"><label for="display27">金融業、保険業</label>
                  <input type="checkbox" id="display28" checked><label for="display28">不動産業、物品賃貸業</label>
                  <input type="checkbox" id="display29"><label for="display29">学術研究、専門</label>
                  <input type="checkbox" id="display30"><label for="display30">技術サービス業</label>
                  <input type="checkbox" id="display31"><label for="display31">宿泊業、飲食サービス業</label>
                  <input type="checkbox" id="display32"><label for="display32">生活関連サービス業、娯楽業</label>
                  <input type="checkbox" id="display33"><label for="display33">教育、学習支援業</label>
                  <input type="checkbox" id="display34"><label for="display34">医療、福祉</label>
                  <input type="checkbox" id="display35" checked><label for="display35">複合サービス事業</label>
                  <input type="checkbox" id="display36"><label for="display36">サービス業（他に分類されないもの）</label>
                  <input type="checkbox" id="display37"><label for="display37">公務（他に分類されるものを除く）</label>
                  <input type="checkbox" id="display38"><label for="display38">分類不能の産業</label>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>支援可能年商<span>必須</span></dt>
              <dd>
                <div>
                  <input type="checkbox" id="display39" checked><label for="display39">5,000万円未満</label>
                  <input type="checkbox" id="display40" checked><label for="display40">5,000万円以上3億円未満</label>
                  <input type="checkbox" id="display41"><label for="display41">3億円以上10億円未満</label>
                  <input type="checkbox" id="display42"><label for="display42">10億円以上</label>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>支援可能従業員規模<span>必須</span></dt>
              <dd>
                <div>
                  <input type="checkbox" id="display43" checked><label for="display43">10人未満</label>
                  <input type="checkbox" id="display44" checked><label for="display44">10人以上30人未満</label>
                  <input type="checkbox" id="display45" checked><label for="display45">30人以上50人未満</label>
                  <input type="checkbox" id="display46"><label for="display46">50人以上100人未満</label>
                  <input type="checkbox" id="display47"><label for="display47">100人以上300人未満</label>
                  <input type="checkbox" id="display48"><label for="display48">300人以上</label>
                </div>
              </dd>
            </dl>
            <div class="submit_wrap">
              <div class="form_btn_blue"><span><input type="submit" value="変更"></span></div>
            </div>
        </form>
      </div>

    </main>
  </div>
</template>
<script>
export default {
  
}
</script>