<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><router-link :to="{ name: 'admin.consultant' }">事業者管理一覧</router-link></li>
            <li><span>事業者入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>事業者入力(編集)</span></h2>
        <form class="edit_form" @submit.prevent="sendContent">
          <dl>
            <dt>ID</dt>
            <dd>{{ $route.query.id }}</dd>
          </dl>
          <dl>
            <dt>公開・非公開<span>必須</span></dt>
            <dd>
              <p>{{ available == 1 ? '公開' : '非公開' }}</p>
            </dd>
          </dl>
          <dl>
            <dt>登録日時<span>必須</span></dt>
            <dd>
              <span>{{ created_at }}</span>
            </dd>
          </dl>
          <dl>
            <dt>相談内容<span>必須</span></dt>
            <dd>
              <div>
                <p class="t_center mb05"><b>使いたい補助金や制度が決まっている方</b></p>
                <div v-for="(item, index) in system_confirms1" :key="index" style="display: inline-block;">
                  <input type="checkbox" id="display01" disabled checked><label for="display01">{{ SYSTEM_CONFIRM[item] }}</label>
                </div>
              </div>
              <div>
                <p class="t_center mt20 mb05"><b>該当の補助金や制度が不明な方</b></p>
                <div v-for="(item, index) in system_misss1" :key="index" style="display: inline-block;">
                  <input type="checkbox" id="display15" disabled checked><label for="display15">{{ SYSTEM_MISS[item] }}</label>
                </div>
              </div>
              <div>
                <p class="t_center mt20 mb05" v-for="(item, index) in system_others1" :key="index"><b>{{ SYSTEM_OTHER[item] }}</b></p>
              </div>
            </dd>
          </dl>
          <dl>
            <dt>会社名<span>必須</span></dt>
            <dd>
              <p>{{ com_name }}</p>
            </dd>
          </dl>
          <dl>
            <dt>業種<span>必須</span></dt>
            <dd>
              <p>{{ JOBS[job] }}</p>
            </dd>
          </dl>
          <dl>
            <dt>会社所在地<span>必須</span></dt>
            <dd>
            〒<span>{{ zipcode }}</span>
              <span class="ml20">
                {{ prefecture }}
              </span>
              <p class="mt05">市区町村・番地</p>
              <p>{{ city }}</p>
              <p class="mt05">{{ building }}</p>
            </dd>
          </dl>
          <dl>
            <dt>従業員規模<span>必須</span></dt>
            <dd>
              <p>{{ AMOUNTS[amount] }}</p>
            </dd>
          </dl>
          <dl>
            <dt>年商<span>必須</span></dt>
            <dd>
              <p>{{ PRICES[income] }}</p>
            </dd>
          </dl>
          <dl>
            <dt>電話番号<span>必須</span></dt>
            <dd>
              <p>{{ telephone }}</p>
            </dd>
          </dl>
          <dl>
            <dt>メールアドレス<span>必須</span></dt>
            <dd>
              <p>{{ email }}</p>
            </dd>
          </dl>
          <dl>
            <dt>担当名<span>必須</span></dt>
            <dd>
              <p>{{ tanto_name }}</p>
            </dd>
          </dl>
          <dl>
            <dt>役職<span>必須</span></dt>
            <dd>
              <p>{{ role_name }}</p>
            </dd>
          </dl>
          <dl>
            <dt>投資予定額</dt>
            <dd>
              <p>{{ SUPPORT_PRICES[price] }}</p>
            </dd>
          </dl>
          <dl>
            <dt>相談内容概略<span>必須</span><br>※100字以内</dt>
            <dd>
              <p>{{ message_title }}</p>
            </dd>
          </dl>
          <dl>
            <dt>相談内容詳細<span>必須</span></dt>
            <dd>
              <p>{{ message_content }}</p>
            </dd>
          </dl>
          <dl>
            <dt>掲載期限<span>必須</span></dt>
            <dd>
              <p>{{ expired_at }}</p>
            </dd>
          </dl>
          <div class="submit_wrap">
            <div class="cancel_btn"><button type="button" @click="backProc">戻る</button></div>
            <div class="form_btn_blue"><span><input type="submit" value="登録する"></span></div>
          </div>
        </form>
      </div>
    </main>
  </div>
</template>
<script>
import moment from 'moment'
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

      system_confirms: '',
			system_misss: '',
			system_others: '',
      system_confirms1: [],
      system_misss1: [],
			system_others1: [],
			com_name: null,
			job: null,
			zipcode: null,
			prefecture: null,
			city: null,
			building: null,
			amount: null,
			income: null,
			telephone: null,
			fax: null,
			email: null,
      available: 1,
			tanto_name: null,
			department_name: null,
			role_name: null,
			price: null,
			message_title: null,
			message_content: null,
			expired_at: null,
      created_at: null
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    clearFormData() {
      localStorage.removeItem('com_name')
      localStorage.removeItem('job')
      localStorage.removeItem('zipcode')
      localStorage.removeItem('prefecture')
      localStorage.removeItem('city')
      localStorage.removeItem('building')
      localStorage.removeItem('amount')
      localStorage.removeItem('income')
      localStorage.removeItem('telephone')
      localStorage.removeItem('fax')
      localStorage.removeItem('email')
      localStorage.removeItem('tanto_name')
      localStorage.removeItem('department_name')
      localStorage.removeItem('role_name')
      localStorage.removeItem('price')
      localStorage.removeItem('message_title')
      localStorage.removeItem('message_content')
      localStorage.removeItem('expired_at')
      localStorage.removeItem('system_confirms')
      localStorage.removeItem('system_misss')
      localStorage.removeItem('system_others')
      localStorage.removeItem('available')
      localStorage.removeItem('created_at')
    },
    backProc() {
      this.$router.back()
    },
    init() {
      this.com_name = localStorage.getItem('com_name')
      this.job = parseInt(localStorage.getItem('job'))
      this.zipcode = localStorage.getItem('zipcode')
      this.prefecture = localStorage.getItem('prefecture')
      this.city = localStorage.getItem('city')
      this.building = localStorage.getItem('building') == 'null' ? null : localStorage.getItem('building')
      this.amount = parseInt(localStorage.getItem('amount'))
      this.income = parseInt(localStorage.getItem('income'))
      this.telephone = localStorage.getItem('telephone')
      this.fax = localStorage.getItem('fax') == 'null' ? null : localStorage.getItem('fax')
      this.email = localStorage.getItem('email')
      this.tanto_name = localStorage.getItem('tanto_name')
      this.department_name = localStorage.getItem('department_name') == 'null' ? null : localStorage.getItem('department_name')
      this.role_name = localStorage.getItem('role_name') == 'null' ? null : localStorage.getItem('role_name')
      this.price = parseInt(localStorage.getItem('price'))
      this.message_title = localStorage.getItem('message_title')
      this.available = parseInt(localStorage.getItem('available'))
      this.created_at = parseInt(localStorage.getItem('created_at'))
      this.message_content = localStorage.getItem('message_content')
      this.expired_at = localStorage.getItem('expired_at')
      if (localStorage.getItem('system_confirms')) {
        this.system_confirms = localStorage.getItem('system_confirms').split('、').map(item => {
          return SYSTEM_CONFIRM[parseInt(item)]
        }).join('、')
        this.system_confirms1 = localStorage.getItem('system_confirms').split('、').map(item => {
          return parseInt(item)
        })
      }
      if (localStorage.getItem('system_misss')) {
        this.system_misss = localStorage.getItem('system_misss').split('、').map(item => {
          return SYSTEM_MISS[parseInt(item)]
        }).join('、')
        this.system_misss1 = localStorage.getItem('system_misss').split('、').map(item => {
          return parseInt(item)
        })
      }
      if (!!localStorage.getItem('system_others')) {
        this.system_others = localStorage.getItem('system_others').split('、').map(item => {
          return SYSTEM_OTHER[parseInt(item)]
        }).join('、')
        this.system_others1 = localStorage.getItem('system_others').split('、').map(item => {
          return parseInt(item)
        })
      }
    },
    async sendContent() {
      try {
        const { data } = await axios.post('/admin/save_consultant_content', {
          com_name: this.com_name,
          job: this.job,
          zipcode: this.zipcode,
          prefecture: this.prefecture,
          city: this.city,
          building: this.building == 'null' ? null : this.building,
          amount: this.amount,
          income: this.income,
          telephone: this.telephone,
          fax: this.fax == 'null' ? null : this.fax,
          email: this.email,
          tanto_name: this.tanto_name,
          department_name: this.department_name == 'null' ? null : this.department_name,
          role_name: this.role_name == 'null' ? null : this.role_name,
          price: this.price,
          message_title: this.message_title,
          message_content: this.message_content,
          expired_at: moment(this.expired_at, 'YYYY-MM-DD').format('YYYY/MM/DD HH:mm:ss'),
          system_confirms: this.system_confirms1,
          system_misss: this.system_misss1,
          system_others: this.system_others1,
          id: this.$route.query.id
        })
        
        this.clearFormData()
        this.$router.push({ name: 'admin.consultant.finish' })
      } catch (error) {
      }
    },
  }
}
</script>
<style scoped>

</style>