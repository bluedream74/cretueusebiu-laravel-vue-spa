<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><span>事業者管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>事業者管理一覧</span></h2>
        <div class="graph_form mt10 mb30">
          <div class="select_wrap">
            <p>事業者情報CSV出力</p>
            <a href="javascript:void(0)" class="btn_blue" download="">ダウンロード</a>
          </div>
        </div>
        <form class="search_form">
          <div class="flex_wrap">
            <dl class="date">
              <dt>登録日</dt>
              <dd>
                <input type="text" class="datepicker">
                ～
                <input type="text" class="datepicker">
              </dd>
            </dl>
            <dl class="input_txt">
              <dt>公開・非公開</dt>
              <dd>
                <input type="radio" id="koukai" name="koukai_cat" checked="checked">
                <label for="koukai">公開中</label>
                <input type="radio" id="hikoukai" name="koukai_cat">
                <label for="hikoukai">非公開</label>
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
                <th width="40">表示</th>
                <th width="100">登録日</th>
                <th width="500">会社名</th>
                <th width="140"></th>
              </tr>
              <tr>
                <td>0050</td>
                <td><input type="checkbox" id="display50" class="display_btn"><label for="display50"></label></td>							<td>2022/07/14</td>
                <td>AA株式会社</td>
                <td>
                  <router-link :to="{ name: 'admin.consultant.edit' }" class="eidt_btn table_btns">編集</router-link>
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