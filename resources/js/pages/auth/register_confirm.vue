<template>
  <div class="common_page form_page register_form">
    <main>
			<section class="section mv_area">
				<h1>支援機関新規登録内容確認</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><span>支援機関新規登録</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap check">
				<div>
					<section class="section lead">
						<div class="sitewrap">
							<h2 class="h_style01">支援機関新規登録内容確認</h2>
							<p class="lead_style">送信内容をご確認の上、送信ボタンを押してください。</p>
							<div class="table_style">
								<dl class="required">
									<dt>認定支援機関ID番号<i>必須</i></dt>
									<dd><div class="form_el">{{ kikan_id }}</div></dd>
								</dl>
								<dl class="required">
									<dt>会社名<i>必須</i></dt>
									<dd><div class="form_el">{{ com_name }}</div></dd>
								</dl>
								<dl class="required">
									<dt>フリガナ<i>必須</i></dt>
									<dd><div class="form_el">{{ com_huri_name }}</div></dd>
								</dl>
								<dl class="required">
									<dt>担当者氏名<i>必須</i></dt>
									<dd><div class="form_el">{{ tanto_name }}</div></dd>
								</dl>
								<dl class="">
									<dt>部署名</dt>
									<dd><div class="form_el">{{ department_name }}</div></dd>
								</dl>
								<dl class="">
									<dt>役職名</dt>
									<dd><div class="form_el">{{ role_name }}</div></dd>
								</dl>
								<dl class="required">
									<dt>法人／個人事業主<i>必須</i></dt>
									<dd><div class="form_el">{{ is_personal == 0 ? '法人' : '個人事業主' }}</div></dd>
								</dl>
								<dl class="required">
									<dt>種別<i>必須</i></dt>
									<dd><div class="form_el">{{ JOB_KINDS[kind] }}</div></dd>
								</dl>
								<dl class="required">
									<dt>会社所在地<i>必須</i></dt>
									<dd><div class="form_el">〒{{ zipcode }} {{ prefecture }}</div></dd>
								</dl>
								<dl class="required">
									<dt>市区町村番地<i>必須</i></dt> 
									<dd><div class="form_el">{{ city }}</div></dd>
								</dl>
								<dl class="">
									<dt>建物名・部屋番号など</dt>
									<dd><div class="form_el">{{ building }}</div></dd>
								</dl>
								<dl class="">
									<dt>電話番号</dt>
									<dd><div class="form_el">{{ telephone }}</div></dd>
								</dl>
								<dl class="">
									<dt>FAX</dt>
									<dd><div class="form_el">{{ fax }}</div></dd>
								</dl>
								<dl class="required">
									<dt>メールアドレス<i>必須</i></dt> 
									<dd><div class="form_el">{{ email }}</div></dd>
								</dl>
								<dl class="required">
									<dt>マイページパスワード<i>必須</i></dt> 
									<dd><div class="form_el">{{ password }}</div></dd>
								</dl>
								<dl class="">
									<dt>PRポイント</dt> 
									<dd><div class="form_el">{{ introduction }}</div></dd>
								</dl>
							</div>
						</div>
					</section>
					<section class="section area01">
						<div class="sitewrap">
							<h2 class="h_style01">支援可能条件入力欄</h2>
							<div class="table_style">
								<dl class="required">
									<dt>支援可能内容<i>必須</i></dt>
									<dd><div class="form_el">{{ available_contents }}</div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能業種<i>必須</i></dt>
									<dd><div class="form_el">{{ available_jobs }}</div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能年商<i>必須</i></dt>
									<dd><div class="form_el">{{ available_prices }}</div></dd>
								</dl>
								<dl class="required">
									<dt>支援可能従業員規模<i>必須</i></dt>
									<dd><div class="form_el">{{ available_amounts }}</div></dd>
								</dl>
							</div>
						</div>
					</section>
					<div class="section send_area">
						<div class="sitewrap">
							<div class="send_btns">
								<label class="btn_warp next"><span><input type="button" @click="register" value="この内容で送信"></span></label>
								<label class="btn_warp prev"><span><input type="button" @click="backProc" value="内容を変更する"></span></label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
  </div>
</template>
<script>
  import { JOB_KINDS, CONTENTS, JOBS, PRICES, AMOUNTS, PREFECTURES } from '../../const';
  export default {
    layout: 'default',
    middleware: 'guest',
    components: {
    },
    data() {
      return {
        JOB_KINDS: JOB_KINDS,
        CONTENTS: CONTENTS,
        JOBS: JOBS,
        PRICES: PRICES,
        AMOUNTS: AMOUNTS,
        PREFECTURES,
  
        kikan_id: null,
        com_name: null,
        com_huri_name: null,
        tanto_name: null,
        department_name: null,
        role_name: null,
        is_personal: false,
        kind: null,
        zipcode: null,
        prefecture: null,
        city: null,
        building: null,
        telephone: null,
        fax: null,
        email: null,
        password: null,
        introduction: null,
        available_contents: '',
        available_jobs: '',
        available_prices: '',
        available_amounts: '',
        available_contents1: '',
        available_jobs1: '',
        available_prices1: '',
        available_amounts1: ''
      }
    },
    created() {
      window.document.title = '支援機関新規登録'
      $('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「支援機関新規登録」ページです。支援機関を新規登録する場合、本フォームより「認定支援機関情報入力欄」「支援可能条件入力欄」を入力してください。事業者相談、その他のお問い合わせは専用のフォームからお問い合わせください。')
      $('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「支援機関新規登録」ページです。支援機関を新規登録する場合、本フォームより「認定支援機関情報入力欄」「支援可能条件入力欄」を入力してください。事業者相談、その他のお問い合わせは専用のフォームからお問い合わせください。')
    },
    mounted() {
      this.init()
    },
    methods: {
      init() {
        this.kikan_id = localStorage.getItem('kikan_id')
        this.com_name = localStorage.getItem('com_name')
        this.com_huri_name = localStorage.getItem('com_huri_name')
        this.tanto_name = localStorage.getItem('tanto_name')
        this.department_name = localStorage.getItem('department_name')
        this.role_name = localStorage.getItem('role_name')
        this.is_personal = parseInt(localStorage.getItem('is_personal'))
        this.kind = parseInt(localStorage.getItem('kind'))
        this.zipcode = localStorage.getItem('zipcode')
        this.prefecture = localStorage.getItem('prefecture')
        this.city = localStorage.getItem('city')
        this.building = localStorage.getItem('building')
        this.telephone = localStorage.getItem('telephone')
        this.fax = localStorage.getItem('fax')
        this.email = localStorage.getItem('email')
        this.password = localStorage.getItem('password')
        this.introduction = localStorage.getItem('introduction')
        this.available_contents = localStorage.getItem('available_contents').split('、').map(item => {
          return CONTENTS[parseInt(item)]
        }).join('、')
        this.available_jobs = localStorage.getItem('available_jobs').split('、').map(item => {
          return JOBS[parseInt(item)]
        }).join('、')
        this.available_prices = localStorage.getItem('available_prices').split('、').map(item => {
          return PRICES[parseInt(item)]
        }).join('、')
        this.available_amounts = localStorage.getItem('available_amounts').split('、').map(item => {
          return AMOUNTS[parseInt(item)]
        }).join('、')

        this.available_contents1 = localStorage.getItem('available_contents').split('、').map(item => {
          return parseInt(item)
        })
        this.available_jobs1 = localStorage.getItem('available_jobs').split('、').map(item => {
          return parseInt(item)
        })
        this.available_prices1 = localStorage.getItem('available_prices').split('、').map(item => {
          return parseInt(item)
        })
        this.available_amounts1 = localStorage.getItem('available_amounts').split('、').map(item => {
          return parseInt(item)
        })
      },

      backProc() {
        this.$router.back()
      },

      async register() {
        try {
          const { data } = await axios.post('/api/register_proc', {
            kikan_id: this.kikan_id,
            com_name: this.com_name,
            com_huri_name: this.com_huri_name,
            tanto_name: this.tanto_name,
            department_name: this.department_name,
            role_name: this.role_name,
            is_personal: this.is_personal,
            kind: this.kind,
            zipcode: this.zipcode,
            prefecture: this.prefecture,
            city: this.city,
            building: this.building,
            telephone: this.telephone,
            fax: this.fax,
            email: this.email,
            password: this.password,
            introduction: this.introduction,
            available_contents: this.available_contents1,
            available_jobs: this.available_jobs1,
            available_prices: this.available_prices1,
            available_amounts: this.available_amounts1
          })

          if (data.status == 0) {
            this.$swal('', '既に登録済みのアドレスです。')
            return
          } else if (data.status == 2) {
            this.$swal('', '強制退会済のユーザーです。登録できません')
            return
          } else if (data.status == 3) {
            this.$swal('', '認定支援機関ID番号が重複されています')
            return
          } else if (data.status == 1) {
            this.user_id = data.user_id
            this.clearContent()
            this.$router.push({ name: 'thanks' })
            // this.$swal('', '本登録のためメールをお送りしました。メール内のURLをクリックし本登録をしてください。')
          }
        } catch (error) {
        }
      },

      clearContent() {
        localStorage.removeItem('kikan_id')
        localStorage.removeItem('com_name')
        localStorage.removeItem('com_huri_name')
        localStorage.removeItem('tanto_name')
        localStorage.removeItem('department_name')
        localStorage.removeItem('role_name')
        localStorage.removeItem('is_personal')
        localStorage.removeItem('kind')
        localStorage.removeItem('zipcode')
        localStorage.removeItem('prefecture')
        localStorage.removeItem('city')
        localStorage.removeItem('building')
        localStorage.removeItem('telephone')
        localStorage.removeItem('fax')
        localStorage.removeItem('email')
        localStorage.removeItem('password')
        localStorage.removeItem('introduction')
        localStorage.removeItem('available_contents')
        localStorage.removeItem('available_jobs')
        localStorage.removeItem('available_prices')
        localStorage.removeItem('available_amounts')
      }
    }
  }
  </script>
  <style lang="scss" scoped>
  @mixin sp {
      @media screen and (max-width: 768px) {
          @content;
      }
  }
  </style>