<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a @click="backProc">バナー管理一覧</a></li>
            <li><span>バナー入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>バナー入力(編集)</span></h2>
        <form class="edit_form" action="check.html">
            <dl>
              <dt>ID</dt>
              <dd>1</dd>
            </dl>
            <dl>
              <dt>公開・非公開<span>必須</span></dt>
              <dd>
                <input type="radio" id="honbu" name="fc_cat" checked="checked">
                <label for="honbu">公開</label>
                <input type="radio" id="fc" name="fc_cat">
                <label for="fc">非公開</label>
              </dd>
            </dl>
            <dl>
              <dt>バナー名<span>必須</span></dt>
              <dd><input type="text" value=""></dd>
            </dl>
            <dl>
              <dt>公開期間<span>必須</span></dt>
              <dd>
                <input type="text" class="datepicker">
                ～
                <input type="text" class="datepicker">
              </dd>
            </dl>
            <dl>
              <dt>バナー画像<span>必須</span></dt>
              <dd>
                <label for="photo"><input type="file" name="" id="photo"></label>
              </dd>
            </dl>
            <dl>
              <dt>リンク先URL<span>必須</span></dt>
              <dd><input type="text" value=""></dd>
            </dl>
            <div class="submit_wrap">
              <div class="form_btn_blue"><span><input type="submit" value="変更"></span></div>
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