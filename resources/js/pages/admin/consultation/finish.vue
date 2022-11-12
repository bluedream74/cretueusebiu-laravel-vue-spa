<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><router-link :to="{ name: 'admin.consultant' }">事業者管理一覧</router-link></li>
            <li><span>事業者入力(完了)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>事業者入力(完了)</span></h2>
        <p class="finish_txt">事業者を登録しました。</p>
        <div class="btn_wrap">
          <div class="btn_blue"><router-link :to="{ name: 'admin.consultant' }"><span>一覧画面へ戻る</span></router-link></div>
          <div class="btn_blue btn_gry"><router-link :to="{ name: 'admin.dashboard' }"><span>メニュー画面へ戻る</span></router-link></div>
        </div>
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