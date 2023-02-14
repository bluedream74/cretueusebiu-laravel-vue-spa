<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><router-link :to="{ name: 'admin.register' }">支援機関管理一覧</router-link></li>
            <li><span>支援機関入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>支援機関入力(編集)</span></h2>
        <form class="edit_form" v-if="!!user_info" key="" @submit.prevent="updateProc">
            <dl>
              <dt>ID</dt>
              <dd>{{ !!user_info ? user_info.id : '' }}</dd>
            </dl>
            <dl>
              <dt>利用可否<span>必須</span></dt>
              <dd>
                <input type="radio" id="koukai" name="koukai_cat" :checked="user_info.available == 1" @click="() => { user_info.available = 1 }">
                <label for="koukai">可</label>
                <input type="radio" id="hikoukai" name="koukai_cat" :checked="user_info.available == 0" @click="() => { user_info.available = 0 }">
                <label for="hikoukai">否</label>
              </dd>
            </dl>
            <dl>
              <dt>請求有無<span>必須</span></dt>
              <dd>
                <input type="radio" id="invoice" name="invoice_cat" :checked="user_info.need_pay == 1" @click="() => { user_info.need_pay = 1 }">
                <label for="invoice">有</label>
                <input type="radio" id="invoice_no" name="invoice_cat" :checked="user_info.need_pay == 0" @click="() => { user_info.need_pay = 0 }">
                <label for="invoice_no">無</label>
              </dd>
            </dl>
            <dl>
              <dt>初回登録日</dt>
              <dd v-if="user_info">
                <span>{{ user_info.created_at | dateFormat }}</span>
              </dd>
            </dl>
            <dl>
              <dt>認定支援機関ID番号<span>必須</span></dt>
              <dd>
                <input type="text" class="w_150" v-model="user_info.kikan_id">
              </dd>
            </dl>
            <dl>
              <dt>会社名<span>必須</span></dt>
              <dd>
                <input type="text" v-model="user_info.com_name">
                <p class="mt05">カナ</p>
                <input type="text" v-model="user_info.com_huri_name">
              </dd>
            </dl>
            <dl>
              <dt>担当名</dt>
              <dd>
                <input type="text" v-model="user_info.tanto_name">
              </dd>
            </dl>
            <dl>
              <dt>部署名<span>必須</span></dt>
              <dd>
                <input type="text" v-model="user_info.department_name">
              </dd>
            </dl>
            <dl>
              <dt>役職名<span>必須</span></dt>
              <dd>
                <input type="text" v-model="user_info.role_name">
              </dd>
            </dl>
            <dl>
              <dt>法人／個人事業主<span>必須</span></dt>
              <dd>
                <input type="radio" id="corporation" name="registration_cat" :checked="user_info.is_personal == 0" @click="user_info.is_personal = 0">
                <label for="corporation">法人</label>
                <input type="radio" id="freelance" name="registration_cat" :checked="user_info.is_personal == 1" @click="user_info.is_personal = 1">
                <label for="freelance">個人事業主</label>
              </dd>
            </dl>
            <dl>
              <dt>種別<span>必須</span></dt>
              <dd>
                <div class="wrap">
                  <select class="w_200" v-model="user_info.kind">
                    <option v-for="(item, index) in JOB_KINDS" :key="index" :value="index">{{item}}</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>会社所在地<span>必須</span></dt>
              <dd>
                〒<input type="text" name="" v-model="user_info.zipcode" class="w_200 ml05">
                <div class="wrap ml20">
                  <select class="w_100" v-model="user_info.prefecture">
                    <option :value="null">--</option>
                    <option v-for="(item, index) in PREFECTURES" :key="index" :value="item">{{ item }}</option>
                  </select>
                </div>
                <p class="mt05">市区町村・番地</p>
                <input type="text" v-model="user_info.city">
                <p class="mt05">建物名・部屋番号など</p>
                <input type="text" v-model="user_info.building">
              </dd>
            </dl>
            <dl>
              <dt>電話番号</dt>
              <dd>
                <input type="text" class="w_200" v-model="user_info.telephone">
              </dd>
            </dl>
            <dl>
              <dt>FAX</dt>
              <dd>
                <input type="text" class="w_200" v-model="user_info.fax">
              </dd>
            </dl>
            <dl>
              <dt>メールアドレス<span>必須</span></dt>
              <dd>
                <input type="text" v-model="user_info.email">
              </dd>
            </dl>
            <dl>
              <dt>PRポイント</dt>
              <dd>
                <textarea cols="30" rows="5" v-model="user_info.introduction"></textarea>
              </dd>
            </dl>
            <dl>
              <dt>支援可能内容<span>必須</span></dt>
              <dd>
                <div>
                  <span v-for="(item, index) in CONTENTS" :key="index" class="cell_item">
                    <input type="checkbox" :id="'display' + (index + 1)" :value="index" :checked="available_contents.includes(index)" @change="changeContent($event, item, index)"><label :for="'display' + (index + 1)">{{ item }}</label>
                  </span>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>支援可能業種<span>必須</span></dt>
              <dd>
                <div>
                  <span v-for="(item, index) in JOBS" :key="index" class="cell_item">
                    <input type="checkbox" :id="'job' + (index + 1)" :value="index" :checked="available_jobs.includes(index)" @change="changeJob($event, item, index)"><label :for="'job' + (index + 1)">{{ item }}</label>
                  </span>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>支援可能年商<span>必須</span></dt>
              <dd>
                <div>
                  <span v-for="(item, index) in PRICES" :key="index" class="cell_item">
                    <input type="checkbox" :id="'price' + (index + 1)" :value="index" :checked="available_prices.includes(index)" @change="changePrice($event, item, index)"><label :for="'price' + (index + 1)">{{ item }}</label>
                  </span>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>支援可能従業員規模<span>必須</span></dt>
              <dd>
                <div>
                  <span v-for="(item, index) in AMOUNTS" :key="index" class="cell_item">
                    <input type="checkbox" :id="'amount' + (index + 1)" :value="index" :checked="available_amounts.includes(index)" @change="changeAmount($event, item, index)"><label :for="'amount' + (index + 1)">{{ item }}</label>
                  </span>
                </div>
              </dd>
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
import { JOB_KINDS, CONTENTS, JOBS, PRICES, AMOUNTS, PREFECTURES } from '../../../const';
export default {
  layout: 'admin_auth',
  middleware: 'admin',
  data() {
    return {
      JOB_KINDS: JOB_KINDS,
			CONTENTS: CONTENTS,
			JOBS: JOBS,
			PRICES: PRICES,
			AMOUNTS: AMOUNTS,
			PREFECTURES,

      kikan_id: null,
      available: 1,
      need_pay: 1,
			com_name: null,
			com_huri_name: null,
			tanto_name: null,
			department_name: null,
			role_name: null,
			is_personal: 0,
			kind: null,
			zipcode: null,
			prefecture: null,
			city: null,
			building: null,
			telephone: null,
			fax: null,
			email: null,
			password: null,
			introduction: null,
			available_contents: [],
			available_jobs: [],
			available_prices: [],
			available_amounts: [],
      user_info: null
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/admin/get_user_info', {
          user_id: this.$route.query.user_id
        })
        this.user_info = data.user_info
        this.kikan_id = data.user_info.kikan_id
        this.available_contents = data.available_contents.map(item => {
          return item.content_id
        })
        this.available_jobs = data.available_jobs.map(item => {
          return item.job_id
        })
        this.available_amounts = data.available_amounts.map(item => {
          return item.amount_id
        })
        this.available_prices = data.available_prices.map(item => {
          return item.price_id
        })
      } catch (error) {
      }
    },

    async updateProc() {
      console.log(this.user_info, 'this.user_info123')
      if (!this.user_info.kikan_id) {
				this.$swal('', '認定支援機関ID番号を入力してください')
				return
			}
			if (this.user_info.kikan_id.length != 12) {
				this.$swal('', '桁数は12桁となります')
				return
			}

			if (this.user_info.com_name == null) {
				this.$swal('', '会社名を入力してください')
				return
			}

			if (this.user_info.com_huri_name == null) {
				this.$swal('', '会社名(フリガナ)を入力してください')
				return
			}

			if (this.user_info.tanto_name == null) {
				this.$swal('', '担当者氏名を入力してください')
				return
			}

			if (this.user_info.kind == null) {
				this.$swal('', '種別を選択してください')
				return
			}

			if (this.user_info.zipcode == null) {
				this.$swal('', '会社所在地の郵便番号を入力してください')
				return
			}

			if (this.user_info.prefecture == null) {
				this.$swal('', '会社所在地の都道府県を選択してください')
				return
			}

			if (this.user_info.city == null) {
				this.$swal('', '市区町村番地を入力してください')
				return
			}

      // if (this.user_info.telephone == null) {
			// 	this.$swal('', '電話番号を入力してください')
			// 	return
			// }

			if (this.user_info.email == null) {
				this.$swal('', 'メールアドレスを入力してください')
				return
			}

			if (this.user_info.password == null) {
				this.$swal('', 'マイページパスワードを入力してください')
				return
			}

			if (this.available_contents.length == 0) {
				this.$swal('', '支援可能内容を設定してください')
				return
			}

			if (this.available_jobs.length == 0) {
				this.$swal('', '支援可能業種を設定してください')
				return
			}

			if (this.available_prices.length == 0) {
				this.$swal('', '支援可能年商を設定してください')
				return
			}

			if (this.available_amounts.length == 0) {
				this.$swal('', '支援可能従業員規模を設定してください')
				return
			}

      const { data } = await axios.post('/admin/user_info_edit', {
        kikan_id: this.user_info.kikan_id,
        com_name: this.user_info.com_name,
        com_huri_name: this.user_info.com_huri_name,
        tanto_name: this.user_info.tanto_name,
        department_name: this.user_info.department_name,
        role_name: this.user_info.role_name,
        is_personal: this.user_info.is_personal,
        kind: this.user_info.kind,
        zipcode: this.user_info.zipcode,
        prefecture: this.user_info.prefecture,
        city: this.user_info.city,
        building: this.user_info.building,
        telephone: this.user_info.telephone,
        fax: this.user_info.fax,
        email: this.user_info.email,
        introduction: this.user_info.introduction,
        available_contents: this.available_contents,
        available_jobs: this.available_jobs,
        available_prices: this.available_prices,
        available_amounts: this.available_amounts,
        user_id: this.user_info.id,
        available: this.user_info.available,
        need_pay: this.user_info.need_pay
      })
      this.$router.back()
    },
    
    changeContent(event, content, index) {
			if (event.target.checked == true) {
				this.available_contents.push(index)
			} else {
				let temp = this.available_contents.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_contents = temp
			}
		},
    changeJob(event, job, index) {
			if (event.target.checked == true) {
				this.available_jobs.push(index)
			} else {
				let temp = this.available_jobs.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_jobs = temp
			}
		},
		changePrice(event, price, index) {
			if (event.target.checked == true) {
				this.available_prices.push(index)
			} else {
				let temp = this.available_prices.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_prices = temp
			}
		},
		changeAmount(event, amount, index) {
			if (event.target.checked == true) {
				this.available_amounts.push(index)
			} else {
				let temp = this.available_amounts.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.available_amounts = temp
			}
		},
  }
}
</script>
<style lang="scss" scoped>
.cell_item {
  margin-bottom: 4px;
  display: inline-block;
}
</style>