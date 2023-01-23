<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a href="index.html">バナー管理一覧</a></li>
            <li><span>バナー入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>バナー入力(編集)</span></h2>
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
            <dt>バナー名<span>必須</span></dt>
            <dd><p>株式会社AA広告PR</p></dd>
          </dl>
          <dl>
            <dt>公開期間<span>必須</span></dt>
            <dd>
              <p>2022/05/31～2022/08/31</p>
            </dd>
          </dl>
          <dl>
            <dt>バナー画像<span>必須</span></dt>
            <dd>
              <p><img src="/admin/img/img_add.png"></p>
            </dd>
          </dl>
          <dl>
            <dt>リンク先URL<span>必須</span></dt>
            <dd><p>https://www.google.com/</p></dd>
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
  layout: 'admin_auth',
	middleware: 'admin',
}
</script>