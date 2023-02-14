<template>
  <div class="register__container">
    <h2>パスワードリセット</h2>
    <div class="form__part">
      <div class="form__row">
        <label><span class="must">*</span>新しいパスワード</label>
        <p>
          <input type="password" placeholder="新しいパスワード" v-model="password" maxlength="12" minlength="8"/>
        </p>
      </div>
      <div class="form__row">
        <label>確認のための<br/>新しいパスワード</label>
        <p>
          <input type="password" placeholder="確認のための新しいパスワード" v-model="password_confirm" maxlength="12" minlength="8"/>
        </p>
      </div>
      <div class="form__action">
        <button @click="resetPassword">変更する</button>
      </div>
    </div>
  </div>
</template>
<script>
import { PREFECTURES } from "../../const"
export default {
  layout: 'default',
  middleware: 'guest',
  data() {
    return {
      password: "",
      password_confirm: ""
    }
  },
  created() {
		window.document.title = 'パスワードの再設定 | 補助金活用.COM'
		$('meta[name=description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「パスワードの再設定」ページです。マイページへログインするためのパスワードをリセットし新規パスワードを設定します。パスワードリセットの申請に心当たりがない場合は対応不要です。')
    $('meta[name=og:description]').attr('content','事業者×支援機関マッチングサイト補助金活用.COMの「パスワードの再設定」ページです。マイページへログインするためのパスワードをリセットし新規パスワードを設定します。パスワードリセットの申請に心当たりがない場合は対応不要です。')
	},
  mounted() {
  },
  methods: {
    checkPassword(password) { 
      var paswd=  /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
      if(password.match(paswd)) 
      { 
          return true;
      } else { 
          return false;
      }
    },
    async resetPassword() {
      // validation
      if (this.password != this.password_confirm) {
          this.$swal('', '確認のための新しいパスワードが違います。')
          return
      }
      if (this.password.length < 8) {
          this.$swal('', '半角英数字8文字以上入力してください')
          return
      }

      try {
          const { data } = await axios.post('/api/reset_password', {
              email: this.$route.query.email,
              token: this.$route.query.token,
              password: this.password
          })
          if (data.status == 0) {
              this.$swal('', 'エラーが発生しました。')
              return
          } else if (data.status == 1) {
              this.$swal('', 'トークンの有効時間を過ぎました。')
              return
          } else if (data.status == 2) {
              this.$swal('', 'トークンが違います。')
              return
          } else {
              this.$swal('', 'パスワードリセットしました。')
              this.$router.push({ name: 'login' })
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