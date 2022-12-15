<template>
  <div class="common_page form_page register_form">
    <main>
			<section class="section mv_area">
				<h1>支援機関新規登録 <br class="display_sp">登録完了</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><a href="index.html">支援機関新規登録</a></li>
							<li><span>登録完了</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap thanks">
				<section class="section lead">
					<div class="sitewrap">
						<h2 class="h_style01">支援機関新規登録が完了しました</h2>
						<div class="texts spacer">
							<p>この度は支援機関新規登録をご利用いただきありがとうございます。<br>
入力頂いた情報の登録が完了いたしました。</p>
							<p>支援機関ログインページより、登録したメールアドレス・パスワードを入力することでマイページ機能をご利用いただけます。</p>
						</div>
						<div class="common_btn2 backbtn">
							<router-link :to="{ name: 'login' }" class="blue"><span>ログインページへ</span></router-link>
						</div>
					</div>
				</section>

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
      }
    },
    created() {
      window.document.title = '支援機関新規登録 登録完了 | 補助金活用.COM'
      $('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「支援機関新規登録 登録完了」ページです。支援機関の新規登録が完了いたしました。支援機関ログインページより、登録したメールアドレス・パスワードを入力することでマイページ機能をご利用いただけます。')
    },
    mounted() {
      this.init()
    },
    methods: {
      init() {
      },
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