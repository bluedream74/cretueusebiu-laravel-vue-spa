<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a @click="backProc">事業者管理一覧</a></li>
            <li><span>事業者入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>事業者入力(編集)</span></h2>
        <form class="edit_form" @submit.prevent="saveConsultant" v-if="!!consultant">
            <dl>
              <dt>ID</dt>
              <dd>{{ consultant.id }}</dd>
            </dl>
            <dl>
              <dt>公開・非公開<span>必須</span></dt>
              <dd>
                <input type="radio" id="koukai" name="koukai_cat" :checked="consultant.available == 1" @click="() => { consultant.available = 1 }">
                <label for="koukai">公開中</label>
                <input type="radio" id="hikoukai" name="koukai_cat" :checked="consultant.available == 0" @click="() => { consultant.available = 0 }">
                <label for="hikoukai">非公開</label>
              </dd>
            </dl>
            <dl>
              <dt>登録日時<span>必須</span></dt>
              <dd>
                <span>{{ consultant.created_at | dateFormat }}</span>
                <span class="ml80">{{ consultant.created_at | dateTimeFormat }}</span>
              </dd>
            </dl>
            <dl>
              <dt>相談内容<span>必須</span></dt>
              <dd>
                <div>
                  <p class="t_center mb05"><b>使いたい補助金や制度が決まっている方</b></p>
                  <div v-for="(item, index) in SYSTEM_CONFIRM" :key="index" style="display: inline-block;">
                    <input type="checkbox" :id="'display' + (index + 1)" :checked="system_confirms.includes(index)" @change="changeSystemConfirms($event, item, index)"><label :for="'display' + (index + 1)">{{ item }}</label>
                  </div>
                </div>
                <div>
                  <p class="t_center mt20 mb05"><b>該当の補助金や制度が不明な方</b></p>
                  <div v-for="(item, index) in SYSTEM_MISS" :key="index" style="display: inline-block;">
                    <input type="checkbox" :id="'display' + (index + 13)" :checked="system_misss.includes(index)" @change="changeSystemMisss($event, item, index)" ><label :for="'display' + (index + 13)">{{ item }}</label>
                  </div>
                </div>
                <div>
                  <p class="t_center mt20 mb05"><b>その他</b></p>
                  <div v-for="(item, index) in SYSTEM_OTHER" :key="index" style="display: inline-block;">
                    <input type="checkbox" :id="'display' + (index + 33)" :checked="system_others.includes(index)" @change="changeSystemOthers($event, item, index)" ><label :for="'display' + (index + 33)">{{ item }}</label>
                  </div>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>会社名<span>必須</span></dt>
              <dd>
                <input type="text" v-model="consultant.com_name">
              </dd>
            </dl>
            <dl>
              <dt>業種<span>必須</span></dt>
              <dd>
                <div class="wrap">
                  <select class="w_300" v-model="consultant.job">
                    <option :value="index" v-for="(item, index) in JOBS" :key="index">{{ item }}</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>会社所在地<span>必須</span></dt>
              <dd>
                〒<input type="text" v-model="consultant.zipcode" @change="changeZip" name="" class="w_200 ml05">
                <div class="wrap ml20">
                  <select class="w_100" v-model="consultant.prefecture">
                    <option v-for="(item, index) in PREFECTURES" :key="index" :value="item">{{ item }}</option>
                  </select>
                </div>
                <p class="mt05">市区町村・番地</p>
                <input type="text" v-model="consultant.city">
                <p class="mt05">建物名・部屋番号など</p>
                <input type="text" v-model="consultant.building">
              </dd>
            </dl>
            <dl>
              <dt>従業員規模<span>必須</span></dt>
              <dd>
                <div class="wrap">
                  <select class="w_150" v-model="consultant.amount">
                    <option :value="index" v-for="(item, index) in AMOUNTS" :key="index">{{ item }}</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>年商<span>必須</span></dt>
              <dd>
                <div class="wrap">
                  <select class="w_250" v-model="consultant.income">
                    <option :value="index" v-for="(item, index) in PRICES" :key="index">{{ item }}</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>電話番号<span>必須</span></dt>
              <dd>
                <input type="text" class="w_200" v-model="consultant.telephone">
              </dd>
            </dl>
            <dl>
              <dt>メールアドレス<span>必須</span></dt>
              <dd>
                <input type="text" v-model="consultant.email">
              </dd>
            </dl>
            <dl>
              <dt>担当名<span>必須</span></dt>
              <dd>
                <input type="text" v-model="consultant.tanto_name">
              </dd>
            </dl>
            <dl>
              <dt>役職<span>必須</span></dt>
              <dd>
                <input type="text" v-model="consultant.role_name">
              </dd>
            </dl>
            <dl>
              <dt>投資予定額</dt>
              <dd>
                <div class="wrap">
                  <select class="w_250" v-model="consultant.price">
                    <option :value="null">未定</option>
                    <option v-for="(item, index) in SUPPORT_PRICES" :key="index" :value="index">{{ item }}</option>
                  </select>
                </div>
              </dd>
            </dl>
            <dl>
              <dt>相談内容概略<span>必須</span><br>※100字以内</dt>
              <dd>
                <textarea maxlength="100" v-model="consultant.message_title"></textarea>
              </dd>
            </dl>
            <dl>
              <dt>相談内容詳細<span>必須</span></dt>
              <dd>
                <textarea cols="30" rows="5" v-model="consultant.message_content"></textarea>
              </dd>
            </dl>
            <dl>
              <dt>掲載期限<span>必須</span></dt>
              <dd>
                <p>{{ consultant.expired_at | dateFormat }}</p>
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
import moment from 'moment'
var postal_code = require('japan-postal-code')
import { JOBS, SYSTEM_OTHER, SYSTEM_MISS, SYSTEM_CONFIRM, AMOUNTS, PRICES, PREFECTURES, SUPPORT_PRICES } from '../../../const'
export default {
  layout: 'admin_auth',
  middleware: 'admin',
  data() {
    return {
      JOBS: JOBS,
			SYSTEM_OTHER: SYSTEM_OTHER,
			SYSTEM_MISS: SYSTEM_MISS,
			SYSTEM_CONFIRM: SYSTEM_CONFIRM,
			AMOUNTS: AMOUNTS,
			PRICES: PRICES,
			PREFECTURES: PREFECTURES,
			SUPPORT_PRICES: SUPPORT_PRICES,

      consultant: null,
      system_confirms: [],
			system_misss: [],
			system_others: [],
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/admin/get_consultant_info', {
          id: this.$route.query.id
        })
        this.consultant = data.consultant
        this.system_confirms = data.consultant.confirms.map(item => {
          return item.confirm_id
        })
        this.system_misss = data.consultant.misss.map(item => {
          return item.miss_id
        })
        this.system_others = data.consultant.others.map(item => {
          return item.other_id
        })
      } catch (error) {
      }
    },
    saveConsultant() {
      if (this.system_confirms.length + this.system_misss.length + this.system_others.length == 0) {
				this.$swal('', '相談内容を選択してください')
				return
			}

			if (!this.consultant.com_name) {
				this.$swal('', '会社名を入力してください')
				return
			}

			if (!this.consultant.job) {
				this.$swal('', '業種を選択してください')
				return
			}

			if (!this.consultant.zipcode) {
				this.$swal('', '郵便番号を入力してください')
				return
			}

			if (!this.consultant.prefecture) {
				this.$swal('', '都道府県を選択してください')
				return
			}

			if (!this.consultant.city) {
				this.$swal('', '市区町村番地を入力してください')
				return
			}

			if (!this.consultant.amount) {
				this.$swal('', '従業員規模を選択してください')
				return
			}

			if (!this.consultant.income) {
				this.$swal('', '年商を選択してください')
				return
			}

			if (!this.consultant.telephone) {
				this.$swal('', '電話番号を入力してください')
				return
			}

			if (!this.consultant.email) {
				this.$swal('', 'メールアドレスを入力してください')
				return
			}

      if (!this.consultant.tanto_name) {
				this.$swal('', '役職を入力してください')
				return
			}

			if (!this.consultant.tanto_name) {
				this.$swal('', '担当者氏名を入力してください')
				return
			}

			if (!this.consultant.message_title) {
				this.$swal('', '相談内容概略を入力してください')
				return
			}

			if (!this.consultant.message_content) {
				this.$swal('', '相談内容詳細を入力してください')
				return
			}

      localStorage.setItem('system_confirms', this.system_confirms.join('、'))
			localStorage.setItem('system_misss', this.system_misss.join('、'))
			localStorage.setItem('system_others', this.system_others.join('、'))
			localStorage.setItem('com_name', this.consultant.com_name)
			localStorage.setItem('job', this.consultant.job)
			localStorage.setItem('zipcode', this.consultant.zipcode)
			localStorage.setItem('prefecture', this.consultant.prefecture)
			localStorage.setItem('city', this.consultant.city)
			localStorage.setItem('building', this.consultant.building)
			localStorage.setItem('amount', this.consultant.amount)
			localStorage.setItem('income', this.consultant.income)
			localStorage.setItem('telephone', this.consultant.telephone)
			localStorage.setItem('fax', this.consultant.fax)
			localStorage.setItem('email', this.consultant.email)
			localStorage.setItem('tanto_name', this.consultant.tanto_name)
			localStorage.setItem('department_name', this.consultant.department_name)
			localStorage.setItem('role_name', this.consultant.role_name)
			localStorage.setItem('price', this.consultant.price)
      localStorage.setItem('created_at', moment(this.consultant.created_at).format('YYYY/MM/DD HH:mm'))
      localStorage.setItem('available', this.consultant.available)
			localStorage.setItem('message_title', this.consultant.message_title)
			localStorage.setItem('message_content', this.consultant.message_content)
			localStorage.setItem('expired_at', moment(this.consultant.expired_at).format('YYYY-MM-DD'))

      this.$router.push({ name: 'admin.consultant.check', query: { id: this.$route.query.id } })
    },
    backProc() {
      this.$router.back()
    },
    changeSystemConfirms(event, item, index) {
			if (event.target.checked == true) {
				this.system_confirms.push(index)
			} else {
				let temp = this.system_confirms.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.system_confirms = temp
			}
		},
    changeSystemMisss(event, item, index) {
			if (event.target.checked == true) {
				this.system_misss.push(index)
			} else {
				let temp = this.system_misss.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.system_misss = temp
			}
		},
		changeSystemOthers(event, item, index) {
			if (event.target.checked == true) {
				this.system_others.push(index)
			} else {
				let temp = this.system_others.slice()
				const idex = temp.indexOf(index)
				temp.splice(idex, 1)
				this.system_others = temp
			}
		},
    async changeZip() {
			if (!this.consultant.zipcode || this.consultant.zipcode.length != 7) {
        this.$swal('', '郵便番号の形式が違います')
        return
      }

      let self = this
      postal_code.get(this.zipcode, function(address) {
        self.consultant.prefecture = address.prefecture
        self.consultant.city = address.city + address.area
      })
		},
  }
}
</script>