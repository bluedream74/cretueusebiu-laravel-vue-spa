<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a @click="backProc">お知らせ管理一覧</a></li>
            <li><span>お知らせ入力(完了)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>お知らせ入力(完了)</span></h2>
        <p class="finish_txt">お知らせを登録しました。</p>
        <div class="btn_wrap">
          <div class="btn_blue"><router-link :to="{ name: 'admin.news' }"><span>一覧画面へ戻る</span></router-link></div>
          <div class="btn_blue btn_gry"><a href="../index.html"><span>メニュー画面へ戻る</span></a></div>
        </div>
      </div>
    </main>
  </div>
</template>
<script>
export default {
  layout: 'admin_auth',
	middleware: 'admin',
  methods: {
    backProc() {
      this.$router.back()
    }
  }
}
</script>