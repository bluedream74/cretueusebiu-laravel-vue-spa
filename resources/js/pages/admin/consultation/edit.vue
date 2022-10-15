<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a href="index.html">事業者管理一覧</a></li>
            <li><span>事業者入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>事業者入力(編集)</span></h2>
        <form class="edit_form" action="check.html">
            <dl>
              <dt>ID</dt>
              <dd>1</dd>
            </dl>
            <dl>
              <dt>公開・非公開<span>必須</span></dt>
              <dd>
                <input type="radio" id="koukai" name="koukai_cat" checked="checked">
                <label for="koukai">公開中</label>
                <input type="radio" id="hikoukai" name="koukai_cat">
                <label for="hikoukai">非公開</label>
              </dd>
            </dl>
            <dl>
              <dt>登録日時<span>必須</span></dt>
              <dd>
                <span>2022/07/14</span>
                <span class="ml80">14時48分</span>
              </dd>
            </dl>
            <dl>
              <dt>相談内容<span>必須</span></dt>
              <dd>
                <div>
                  <p class="t_center mb05"><b>使いたい補助金や制度が決まっている方</b></p>
                  <input type="checkbox" id="display01" disabled checked><label for="display01">事業再構築補助金</label>
                  <input type="checkbox" id="display02" disabled><label for="display02">ものづくり補助金</label>
                  <input type="checkbox" id="display03" disabled><label for="display03">小規模事業者補助金</label>
                  <input type="checkbox" id="display04" disabled><label for="display04">創業支援</label>
                  <input type="checkbox" id="display05" disabled><label for="display05">事業承継支援</label>
                  <input type="checkbox" id="display06" disabled><label for="display06">経営改善計画策定</label>
                  <input type="checkbox" id="display07" disabled><label for="display07">IT導入補助金</label>
                  <input type="checkbox" id="display09" disabled><label for="display09">経営力向上計画</label>
                  <input type="checkbox" id="display10" disabled><label for="display10">先端設備等導入計画</label>
                  <input type="checkbox" id="display11" disabled checked><label for="display11">経営革新計画</label>
                  <input type="checkbox" id="display12" disabled><label for="display12">事業継続力強化計画</label>
                </div>
                <div>
                  <p class="t_center mt20 mb05"><b>該当の補助金や制度が不明な方</b></p>
                  <input type="checkbox" id="display13" disabled><label for="display13">設備を導入したい・設備投資をしたい</label>
                  <input type="checkbox" id="display14" disabled><label for="display14">Webサイトを作りたい・改善したい</label>
                  <input type="checkbox" id="display15" disabled checked><label for="display15">ショッピングサイトを作りたい・改善したい</label>
                  <input type="checkbox" id="display16" disabled><label for="display16">試作品を作りたい</label>
                  <input type="checkbox" id="display17" disabled><label for="display17">開発したいことがある</label>
                  <input type="checkbox" id="display18" disabled checked><label for="display18">生産性を改善したい・作業を効率化したい</label>
                  <input type="checkbox" id="display19" disabled><label for="display19">人材育成したい・人材確保したい</label>
                  <input type="checkbox" id="display20" disabled><label for="display20">品質を改善したい</label>
                  <input type="checkbox" id="display21" disabled><label for="display21">経営を改善したい・経営を革新したい</label>
                  <input type="checkbox" id="display22" disabled><label for="display22">起業スタートアップを支援してほしい</label>
                  <input type="checkbox" id="display23" disabled><label for="display23">設備や作業をIT化したい</label>
                  <input type="checkbox" id="display24" disabled><label for="display24">キャッシュレス化したい・会計ソフトを導入したい</label>
                  <input type="checkbox" id="display25" disabled checked><label for="display25">違う事業を始めたい</label>
                  <input type="checkbox" id="display26" disabled><label for="display26">違う事業に変更したい</label>
                  <input type="checkbox" id="display27" disabled><label for="display27">会社を譲りたい・事業を譲りたい</label>
                  <input type="checkbox" id="display28" disabled><label for="display28">会社を買いたい・事業を買いたい</label>
                  <input type="checkbox" id="display29" disabled checked><label for="display29">災害や突然の社会情勢変化に強い会社にしたい</label>
                  <input type="checkbox" id="display30" disabled><label for="display30">他の事業者と連携し新たな取組をしたい</label>
                  <input type="checkbox" id="display31" disabled><label for="display31">海外展開したい</label>
                  <input type="checkbox" id="display32" disabled><label for="display32">販路開拓したい</label>
                </div>
                <div>
                  <p class="t_center mt20 mb05"><b>その他</b></p>
                  <input type="checkbox" id="display33" disabled><label for="display33">その他</label>
                  <input type="checkbox" id="display34" disabled><label for="display34">連携相談</label>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>会社名<span>必須</span></dt>
              <dd>
                <input type="text" value="">
              </dd>
            </dl>
            <dl>
              <dt>業種<span>必須</span></dt>
              <dd>
                <div class="wrap">
                  <select class="w_300">
                    <option value="農業、林業">農業、林業</option>
                    <option value="漁業">漁業</option>
                    <option value="鉱業、採石業、砂利採取業">鉱業、採石業、砂利採取業</option>
                    <option value="建設業">建設業</option>
                    <option value="製造業">製造業</option>
                    <option value="電気・ガス・熱供給・水道業">電気・ガス・熱供給・水道業</option>
                    <option value="情報通信業">情報通信業</option>
                    <option value="運輸業、郵便業">運輸業、郵便業</option>
                    <option value="卸売業、小売業">卸売業、小売業</option>
                    <option value="金融業、保険業">金融業、保険業</option>
                    <option value="不動産業、物品賃貸業">不動産業、物品賃貸業</option>
                    <option value="学術研究、専門">学術研究、専門</option>
                    <option value="技術サービス業">技術サービス業</option>
                    <option value="宿泊業、飲食サービス業">宿泊業、飲食サービス業</option>
                    <option value="生活関連サービス業、娯楽業">生活関連サービス業、娯楽業</option>
                    <option value="教育、学習支援業">教育、学習支援業</option>
                    <option value="医療、福祉">医療、福祉</option>
                    <option value="複合サービス事業">複合サービス事業</option>
                    <option value="サービス業（他に分類されないもの）">サービス業（他に分類されないもの）</option>
                    <option value="公務（他に分類されるものを除く）">公務（他に分類されるものを除く）</option>
                    <option value="分類不能の産業">分類不能の産業</option>
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
              <dt>従業員規模<span>必須</span></dt>
              <dd>
                <div class="wrap">
                  <select class="w_150">
                    <option value="5人未満">5人未満</option>
                    <option value="5～9人">5～9人</option>
                    <option value="10～29人">10～29人</option>
                    <option value="30～99人">30～99人</option>
                    <option value="100～499人">100～499人</option>
                    <option value="500～999人">500～999人</option>
                    <option value="1,000人以上">1,000人以上</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>年商<span>必須</span></dt>
              <dd>
                <div class="wrap">
                  <select class="w_250">
                    <option value="5,000万円未満">5,000万円未満</option>
                    <option value="5,000万円以上3億円未満">5,000万円以上3億円未満</option>
                    <option value="3億円以上10億円未満">3億円以上10億円未満</option>
                    <option value="10億円以上">10億円以上</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>電話番号<span>必須</span></dt>
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
              <dt>担当名<span>必須</span></dt>
              <dd>
                <input type="text">
              </dd>
            </dl>
            <dl>
              <dt>役職<span>必須</span></dt>
              <dd>
                <input type="text">
              </dd>
            </dl>
            <dl>
              <dt>投資予定額</dt>
              <dd>
                <div class="wrap">
                  <select class="w_250">
                    <option value="未定">未定</option>
                    <option value="1,000万円未満">1,000万円未満</option>
                    <option value="1,000万円以上3,000万円未満">1,000万円以上3,000万円未満</option>
                    <option value="3,000万円以上5,000万円未満">3,000万円以上5,000万円未満</option>
                    <option value="5,000万円以上8,000万円未満">5,000万円以上8,000万円未満</option>
                    <option value="8,000万円以上">8,000万円以上</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>相談内容概略<span>必須</span><br>※100字以内</dt>
              <dd>
                <textarea maxlength="100"></textarea>
              </dd>
            </dl>
            <dl>
              <dt>相談内容詳細<span>必須</span></dt>
              <dd>
                <textarea cols="30" rows="5"></textarea>
              </dd>
            </dl>
            <dl>
              <dt>掲載期限<span>必須</span></dt>
              <dd>
                <p>2022/07/14</p>
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