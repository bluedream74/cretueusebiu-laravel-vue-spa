<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><router-link :to="{ name: 'admin.register' }">支援機関管理一覧</router-link></li>
            <li><span>AA株式会社 回答履歴</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>AA株式会社 回答履歴一覧</span></h2>
        <form class="graph_form mt10">
          <div class="select_wrap">
            <p>回答履歴CSV出力</p>
            <div class="months_select">
              <div class="wrap year">
                <select>
                  <option value=""></option>
                  <option value="">2021</option>
                  <option value="">2020</option>
                  <option value="">2019</option>
                  <option value="">2018</option>
                </select>
              </div>
              <span>年</span>
              <div class="wrap month">
                <select>
                  <option value=""></option>
                  <option value="">1</option>
                  <option value="">2</option>
                  <option value="">3</option>
                  <option value="">4</option>
                  <option value="">5</option>
                  <option value="">6</option>
                  <option value="">7</option>
                  <option value="">8</option>
                  <option value="">9</option>
                  <option value="">10</option>
                  <option value="">11</option>
                  <option value="">12</option>
                </select>
              </div>
              <span>月</span>
              <span>～</span>
              <div class="wrap year">
                <select>
                  <option value=""></option>
                  <option value="">2021</option>
                  <option value="">2020</option>
                  <option value="">2019</option>
                  <option value="">2018</option>
                </select>
              </div>
              <span>年</span>
              <div class="wrap month">
                <select>
                  <option value=""></option>
                  <option value="">1</option>
                  <option value="">2</option>
                  <option value="">3</option>
                  <option value="">4</option>
                  <option value="">5</option>
                  <option value="">6</option>
                  <option value="">7</option>
                  <option value="">8</option>
                  <option value="">9</option>
                  <option value="">10</option>
                  <option value="">11</option>
                  <option value="">12</option>
                </select>
              </div>
              <span>月</span>
            </div>
            <a href="javascript:void(0)" class="btn_blue" download="">ダウンロード</a>
          </div>
        </form>
        <div class="table_wrap">
          <Pagination v-if="temp.length > 0" :total="temp.length" @changeCurrentPage="changeCurrentPage"  />
          <table>
            <tbody>
              <tr>
                <th width="60">ID</th>
                <th width="100">回答日</th>
                <th width="900">事業者名</th>
              </tr>
              <tr v-for="(item, index) in temp" :key="index">
                <td>{{ item.consultant_id }}</td>
                <td>{{ item.created_at | dateFormatEn }}</td>
                <td class="t_left">{{ item.consultant.com_name }}</td>
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
      histories: [],
      temp: []
    }
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/admin/get_register_history', {
          id: this.$route.query.user_id
        })
        this.temp = data.histories
        this.histories = this.temp.filter((item, index) => {
          return index < 10
        })
      } catch (error) {
      }
    },

    changeCurrentPage(page) {
      this.histories = this.temp.filter((item, index) => {
        return index >= (page - 1) * 10 && index < (page * 10)
      })
    },
  }
}
</script>