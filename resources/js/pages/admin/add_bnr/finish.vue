<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><router-link :to="{ name: 'admin.add_bnr' }">バナー管理一覧</router-link></li>
            <li><span>バナー入力(完了)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>バナー入力(完了)</span></h2>
        <p class="finish_txt">バナーを登録しました。</p>
        <div class="btn_wrap">
          <div class="btn_blue"><a href="index.html"><span>一覧画面へ戻る</span></a></div>
          <div class="btn_blue btn_gry"><a href="../index.html"><span>メニュー画面へ戻る</span></a></div>
        </div>
      </div>
    </main>
  </div>
</template>
<script>
export default {
  
}
</script>