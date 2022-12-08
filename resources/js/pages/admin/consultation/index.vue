<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><span>事業者管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>事業者管理一覧</span></h2>
        <div class="graph_form mt10 mb30">
          <div class="select_wrap">
            <p>事業者情報CSV出力</p>
            <a @click="downloadCSV" class="btn_blue" download="">ダウンロード</a>
          </div>
        </div>
        <form class="search_form">
          <div class="flex_wrap">
            <dl class="date">
              <dt>登録日</dt>
              <dd class="datepicker_group">
                <datepicker v-model="search.from" :language="ja" format="yyyy/MM/dd"></datepicker>
                ～
                <datepicker v-model="search.to" :language="ja" format="yyyy/MM/dd"></datepicker>
              </dd>
            </dl>
            <dl class="input_txt">
              <dt>公開・非公開</dt>
              <dd>
                <input type="radio" id="koukai" name="koukai_cat" :checked="search.available == 1" @click="() => search.available = 1">
                <label for="koukai">公開中</label>
                <input type="radio" id="hikoukai" name="koukai_cat" :checked="search.available == 0" @click="() => search.available = 0">
                <label for="hikoukai">非公開</label>
              </dd>
            </dl>
          </div>
          <div class="submit_wrap">
            <div class="form_btn_blue"><span><input type="button" @click="init" value="検索"></span></div>
            <div class="cancel_btn"><button @click="resetForm" type="button">リセット</button></div>
          </div>
        </form>
        <div class="flex_btw_wrap">
          <div class="load_btn"><a @click="init"><span>表示の更新</span></a></div>
        </div>
        <div class="table_wrap">
          <Pagination v-if="temp.length > 0" :total="temp.length" @changeCurrentPage="changeCurrentPage"  />
          <table>
            <tbody>
              <tr>
                <th width="60">ID</th>
                <th width="40">表示</th>
                <th width="100">登録日</th>
                <th width="500">会社名</th>
                <th width="140"></th>
              </tr>
              <tr v-for="(item, index) in consultants" :key="index">
                <td>{{ item.id }}</td>
                <td><input type="checkbox" :id="'koukai' + index" class="display_btn" :checked="item.available == 1" @change="changeAvailable(item, $event)"><label :for="'koukai' + index"></label></td>	
                <td>{{ item.created_at | dateFormatEn }}</td>
                <td>{{ item.com_name }}</td>
                <td>
                  <router-link :to="{ name: 'admin.consultant.edit', query: { id: item.id } }" class="eidt_btn table_btns">編集</router-link>
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
import Datepicker from 'vuejs-datepicker';
import {ja} from 'vuejs-datepicker/dist/locale'
import Pagination from '../../../components/Pagination.vue'
import moment from 'moment'
export default {
  layout: 'admin_auth',
  middleware: 'admin',
  components: {
    Pagination,
    Datepicker
  },
  data() {
    return {
      consultants: [],
      temp: [],
      search: {
        from: null,
        to: null,
        available: 1
      },
      ja: ja
    }
  },
  mounted() {
    $('.datepicker').datepicker({
      numberOfMonths:1,
    });
    this.init()
  },
  methods: {
    resetForm() {
      this.search = {
        from: null,
        to: null,
        available: 1
      }
    },
    async init() {
      this.temp = []
      this.consultants = []
      this.search.from = !!this.search.from ? moment(this.search.from).format('YYYY-MM-DD') : null
      this.search.to = !!this.search.to ? moment(this.search.to).format('YYYY-MM-DD') : null
      try {
        const { data } = await axios.post('/admin/get_consultant_list')
        this.temp = data.consultants.filter(item => {
          if (!!this.search.from && !!this.search.to) {
            return moment(item.created_at) >= moment(this.search.from) && moment(item.created_at) <= moment(this.search.to) && item.available == this.search.available
          } else if (!this.search.from && !!this.search.to) {
            return moment(item.created_at) <= moment(this.search.to) && item.available == this.search.available
          } else if (!!this.search.from && !this.search.to) {
            return moment(item.created_at) >= moment(this.search.from) && item.available == this.search.available
          } else {
            return item.available == this.search.available
          }
        })
        this.consultants = this.temp.filter((item, index) => {
          return index < 10
        })
      } catch (error) {
      }
    },
    async changeAvailable(item, event) {
      try {
        const { data } = await axios.post('/admin/change_consultant_available', {
          id: item.id,
          flag: event.target.checked ? 1 : 0
        })
        this.init()
      } catch (error) {
      }
    },
    async downloadCSV() {
      let consultants = this.temp.map(item => {
        return item.id
      })
      let newWindow = window.open();
      newWindow.location = 'https://' + window.location.hostname + `/admin/download_consultants_csv?consultants=${JSON.stringify(consultants)}`;
    },
    changeCurrentPage(page) {
      this.consultants = this.temp.filter((item, index) => {
        return index >= (page - 1) * 10 && index < (page * 10)
      })
    },
    async deleteProc(item) {
      this.$iosConfirm('削除します。よろしいでしょうか？').then(async () => {
        try {
          const { data } = await axios.post('/admin/delete_consultant', {
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