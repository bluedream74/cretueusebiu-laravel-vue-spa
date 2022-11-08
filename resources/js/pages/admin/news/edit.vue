<template>
  <div>
    <main>
      <div class="sitewrap">
        <div id="pan">
          <ul>
            <li><router-link :to="{ name: 'admin.dashboard' }">HOME</router-link></li>
            <li><a @click="backProc">お知らせ管理一覧</a></li>
            <li><span>お知らせ入力(編集)</span></li>
          </ul>
        </div>
        <h2 class="h_style03"><span>お知らせ入力(編集)</span></h2>
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
              <dd>
                <input type="date" class="datepicker" v-model="start_at">
                ～
                <input type="date" class="datepicker" v-model="end_at">
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
                <label for="photo"><input type="file" name="" id="photo" @change="selectedPDF"></label>
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
              <div class="form_btn_blue"><span><input type="submit" value="変更"></span></div>
            </div>
          </form>
      </div>

    </main>
  </div>
</template>
<script>
export default {
  data() {
    return {
      is_public: 1,
      start_at: null,
      end_at: null,
      title: null,
      url: null,
      pdf: null,
      pdf_title: null,
      content: null
    }
  },
  mounted() {
    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/admin/get_news_detail', {
          id: this.$route.query.id
        })
        this.is_public = data.news.is_public
        this.start_at = data.news.start_at
        this.end_at = data.news.end_at
        this.title = data.news.title
        this.url = data.news.url
        this.pdf = data.news.pdf
        this.pdf_title = data.news.pdf_title
        this.content = data.news.content
      } catch (error) {
      } 
    },
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
      formData.append('start_at', this.start_at)
      formData.append('end_at', this.end_at)
      formData.append('title', this.title)
      formData.append('url', this.url)
      formData.append('pdf', this.pdf)
      formData.append('pdf_title', this.pdf_title)
      formData.append('content', this.content)
      formData.append('id', this.$route.query.id)
      await axios.post('/admin/update_news', formData, { headers: { 'Content-Type': 'multipart/form-data' }})
      this.$router.push({ name: 'admin.news' })
    }
  }
}
</script>