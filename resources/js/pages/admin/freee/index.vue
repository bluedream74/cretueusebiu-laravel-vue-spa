<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>

            <li><span>会計freee CSV出力管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>会計freee CSV出力管理一覧</span></h2>
        <form class="graph_form">
          <div class="select_wrap">
            <p>CSV出力年月</p>
            <div class="months_select">
              <div class="wrap year">
                <select class="w_150">
                  <option value=""></option>
                  <option value="">2022</option>
                </select>
              </div>
              <span>年</span>
              <div class="wrap month">
                <select class="w_100">
                  <option value=""></option>
                  <option value="">1</option>
                  <option value="">2</option>
                  <option value="">3</option>
                  <option value="">4</option>
                  <option value="">5</option>
                  <option value="">6</option>
                  <option value="">7</option>
                  <option value="">8</option>
                  <option value="">9</option>
                  <option value="">10</option>
                  <option value="">11</option>
                  <option value="">12</option>
                </select>
              </div>
              <span>月</span>
            </div>
          </div>
          <div class="select_wrap">
            <p>請求情報CSV出力</p>
            <a href="javascript:void(0)" class="btn_blue" download="">ダウンロード</a>
          </div>
          <div class="select_wrap">
            <p>取引先情報CSV出力</p>
            <a href="javascript:void(0)" class="btn_blue" download="">ダウンロード</a>
          </div>
        </form>
      </div>
    </main>
  </div>
</template>
<script>
export default {
  layout: 'admin_auth',
	middleware: 'admin',
}
</script>