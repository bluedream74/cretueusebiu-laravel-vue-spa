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
            <a href="javascript:void(0)" class="btn_blue" download="">ダウンロード</a>
          </div>
        </div>
        <form class="search_form">
          <div class="flex_wrap">
            <dl class="input_txt">
              <dt>支援機関名</dt>
              <dd>
                <input type="text">
              </dd>
            </dl>
            <dl class="input_txt">
              <dt>利用可否</dt>
              <dd>
                <input type="radio" id="koukai" name="koukai_cat" checked="checked">
                <label for="koukai">可</label>
                <input type="radio" id="hikoukai" name="koukai_cat">
                <label for="hikoukai">否</label>
              </dd>
            </dl>
          </div>
          <div class="submit_wrap">
            <div class="form_btn_blue"><span><input type="submit" value="検索"></span></div>
            <div class="cancel_btn"><button type="button">リセット</button></div>
          </div>
        </form>
        <div class="flex_btw_wrap">
          <div class="load_btn"><a href="javascript:void(0)"><span>表示の更新</span></a></div>
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
                <th width="460">支援機関名</th>
                <th width="90">回答履歴</th>
                <th width="90">請求情報</th>
                <th width="140"></th>
              </tr>
              <tr v-for="(item, index) in temp" :key="index">
                <td>{{ item.kikan_id }}</td>
                <td><input type="checkbox" id="koukai50" class="display_btn"><label for="koukai50"></label></td>
                <td><input type="checkbox" id="display50" class="display_btn"><label for="display50"></label></td>
                <td>{{ item.created_at | dateFormatEn }}</td>
                <td>{{ item.com_name }}</td>
                <td><router-link :to="{ name: 'admin.register.history', query: {user_id: item.id } }" class="eidt_btn table_btns">回答履歴</router-link></td>
                <td><a href="invoice.html" class="browsing_btn table_btns">請求情報</a></td>
                <td>
                  <a href="edit.html" class="eidt_btn table_btns">編集</a>
                  <span class="delete_btn table_btns">削除 </span>
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
      temp: []
    }
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/admin/get_register_list')
        this.temp = data.registers
        this.registers = this.temp.filter((item, index) => {
          return index < 10
        })
      } catch (error) {
      }
    },

    changeCurrentPage(page) {
      this.registers = this.temp.filter((item, index) => {
        return index >= (page - 1) * 10 && index < (page * 10)
      })
    },
  }
}
</script>