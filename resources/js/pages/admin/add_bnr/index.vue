<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><span>バナー管理一覧</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>バナー管理一覧</span></h2>
        <div class="flex_btw_wrap">
          <div class="load_btn"><a href="javascript:void(0)"><span>表示の更新</span></a></div>
          <div class="new_btn"><router-link :to="{ name: 'admin.add_bnr.create' }"><span>新規登録</span></router-link></div>
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
                <th width="40">表示</th>
                <th width="380">バナー名</th>
                <th width="380">公開期間</th>
                <th width="140"></th>
              </tr>
              <tr v-for="(item, index) in banners" :key="index">
                <td>{{ item.id }}</td>
                <td><input type="checkbox" :id="'display' + index" class="display_btn" @change="changePublic(item, $event)" :checked="item.is_public == 1"><label :for="'display' + index"></label></td>
                <td>{{ item.title }}</td>
                <td>{{ item.start_at | dateFormat }}～{{ item.end_at | dateFormat }}</td>
                <td>
                  <router-link :to="{ name: 'admin.add_bnr.edit', query: { id: item.id } }" class="eidt_btn table_btns">編集</router-link>
                  <span @click="deleteProc(item.id)" class="delete_btn table_btns">削除 </span>
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
      banners: [],
      temp: [],
    }
  },
  mounted() {
		this.init()
	},
  methods: {
    async changePublic(item, event) {
			try {
				const { data } = await axios.post('/admin/change_banner_public', {
					id: item.id,
					flag: event.target.checked ? 1 : 0
				})
			} catch (error) {
			}
		},
		async init() {
			try {
				const { data } = await axios.post('/admin/get_banner_list')
				this.temp = data.banners
        this.banners = this.temp.filter((item, index) => {
          return index < 10
        })
			} catch (error) {
			}
		},
		changeCurrentPage(page) {
      this.banners = this.temp.filter((item, index) => {
        return index >= (page - 1) * 10 && index < (page * 10)
      })
    },
		async deleteProc(id) {
      this.$iosConfirm('一度削除した情報は復元できません。この情報を削除してもよろしいですか？').then(async () => {
        try {
          const { data } = await axios.post('/admin/delete_banner_proc', {
            id: id
          })
          this.init()
        } catch (error) {
        }
      })
		}
	}
}
</script>