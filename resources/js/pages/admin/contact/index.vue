<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><span>お問い合わせ管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>お問い合わせ管理一覧</span></h2>
        <form class="graph_form">
          <div class="select_wrap">
            <p>お問い合わせCSVダウンロード</p>
            <a @click="downloadCSV" class="btn_blue">ダウンロード</a>
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
  mounted() {
  },
  methods: {
    downloadCSV() {
      let newWindow = window.open();
      newWindow.location = 'https://' + window.location.hostname + `/admin/download_contact_csv`;
    }
  }
}
</script>