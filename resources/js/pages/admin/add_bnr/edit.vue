<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a @click="backProc">バナー管理一覧</a></li>
            <li><span>バナー入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>バナー入力(編集)</span></h2>
        <form class="edit_form" @submit.prevent="createNews">
            <dl>
              <dt>ID</dt>
              <dd>{{ id }}</dd>
            </dl>
            <dl>
              <dt>公開・非公開<span>必須</span></dt>
              <dd>
                <input type="radio" id="honbu" name="fc_cat" :checked="is_public == 1" @click="() => { is_public = 1 }">
                <label for="honbu">公開</label>
                <input type="radio" id="fc" name="fc_cat" :checked="is_public == 0" @click="() => { is_public = 0 }">
                <label for="fc">非公開</label>
              </dd>
            </dl>
            <dl>
              <dt>バナー名<span>必須</span></dt>
              <dd><input type="text" v-model="title"></dd>
            </dl>
            <dl>
              <dt>公開期間<span>必須</span></dt>
              <dd class="datepicker_group">
                <datepicker v-model="start_at" :language="ja" format="yyyy/MM/dd"></datepicker>
                ～
                <datepicker v-model="end_at" :language="ja" format="yyyy/MM/dd"></datepicker>
              </dd>
            </dl>
            <dl>
              <dt>バナー画像<span>必須</span></dt>
              <dd>
                <label for="photo"><input type="file" name="" id="photo" @change="selectedPDF" accept="image/png, image/gif, image/jpeg"></label>
                <p class="image">
                  <img :src="image_url" />
                </p>
              </dd>
            </dl>
            <dl>
              <dt>リンク先URL<span>必須</span></dt>
              <dd><input type="text" v-model="link"></dd>
            </dl>
            <div class="submit_wrap">
              <div class="form_btn_blue"><span><input type="submit" value="変更"></span></div>
            </div>
        </form>
      </div>
      <Spinner v-if="loading" />
    </main>
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import {ja} from 'vuejs-datepicker/dist/locale'
import moment from 'moment'
export default {
  layout: 'admin_auth',
	middleware: 'admin',
  data() {
    return {
      is_public: 1,
      title: null,
      link: null,
      image: null,
      start_at: null,
      end_at: null,
      id: null,
      image_url: null,
      loading: false,
      ja: ja
    }
  },
  components: {
    Datepicker
  },
  mounted() {
    $('.datepicker').datepicker({
      numberOfMonths:1,
    });
    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/admin/get_banner_detail', {
          id: this.$route.query.id
        })
        this.is_public = data.banner.is_public
        this.title = data.banner.title
        this.link = data.banner.link
        this.start_at = !!data.banner.start_at ? moment(data.banner.start_at, 'YYYY-MM-DD HH:mm:ss').format('YYYY/MM/DD') : null
        this.end_at = !!data.banner.end_at ? moment(data.banner.end_at, 'YYYY-MM-DD HH:mm:ss').format('YYYY/MM/DD') : null
        this.id = data.banner.id
        this.image_url = data.banner.image_url
      } catch (error) {
      } 
    },
    backProc() {
      this.$router.back()
    },
    selectedPDF(event) {
      const file = event.target.files[0]
      if (!!file) {
        this.image = file
      }
    },
    async createNews() {
      if (!this.title) {
        this.$swal('', 'バナー名を入力してください。')
        return
      }

      if (!this.start_at) {
        this.$swal('', '公開期間を指定してください')
        return
      }

      if (!this.link) {
        this.$swal('', 'リンク先URLを入力してください')
        return
      }
      this.loading = true
      let formData = new FormData()
      formData.append('is_public', this.is_public)
      formData.append('title', this.title)
      formData.append('link', this.link)
      formData.append('image', this.image)
      formData.append('start_at', moment(this.start_at).format('YYYY-MM-DD'))
      formData.append('end_at', moment(this.end_at).format('YYYY-MM-DD'))
      formData.append('id', this.$route.query.id)
      await axios.post('/admin/update_banner', formData, { headers: { 'Content-Type': 'multipart/form-data' }})
      this.loading = false
      this.$router.push({ name: 'admin.add_bnr' })
    }
  }
}
</script>
<style lang="scss" scoped>
.sitewrap {
  overflow: visible !important;
}
</style>