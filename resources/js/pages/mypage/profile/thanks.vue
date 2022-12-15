<template>
  <div class="common_page form_page register_form">
    <main>
			<section class="section mv_area">
				<h1>マイプロフィール<br class="display_sp">更新完了</h1>
				<div class="topicpath">
					<div class="sitewrap">
						<ol id="pan">
							<li><router-link :to="{ name: 'home' }">TOP</router-link></li>
							<li><router-link :to="{ name: 'mypage' }">支援者マイページ</router-link></li>
							<li><router-link :to="{ name: 'profile' }">マイプロフィール</router-link></li>
							<li><span>マイプロフィール更新完了</span></li>
						</ol>
					</div>
				</div>
			</section>
			<div class="content_area form_wrap thanks">
				<section class="section lead">
					<div class="sitewrap">
						<h2 class="h_style01">マイプロフィールの更新が完了しました</h2>
						<div class="texts spacer">
							<p>入力頂いた情報の更新が完了いたしました。</p>
							<p>ご登録いただいているメールアドレス宛に、更新したマイプロフィールの内容をメール配信しております。</p>
							<p>メールが届かない場合、【メールアドレスの間違い】や【メール受信設定されていない】または【迷惑メールフォルダ】に入ってしまっている可能性がありますので、ご確認ください。</p>
						</div>
						<div class="common_btn2 backbtn">
							<router-link :to="{ name: 'mypage' }" href="" class="blue"><span>マイページへ戻る</span></router-link>
						</div>
					</div>
				</section>
			</div>
		</main>
  </div>
</template>
<script>
export default {
  layout: 'default',
  data() {
    return {
      introduction: ""
    }
  },
  created() {
		window.document.title = 'マイプロフィール更新完了 | 支援機関マイページ | 補助金活用.COM'
		window.document.description = '事業者×支援機関マッチングサイト補助金活用.COMの「マイプロフィール更新完了」ページです。認定支援機関の登録情報および、支援可能条件について、入力いただいた内容にて変更が完了いたしました。変更内容は支援機関マイページに反映されます。'
	},
  mounted() {
  },
  methods: {
    async registerProc() {
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
.register__container {
  width: 600px;
  margin-left: auto;
  margin-right: auto;
  padding-top: 50px;
  padding-bottom: 50px;

  @include sp {
    width: 90vw;
    padding-top: 5vw;
  }

  h2 {
    font-size: 26px;
    text-align: center;
    color: var(--main-color);
    margin-bottom: 60px;
    position: relative;

    @include sp {
      font-size: 5vw;
      margin-bottom: 10vw;
    }

    &:before {
      content: "";
      position: absolute;
      left: 50%;
      bottom: -20px;
      transform: translate(-50%, 0);
      width: 50px;
      height: 1px;
      background-color: var(--main-color);

      @include sp {
        bottom: -5vw;
        width: 20vw;
      }
    }

    &.non_border {
      margin-bottom: 40px;
      &:before {
        display: none;
      }
    }
  }

  .note {
    margin-top: 15px;
    line-height: 1.7;

    @include sp {
      margin-top: 4vw;
    }
  }

  .form {
    padding-top: 20px;

    @include sp {
      padding-top: 5vw;
    }
    textarea {
      width: 100%;
      height: 200px;
      border: 1px solid #ddd;
      resize: none;
      border-radius: 10px;
      padding: 10px;

      @include sp {
        height: 40vw;
        border-radius: 2vw;
        padding: 3vw;
      }
    }
  }

  .form__action {
    display: flex;
    align-items: center;
    justify-content: center;
    padding-top: 20px;

    @include sp {
      padding-top: 5vw;
    }

    button {
      padding-left: 30px;
      padding-right: 30px;
      height: 40px;
      border-radius: 5px;
      background-color: var(--main-color);
      color: #fff;
      border: 0;
      font-weight: bold;

      @include sp {
        padding-left: 6vw;
        padding-right: 6vw;
        height: 10vw;
        border-radius: 1vw;
      }

      &:hover {
        border: 1px solid var(--accent-color);
      }
    }
  }
}
</style>