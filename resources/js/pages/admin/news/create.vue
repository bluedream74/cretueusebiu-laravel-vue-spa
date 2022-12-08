<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a @click="backProc">お知らせ管理一覧</a></li>
            <li><span>お知らせ入力(新規)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>お知らせ入力(新規)</span></h2>
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
              <dt>公開期間<span>必須</span></dt>
              <dd class="datepicker_group">
                <datepicker v-model="start_at" :language="ja" format="yyyy/MM/dd"></datepicker>
                ～
                <datepicker v-model="end_at" :language="ja" format="yyyy/MM/dd"></datepicker>
              </dd>
            </dl>
            <dl>
              <dt>タイトル<span>必須</span></dt>
              <dd><input type="text" v-model="title"></dd>
            </dl>
            <dl>
              <dt>URL</dt>
              <dd><input type="text" v-model="url"></dd>
            </dl>
            <dl>
              <dt>PDF</dt>
              <dd>
                <label for="photo"><input type="file" name="" id="photo" @change="selectedPDF" accept=".pdf"></label>
                <p>ファイル名</p>
                <input type="text" v-model="pdf_title">
              </dd>
            </dl>
            <dl>
              <dt>本文</dt>
              <dd>
                <textarea name="" class="tinymce" row="10" cols="30" rows="6" id="KnowledgeDetail2" v-model="content"></textarea>
              </dd>
            </dl>
            <div class="submit_wrap">
              <div class="form_btn_blue"><span><input type="submit" value="新規登録"></span></div>
            </div>
          </form>
      </div>

    </main>
  </div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import moment from 'moment'
import {ja} from 'vuejs-datepicker/dist/locale'
export default {
  layout: 'admin_auth',
	middleware: 'admin',
  data() {
    return {
      is_public: 1,
      start_at: null,
      end_at: null,
      title: null,
      url: null,
      pdf: null,
      pdf_title: null,
      content: null,
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
  },
  methods: {
    backProc() {
      this.$router.back()
    },
    selectedPDF(event) {
      const file = event.target.files[0]
      if (!!file) {
        this.pdf = file
        this.pdf_title = file.name
        console.log(this.pdf)
      }
    },
    async createNews() {
      if (!this.start_at) {
        this.$swal('', '公開期間を指定してください')
        return
      }

      if (!this.title) {
        this.$swal('', 'タイトルを入力してください。')
        return
      }

      let formData = new FormData()
      formData.append('is_public', this.is_public)
      formData.append('start_at', moment(this.start_at).format('YYYY-MM-DD'))
      formData.append('end_at', !!this.end_at ? moment(this.end_at).format('YYYY-MM-DD') : null)
      formData.append('title', this.title)
      formData.append('url', this.url)
      formData.append('pdf', this.pdf)
      formData.append('pdf_title', this.pdf_title)
      formData.append('content', this.content)
      await axios.post('/admin/create_news', formData, { headers: { 'Content-Type': 'multipart/form-data' }})
      this.$router.push({ name: 'admin.news' })
    }
  }
}
</script>