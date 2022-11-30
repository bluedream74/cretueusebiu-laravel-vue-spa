<template>
  <div id="top" class="home">
    <main>
      <div class="sitewrap">
        <div class="col_2 fix">
          <div class="col_child">
            <div class="menu_list">
              <h2 class="h_style07"><span>支援機関管理</span></h2>
              <ul>
                <li><router-link :to="{ name: 'admin.register' }"><span>新規登録・編集</span></router-link></li>
              </ul>
            </div>
            <div class="menu_list">
              <h2 class="h_style07"><span>お知らせ</span></h2>
              <ul>
                <li><router-link :to="{ name: 'admin.news' }"><span>新規登録・編集</span></router-link></li>
              </ul>
            </div>
            <div class="menu_list">
              <h2 class="h_style07"><span>広告バナー管理</span></h2>
              <ul>
                <li><router-link :to="{ name: 'admin.add_bnr' }"><span>新規登録・編集</span></router-link></li>
              </ul>
            </div>
            <div class="menu_list">
              <h2 class="h_style07"><span>CSV出力</span></h2>
              <ul>
                <li><router-link :to="{ name: 'admin.freee' }"><span>新規登録・編集</span></router-link></li>
              </ul>
            </div>
          </div>
          <div class="col_child">
            <div class="menu_list">
              <h2 class="h_style07"><span>事業者管理</span></h2>
              <ul>
                <li><router-link :to="{ name: 'admin.consultant' }"><span>新規登録・編集</span></router-link></li>
              </ul>
            </div>
            <div class="menu_list">
              <h2 class="h_style07"><span>お問い合わせ管理</span></h2>
              <ul>
                <li><router-link :to="{ name: 'admin.contact' }"><span>新規登録・編集</span></router-link></li>
              </ul>
            </div>
            <div class="menu_list">
              <h2 class="h_style07"><span>課金額管理</span></h2>
              <ul>
                <li><router-link :to="{ name: 'admin.billing' }" href="billing/index.html"><span>新規登録・編集</span></router-link></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>
<script>
export default {
  layout: 'admin_auth',
  middleware: 'admin'
}
</script>