<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a @click="backProc">お知らせ管理一覧</a></li>
            <li><span>お知らせ入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>お知らせ入力(編集)</span></h2>
        <form class="edit_form" action="finish.html">
          <dl>
            <dt>ID</dt>
            <dd>1</dd>
          </dl>
          <dl>
            <dt>公開・非公開<span>必須</span></dt>
            <dd>
              <p>公開</p>
            </dd>
          </dl>
          <dl>
            <dt>公開期間<span>必須</span></dt>
            <dd>
              <p>2022/05/31～2022/08/31</p>
            </dd>
          </dl>
          <dl>
            <dt>タイトル<span>必須</span></dt>
            <dd><p>タイトル</p></dd>
          </dl>
          <dl>
            <dt>URL</dt>
            <dd><p>https://www.google.com/?hl=ja</p></dd>
          </dl>
          <dl>
            <dt>PDF</dt>
            <dd>
              <p>ファイル名</p>
              <p>file.pdf</p>
            </dd>
          </dl>
          <dl>
            <dt>本文</dt>
            <dd>
              本文が入ります。
            </dd>
          </dl>
          <div class="submit_wrap">
            <div class="cancel_btn"><button type="button">戻る</button></div>
            <div class="form_btn_blue"><span><input type="submit" value="登録する"></span></div>
          </div>
        </form>
      </div>
    </main>
  </div>
</template>
<script>
export default {
  methods: {
    backProc() {
      this.$router.back()
    }
  }
}
</script>