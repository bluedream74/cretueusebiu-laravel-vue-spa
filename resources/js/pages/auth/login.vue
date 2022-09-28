<template>
  <div class="register__container">
    <h2>ログイン</h2>
    <div class="form__part">
      <div class="form__row">
        <label><span class="must">*</span>メールアドレス</label>
        <p>
          <input type="email" v-model="email" placeholder="test@example.com" />
        </p>
      </div>
      <div class="form__row">
        <label><span class="must">*</span>パスワード<br/><span class="note">8文字以上</span></label>
        <p>
          <input type="password" v-model="password" placeholder="********" />
        </p>
      </div>
      <div class="form__action">
        <button @click="loginProc">ログインする</button>
      </div>
      <div class="password_reset">
        <router-link :to="{ name: 'password_reset' }">パスワードを忘れた方はこちら</router-link>
        <p class="note">メールアドレスを忘れた方はお問い合わせフォームよりご連絡ください</p>
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
      email: "",
      password: ""
    }
  },
  mounted() {
  },
  methods: {
    async loginProc() {
      // validation
      if (this.email.trim() == '' || this.password.trim() == '') {
          this.$swal('', '必須項目を入力してください')
          return
      }

      try {
          const { data } = await axios.post('/api/login', {
            email: this.email,
            password: this.password
          })
          console.log(data, "_____datadatadatadata")
          this.$store.dispatch('auth/saveToken', {
            token: data.token,
            remember: true
          })
          await this.$store.dispatch('auth/fetchUser')
          const last_pass = await window.localStorage.getItem('last_pass')
          if (!!last_pass) {
              window.location.href = last_pass
          } else {
              this.$router.push({ name: 'home1' })
          }
          
      } catch (error) {
          this.$swal('', error.response.data.errors.email[0])
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
  padding-top: 30px;
  text-align: center;

  a {
    font-size: 14px;
    text-decoration: underline;
  }

  .note {
    text-align: center;
    padding-top: 20px;
  }
}
</style>