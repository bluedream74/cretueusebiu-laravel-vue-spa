<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a @click="backProc">バナー管理一覧</a></li>
            <li><span>バナー入力(新規)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>バナー入力(新規)</span></h2>
        <form class="edit_form" @submit.prevent="createNews">
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
              <dd>
                <input type="text" id="startDate" class="datepicker" :value="start_at">
                ～
                <input type="text" id="endDate" class="datepicker" :value="end_at">
              </dd>
            </dl>
            <dl>
              <dt>バナー画像<span>必須</span></dt>
              <dd>
                <label for="photo"><input type="file" name="" id="photo" @change="selectedPDF" accept="image/png, image/gif, image/jpeg"></label>
              </dd>
            </dl>
            <dl>
              <dt>リンク先URL<span>必須</span></dt>
              <dd><input type="text" v-model="link"></dd>
            </dl>
            <div class="submit_wrap">
              <div class="form_btn_blue"><span><input type="submit" value="新規登録"></span></div>
            </div>
        </form>
      </div>
      <Spinner v-if="loading" />
    </main>
  </div>
</template>
<script>
import Spinner from '../../../components/Spinner.vue'
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
      loading: false
    }
  },
  components: {
    Spinner
  },
  mounted() {
    $('.datepicker').datepicker({
      numberOfMonths:1,
    });
  },
  methods: {
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
      this.start_at = $('#startDate').val()
      this.end_at = $('#endDate').val()
      if (!this.title) {
        this.$swal('', 'バナー名を入力してください。')
        return
      }

      if (!this.start_at) {
        this.$swal('', '公開期間を指定してください')
        return
      }

      if (!this.image) {
        this.$swal('', 'バナー画像を選択してください')
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
      formData.append('start_at', this.start_at)
      formData.append('end_at', this.end_at)
      formData.append('image', this.image)
      await axios.post('/admin/create_banner', formData, { headers: { 'Content-Type': 'multipart/form-data' }})
      this.loading = false
      this.$router.push({ name: 'admin.add_bnr' })
    }
  }
}
</script>