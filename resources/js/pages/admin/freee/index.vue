<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>

            <li><span>会計freee CSV出力管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>会計freee CSV出力管理一覧</span></h2>
        <form class="graph_form">
          <div class="select_wrap">
            <p>CSV出力年月</p>
            <div class="months_select">
              <div class="wrap year">
                <select class="w_150" v-model="year">
                  <option value=""></option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                </select>
              </div>
              <span>年</span>
              <div class="wrap month">
                <select class="w_100" v-model="month">
                  <option :value="null"></option>
                  <option value="01" v-if="year != '2022'">1</option>
                  <option value="02" v-if="year != '2022'">2</option>
                  <option value="03" v-if="year != '2022'">3</option>
                  <option value="04" v-if="year != '2022'">4</option>
                  <option value="05" v-if="year != '2022'">5</option>
                  <option value="06" v-if="year != '2022'">6</option>
                  <option value="07" v-if="year != '2022'">7</option>
                  <option value="08" v-if="year != '2022'">8</option>
                  <option value="09" v-if="year != '2022'">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>
              </div>
              <span>月</span>
            </div>
          </div>
          <div class="select_wrap">
            <p>請求情報CSV出力</p>
            <a @click="downloadInovice" class="btn_blue">ダウンロード</a>
          </div>
          <div class="select_wrap">
            <p>取引先情報CSV出力</p>
            <a @click="downloadWithTransaction" class="btn_blue">ダウンロード</a>
          </div>
        </form>
      </div>
    </main>
  </div>
</template>
<script>
import moment from 'moment'
export default {
  layout: 'admin_auth',
	middleware: 'admin',
  data() {
    return {
      year: moment().format('YYYY'),
      month: moment().subtract(1, 'months').format('MM'),
    }
  },
  methods: {
    downloadInovice() {
        let newWindow = window.open();
        newWindow.location = 'https://' + window.location.hostname + `/admin/download_invoice_data?year=${this.year}&month=${this.month}`;
    
    },
    downloadWithTransaction() {
        let newWindow = window.open();
        newWindow.location = 'https://' + window.location.hostname + `/admin/download_with_transaction_data?year=${this.year}&month=${this.month}`;
    }
  }
}
</script>