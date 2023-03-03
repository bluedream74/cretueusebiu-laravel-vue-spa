<template>
  <div class="common_page form_page forget_form">
    <main>
        <section class="section mv_area">
            <h1>パスワードの再設定完了</h1>
            <div class="topicpath">
                <div class="sitewrap">
                    <ol id="pan">
                        <li><router-link :to="{ name: 'home' }">TOP</router-link></li>
                        <li><span>パスワードの再設定完了</span></li>
                    </ol>
                </div>
            </div>
        </section>
        <div class="content_area form_wrap">
            <div class="section area01">
                <div class="sitewrap">
                    <p class="text t_center">パスワードの変更が完了しました。</p>
                    <div class="common_btn2 backbtn">
                        <router-link :to="{ name: 'login' }"><span>ログイン画面に戻る</span></router-link>
                    </div>
                </div>
            </div>
        </div>
    </main>
  </div>
</template>
<script>
import { PREFECTURES } from "../../const"
export default {
  layout: 'default',
  middleware: 'guest',
  data() {
    return {
      email: "",
    }
  },
  created() {
		window.document.title = 'パスワードを忘れた方 | 補助金活用.COM'
		$('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「パスワードを忘れた方」ページです。支援機関者登録済みで、マイページへログインするためのパスワードを忘れた方は必要事項を入力してください。パスワード再設定用のメールをお送りします。')
    $('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「パスワードを忘れた方」ページです。支援機関者登録済みで、マイページへログインするためのパスワードを忘れた方は必要事項を入力してください。パスワード再設定用のメールをお送りします。')
	},
  mounted() {
  },
  methods: {
    validateEmail(email) {
      const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(String(email).toLowerCase());
    },
    async passwordReset() {
      // validation
      if (!this.validateEmail(this.email)) {
        this.$swal('', 'メールアドレスの形式が違います。')
        return
      }

      try {
        const { data } = await axios.post('/api/send_password_reset_email', {
          email: this.email
        })
        if (data.status == 0) {
          this.$swal('', 'このメールアドレスは登録されていません')
          return
        } else {
          this.$swal('', this.email + '入力されたメールアドレスへパスワード再設定のリンクを送信しました')
        }
      } catch (error) {
      }
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
  padding-top: 60px;
  padding-bottom: 60px;

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

  .form__part {
    padding-top: 20px;

    @include sp {
      padding-top: 4vw;
    }

    .form__row {
      display: flex;
      align-items: center;
      margin-bottom: 20px;

      @include sp {
        margin-bottom: 4vw;
      }

      &.photo {
        align-items: flex-start;
      }

      label {
        font-size: 14px;
        width: 200px;
        padding-right: 10px;
        text-align: right;

        @include sp {
          font-size: 3.5vw;
          width: 40vw;
          padding-right: 2vw;
        }

        span.must {
          color: #ff0000;
        }

        span.note {
          font-size: 12px;
          color: #999;

          @include sp {
            font-size: 3vw;
          }
        }
      }

      .photo_group {
        flex: 1;
        display: flex;
        flex-wrap: wrap;

        .photo_item {
          width: calc((100% - 20px) / 3);
          margin-right: 10px;
          margin-bottom: 10px;
          position: relative;
          flex: none;

          &:nth-child(3n) {
            margin-right: 0;
          }

          span {
            position: relative;
            width: 100%;
            padding-top: 100%;
            overflow: hidden;
            border-radius: 4px;
            display: block;
          }
          img {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
          }

          &.append {
            img {
              position: absolute;
              left: 50%;
              top: 50%;
              transform: translate(-50%, -50%);
              width: 25px;
              height: 25px;
            }
          }
        }
      }

      p {
        flex: 1;
        input, select {
          width: 100%;
          height: 40px;
          border-radius: 5px;
          border: 1px solid rgb(211, 211, 211);
          padding-left: 6px;
          padding-right: 6px;

          @include sp {
            height: 10vw;
            border-radius: 1vw;
            padding-left: 1vw;
            padding-right: 1vw;
          }
        }

        input[type=checkbox] {
          width: 20px;
          height: 20px;

          @include sp {
            width: 5vw;
            height: 5vw;
          }
        }

        &.gender {
          display: flex;
          align-items: center;

          label {
            width: auto;
            margin-right: 20px;
            font-size: 14px;
            display: flex;
            align-items: center;

            @include sp {
              margin-right: 4vw;
              font-size: 3.5vw;
            }

            input {
              margin-right: 6px;
              width: 18px;
              height: 18px;

              @include sp {
                margin-right: 1vw;
                width: 4.5vw;
                height: 4.5vw;
              }
            }
          }
        }
      }
    }

    .form__action {
      display: flex;
      align-items: center;
      justify-content: center;

      button {
        padding-left: 30px;
        padding-right: 30px;
        height: 40px;
        border-radius: 5px;
        background-color: var(--main-color);
        color: #fff;
        font-weight: bold;
        border: 0;

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
}

.password_reset {
  display: flex;
  justify-content: center;
  padding-top: 30px;

  a {
    font-size: 14px;
    text-decoration: underline;
  }
}
</style>