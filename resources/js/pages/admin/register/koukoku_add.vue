<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><router-link :to="{ name: 'admin.register' }">支援機関管理一覧</router-link></li>
            <li><router-link :to="{ name: 'admin.register.invoice', query: { user_id: $route.query.user_id } }">AA株式会社 請求情報</router-link></li>
            <li><span>広告費入力</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>広告費入力(編集)</span></h2>
        <div class="edit_form">
            <dl>
              <dt>詳細<span>必須</span></dt>
              <dd>
                <input type="text" v-model="description">
              </dd>
            </dl>
            <dl>
              <dt>数量<span>必須</span></dt>
              <dd>
                <input type="text" class="w_100" v-model="amount">
              </dd>
            </dl>
            <dl>
              <dt>単位<span>必須</span></dt>
              <dd>
                <input type="text" class="w_100" v-model="unit">
              </dd>
            </dl>
            <dl>
              <dt>単価<span>必須</span></dt>
              <dd>
                <input type="text" class="w_100" v-model="price">
              </dd>
            </dl>
            <div class="submit_wrap">
              <div class="form_btn_blue"><span><input @click="addKoukoku" type="button" value="確認"></span></div>
            </div>
          </div>
      </div>

    </main>
  </div>
</template>
<script>
export default {
  layout: 'admin_auth',
  middleware: 'admin',
  data() {
    return {
      description: null,
      amount: null,
      unit: null,
      price: null
    }
  },
  methods: {
    async addKoukoku() {
      if (!this.description) {
        this.$swal('', '詳細を入力してください')
        return
      }

      if (!this.amount) {
        this.$swal('', '数量を入力してください')
        return
      }

      if (isNaN(this.amount)) {
        this.$swal('', '数量は数値で入力してください')
        return
      }
      
      if (!this.unit) {
        this.$swal('', '単位を入力してください')
        return
      }

      if (!this.price) {
        this.$swal('', '単価を入力してください')
        return
      }

      if (isNaN(this.price)) {
        this.$swal('', '単価は数値で入力してください')
        return
      }

      try {
        const { data } = await axios.post('/admin/add_koukoku', {
          user_id: this.$route.query.user_id,
          date: this.$route.query.date,
          description: this.description,
          amount: this.amount,
          unit: this.unit,
          price: this.price
        })
        this.$router.back()
      } catch (error) {
      }
    }
  }
}
</script>