<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><span>課金額管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>課金額管理 (税抜きの金額で入力してください)</span></h2>
        <form class="edit_form" action="finish.html">
            <dl>
              <dt>基本金額</dt>
              <dd><input type="text" class="w_150 mr05">円</dd>
            </dl>
            <dl>
              <dt>特殊金額</dt>
              <dd><input type="text" class="w_150 mr05">円</dd>
            </dl>
            <dl>
              <dt>特殊金額有効日</dt>
              <dd><input type="text" class="datepicker"><span class="ml05 mr05">～</span><input type="text" class="datepicker"></dd>
            </dl>
            <div class="submit_wrap">
              <div class="form_btn_blue"><span><input type="submit" value="更新"></span></div>
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