<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><a href="../">HOME</a></li>
            <li><span>支援機関管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>支援機関管理一覧</span></h2>
        <div class="graph_form mt10 mb30">
          <div class="select_wrap">
            <p>支援機関情報CSV出力</p>
            <a href="javascript:void(0)" class="btn_blue" download="">ダウンロード</a>
          </div>
        </div>
        <form class="search_form">
          <div class="flex_wrap">
            <dl class="input_txt">
              <dt>支援機関名</dt>
              <dd>
                <input type="text">
              </dd>
            </dl>
            <dl class="input_txt">
              <dt>利用可否</dt>
              <dd>
                <input type="radio" id="koukai" name="koukai_cat" checked="checked">
                <label for="koukai">可</label>
                <input type="radio" id="hikoukai" name="koukai_cat">
                <label for="hikoukai">否</label>
              </dd>
            </dl>
          </div>
          <div class="submit_wrap">
            <div class="form_btn_blue"><span><input type="submit" value="検索"></span></div>
            <div class="cancel_btn"><button type="button">リセット</button></div>
          </div>
        </form>
        <div class="flex_btw_wrap">
          <div class="load_btn"><a href="javascript:void(0)"><span>表示の更新</span></a></div>
        </div>
        <div class="table_wrap">
          <div class="pager_style">
            <ul>
              <li class="prev"><a href="#">＜＜前の50件</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li class="on"><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li class="next"><a href="#">次の50件＞＞</a></li>
            </ul>
          </div>
          <table>
            <tbody>
              <tr>
                <th width="60">ID</th>
                <th width="60">利用可</th>
                <th width="60">請求有</th>
                <th width="100">登録日</th>
                <th width="460">支援機関名</th>
                <th width="90">回答履歴</th>
                <th width="90">請求情報</th>
                <th width="140"></th>
              </tr>
              <tr>
                <td>0050</td>
                <td><input type="checkbox" id="koukai50" class="display_btn"><label for="koukai50"></label></td>
                <td><input type="checkbox" id="display50" class="display_btn"><label for="display50"></label></td>
                <td>2022/07/14</td>
                <td>AA株式会社</td>
                <td><a href="history.html" class="eidt_btn table_btns">回答履歴</a></td>
                <td><a href="invoice.html" class="browsing_btn table_btns">請求情報</a></td>
                <td>
                  <a href="edit.html" class="eidt_btn table_btns">編集</a>
                  <span class="delete_btn table_btns">削除 </span>
                </td>
              </tr>
              <tr>
                <td>0049</td>
                <td><input type="checkbox" id="koukai49" class="display_btn"><label for="koukai49"></label></td>
                <td><input type="checkbox" id="display49" class="display_btn"><label for="display49"></label></td>
                <td>2022/03/25</td>
                <td>BB株式会社</td>
                <td><a href="history.html" class="eidt_btn table_btns">回答履歴</a></td>
                <td><a href="invoice.html" class="browsing_btn table_btns">請求情報</a></td>
                <td>
                  <a href="edit.html" class="eidt_btn table_btns">編集</a>
                  <span class="delete_btn table_btns">削除 </span>
                </td>
              </tr>
              <tr>
                <td>0048</td>
                <td><input type="checkbox" id="koukai48" class="display_btn"><label for="koukai48"></label></td>
                <td><input type="checkbox" id="display48" class="display_btn"><label for="display48"></label></td>
                <td>2022/02/03</td>
                <td>CC株式会社</td>
                <td><a href="history.html" class="eidt_btn table_btns">回答履歴</a></td>
                <td><a href="invoice.html" class="browsing_btn table_btns">請求情報</a></td>
                <td>
                  <a href="edit.html" class="eidt_btn table_btns">編集</a>
                  <span class="delete_btn table_btns">削除 </span>
                </td>
              </tr>
              <tr>
                <td>0047</td>
                <td><input type="checkbox" id="koukai47" class="display_btn"><label for="koukai47"></label></td>
                <td><input type="checkbox" id="display47" class="display_btn"><label for="display47"></label></td>
                <td>2022/02/01</td>
                <td>DD株式会社</td>
                <td><a href="history.html" class="eidt_btn table_btns">回答履歴</a></td>
                <td><a href="invoice.html" class="browsing_btn table_btns">請求情報</a></td>
                <td>
                  <a href="edit.html" class="eidt_btn table_btns">編集</a>
                  <span class="delete_btn table_btns">削除 </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </main>
  </div>
</template>
<script>
export default {
  layout: 'admin_auth'
}
</script>