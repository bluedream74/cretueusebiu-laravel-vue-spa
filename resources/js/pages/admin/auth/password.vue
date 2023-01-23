<template>
  <div class="login">
    <div class="sitewrap">
      <div class="login_wrap">
        <form class="login_form" action="password_finish.html">
          <dl>
            <dt></dt>
            <dd>
              <p>新規パスワード</p>
              <input type="text">
            </dd>
          </dl>
          <dl>
            <dt></dt>
            <dd>
              <p>新規パスワード(確認用)</p>
              <input type="text">
            </dd>
          </dl>
          <div class="form_btn_blue"><span><input type="submit" value="確定"></span></div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  layout: 'admin_guest'
}
</script>