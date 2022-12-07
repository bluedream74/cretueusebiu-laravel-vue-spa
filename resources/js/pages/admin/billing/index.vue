<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><span>課金額管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>課金額管理 (税抜きの金額で入力してください)</span></h2>
        <!-- <input type="text" class="datepicker" v-model="master.from"> -->
        <form class="edit_form" @submit.prevent="saveMaster" v-if="master">
            <dl>
              <dt>基本金額</dt>
              <dd><input type="text" class="w_150 mr05" v-model="master.price">円</dd>
            </dl>
            <dl>
              <dt>特殊金額</dt>
              <dd><input type="text" class="w_150 mr05" v-model="master.special_price">円</dd>
            </dl>
            <dl>
              <dt>特殊金額有効日</dt>
              <dd>
                <input type="text"  id="masterFrom" class="datepicker" :value="master.from">
                ～
                <input type="text" id="masterTo" class="datepicker" :value="master.to">
              </dd>
            </dl>
            <div class="submit_wrap">
              <div class="form_btn_blue"><span><input type="submit" value="更新"></span></div>
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
  mounted() {
    this.init()
  },
  data() {
    return {
      master: null
    }
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/admin/get_billing_data')
        this.master = data.master
        this.master.from = !!data.master.from ? moment(data.master.from, 'YYYY-MM-DD HH:mm:ss').format('YYYY/MM/DD') : null
        this.master.to = !!data.master.to ? moment(data.master.to, 'YYYY-MM-DD HH:mm:ss').format('YYYY/MM/DD') : null
        setTimeout(() => {
          $('.datepicker').datepicker({
            numberOfMonths:1,
          });
        }, 1000)
      } catch (error) {
      }
    },
    async saveMaster() {
      this.master.from = $('#masterFrom').val()
      this.master.to = $('#masterTo').val()
      if (!this.master.price || !this.master.special_price) {
        this.$swal('', '必須項目を入力してください')
        return
      }
      try {
        const { data } = await axios.post('/admin/save_master', this.master)
        this.$router.push({ name: 'admin.billing.finish' })        
      } catch (error) {
      }
    }
  }
}
</script>