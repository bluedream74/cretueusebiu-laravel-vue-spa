<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><span>支援機関管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>支援機関管理一覧</span></h2>
        <div class="graph_form mt10 mb30">
          <div class="select_wrap">
            <p>支援機関情報CSV出力</p>
            <a @click="downloadCSV" class="btn_blue" download="">ダウンロード</a>
          </div>
        </div>
        <form class="search_form">
          <div class="flex_wrap">
            <dl class="input_txt">
              <dt>支援機関名</dt>
              <dd>
                <input v-model="search.name" type="text">
              </dd>
            </dl>
            <dl class="input_txt">
              <dt>利用可否</dt>
              <dd>
                <input type="radio" id="koukai" name="koukai_cat" :checked="search.available == 1" @click="() => search.available = 1">
                <label for="koukai">可</label>
                <input type="radio" id="hikoukai" name="koukai_cat" :checked="search.available == 0" @click="() => search.available = 0">
                <label for="hikoukai">否</label>
              </dd>
            </dl>
          </div>
          <div class="submit_wrap">
            <div class="form_btn_blue"><span><input type="button" @click="init" value="検索"></span></div>
            <div class="cancel_btn"><button @click="resetForm" type="button">リセット</button></div>
          </div>
        </form>
        <div class="flex_btw_wrap">
          <div class="load_btn"><a @click="reload"><span>表示の更新</span></a></div>
        </div>
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
          <Pagination v-if="temp.length > 0" :total="temp.length" @changeCurrentPage="changeCurrentPage"  />
          <table>
            <tbody>
              <tr>
                <th width="60">ID</th>
                <th width="60">利用可</th>
                <th width="60">請求有</th>
                <th width="100">登録日</th>
                <th width="400">支援機関名</th>
                <th width="90">回答履歴</th>
                <th width="90">請求情報</th>
                <th width="140"></th>
              </tr>
              <tr v-for="(item, index) in registers" :key="index">
                <td>{{ item.kikan_id }}</td>
                <td><input type="checkbox" :id="'koukai' + index" class="display_btn" :checked="item.available == 1" @change="changeAvailable(item, $event)"><label :for="'koukai' + index"></label></td>
                <td><input type="checkbox" :id="'display' + index" class="display_btn" :checked="item.need_pay == 1" @change="changeNeedPay(item, $event)"><label :for="'display' + index"></label></td>
                <td>{{ item.created_at | dateFormatEn }}</td>
                <td>{{ item.com_name }}</td>
                <td><router-link :to="{ name: 'admin.register.history', query: {user_id: item.id } }" class="eidt_btn table_btns">回答履歴</router-link></td>
                <td><router-link :to="{ name: 'admin.register.invoice', query: {user_id: item.id } }" class="browsing_btn table_btns">請求情報</router-link></td>
                <td>
                  <router-link :to="{ name: 'admin.register.edit', query: { user_id: item.id } }" class="eidt_btn table_btns">編集</router-link>
                  <span @click="deleteProc(item)" class="delete_btn table_btns">削除 </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
    </main>
  </div>
</template>
<script>
import Pagination from '../../../components/Pagination.vue'
export default {
  layout: 'admin_auth',
  middleware: 'admin',
  components: {
    Pagination
  },
  mounted() {
    this.init()
  },
  data() {
    return {
      registers: [],
      temp: [],
      search: {
        name: '',
        available: 1
      }
    }
  },
  methods: {
    reload() {
      this.init()
    },
    resetForm() {
      this.search = {
        name: '',
        available: null
      }
    },
    async init() {
      this.temp = []
      this.registers = []
      try {
        const { data } = await axios.post('/admin/get_register_list')
        this.temp = data.registers.filter(item => {
          if (this.search.name != '') {
            return item.com_name.includes(this.search.name) && (!!this.search.available ? item.available == this.search.available : true)
          } else {
            return (!!this.search.available ? item.available == this.search.available : true)
          }
        })
        this.registers = this.temp.filter((item, index) => {
          return index < 10
        })
      } catch (error) {
      }
    },
    async changeAvailable(item, event) {
      try {
        const { data } = await axios.post('/admin/change_available', {
          id: item.id,
          flag: event.target.checked ? 1 : 0
        })
        this.init()
      } catch (error) {
      }
    },
    async downloadCSV() {
      let users = this.temp.map(item => {
        return item.id
      })
      let newWindow = window.open();
      newWindow.location = 'https://' + window.location.hostname + `/admin/download_csv?users=${JSON.stringify(users)}`;
    },
    async changeNeedPay(item, event) {
      try {
        const { data } = await axios.post('/admin/change_need_pay', {
          id: item.id,
          flag: event.target.checked ? 1 : 0
        })
        this.init()
      } catch (error) {
      }
    },
    changeCurrentPage(page) {
      this.registers = this.temp.filter((item, index) => {
        return index >= (page - 1) * 10 && index < (page * 10)
      })
    },
    async deleteProc(item) {
      this.$iosConfirm('一度削除した情報は復元できません。この情報を削除してもよろしいですか？').then(async () => {
        try {
          const { data } = await axios.post('/admin/delete_user', {
            id: item.id
          })
          this.init()
        } catch (error) {
        }
      })
    }
  }
}
</script>