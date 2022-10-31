<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><router-link :to="{ name: 'admin.register' }">支援機関管理一覧</router-link></li>
            <li><span>AA株式会社 請求情報</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>AA株式会社 請求情報一覧</span></h2>
        <div class="table_wrap">
          <!-- <div class="pager_style">
            <ul>
              <li class="prev"><a href="#">＜＜前の50件</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li class="on"><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li class="next"><a href="#">次の50件＞＞</a></li>
            </ul>
          </div> -->
          <table>
            <tbody>
              <tr>
                <th width="200">請求月</th>
                <th width="200">利用件数</th>
                <th width="200">金額</th>
                <th width="200">広告金額</th>
                <th width="100">広告費入力</th>
                <th width="90">請求書発行</th>
              </tr>
              <tr v-for="(item, index) in kakins" :key="index">
                <td>{{ item.date }}</td>
                <td>{{ item.amount }}件</td>
                <td>￥{{ item.amount * 500 | moneyFormat }}</td>
                <td>￥{{ !!item.koukoku ? (item.koukoku.price) : '' }}</td>
                <td><router-link :to="{ name: 'admin.register.koukoku_add', query: { user_id: $route.query.user_id, date: item.date } }" class="eidt_btn table_btns">広告費入力</router-link></td>
                <td><router-link :to="{ name: 'admin.register.invoice_pdf', query: { user_id: $route.query.user_id, date: item.date, price: (item.amount * 500 + (!!item.koukoku ? item.koukoku.price : 0)), amount: item.amount, koukoku_amount: (!!item.koukoku ? item.koukoku.amount : 0), koukoku_unit: (!!item.koukoku ? item.koukoku.unit : ''), koukoku_price: (!!item.koukoku ? item.koukoku.price: 0) } }" target="_blank" class="browsing_btn table_btns">PDF出力</router-link></td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </main>
  </div>
</template>
<script>
export default {
  layout: 'admin_auth',
  middleware: 'admin',
  mounted() {
    this.init()
  },
  data() {
    return {
      kakins: []
    }
  },
  methods: {
    async init() {
      const { data } = await axios.post('/admin/get_register_invoices', {
        user_id: this.$route.query.user_id
      })
      let temp = []
      let temp1 = ['2022年10月']
      temp1.forEach(item => {
        let filter = data.kakins.filter(it => {
          return moment(it.created_at).format('YYYY年MM月') == item
        })
        let koukoku_filter = data.koukokus.find(it => {
          return item == it.date
        })
        temp.push({
          amount: filter.length,
          date: item,
          koukoku: koukoku_filter
        })
      })
      this.kakins = temp
    }
  }
}
</script>