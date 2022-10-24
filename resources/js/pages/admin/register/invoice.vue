<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><router-link :to="{ name: 'admin.register' }">支援機関管理一覧</router-link></li>
            <li><span>AA株式会社 請求情報</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>AA株式会社 請求情報一覧</span></h2>
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
                <th width="200">請求月</th>
                <th width="200">利用件数</th>
                <th width="200">金額</th>
                <th width="200">広告金額</th>
                <th width="100">広告費入力</th>
                <th width="90">請求書発行</th>
              </tr>
              <tr>
                <td>0050</td>
                <td>2022年7月</td>
                <td>3件</td>
                <td>￥1,500</td>
                <td>￥60,000</td>
                <td><a href="add.html" class="eidt_btn table_btns">広告費入力</a></td>
                <td></td>
              </tr>
              <tr>
                <td>0049</td>
                <td>2022年6月</td>
                <td>10件</td>
                <td>￥5,000</td>
                <td></td>
                <td><a href="add.html" class="eidt_btn table_btns">広告費入力</a></td>
                <td><a href="pdf.html" target="_blank" class="browsing_btn table_btns">PDF出力</a></td>
              </tr>
              <tr>
                <td>0048</td>
                <td>2022年5月</td>
                <td>15件</td>
                <td>￥7,500</td>
                <td></td>
                <td><a href="add.html" class="eidt_btn table_btns">広告費入力</a></td>
                <td><a href="pdf.html" target="_blank" class="browsing_btn table_btns">PDF出力</a></td>
              </tr>
              <tr>
                <td>0047</td>
                <td>2022年4月</td>
                <td>10件</td>
                <td>￥5,000</td>
                <td></td>
                <td><a href="add.html" class="eidt_btn table_btns">広告費入力</a></td>
                <td><a href="pdf.html" target="_blank" class="browsing_btn table_btns">PDF出力</a></td>
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
  
}
</script>