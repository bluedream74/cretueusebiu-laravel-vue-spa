<template>
  <div class="login">
    <div class="sitewrap">
      <div class="login_wrap">
        <h1 class="tit"><img src="img/logo_top.png" alt="補助金支援.COMのロゴ"></h1>
        <form class="login_form" action="index.html">
          <dl>
            <dt>ID</dt>
            <dd><input type="text"></dd>
          </dl>
          <dl>
            <dt>PW</dt>
            <dd><input type="text"></dd>
          </dl>
          <div class="form_btn_blue ico_login"><span><input type="submit" value="ログイン"></span></div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  layout: 'admin_guest',
  middleware: 'guest'
}
</script>