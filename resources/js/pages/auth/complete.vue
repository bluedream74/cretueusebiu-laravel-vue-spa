<template>
  <div class="register__container">
    <h2>登録が完了しました！</h2>
    <div class="introduction_part">
      <p class="note">
        自己紹介文を作成しよう（任意）<br/>
        ※自己紹介文を記入したほうがマッチングしやすくなります。<br/>
        ※個人を特定しやすくなるような情報は書かないで下さい。<br/>
        ※他のSNSやWebサイトへの誘導は違反行為です。<br/>
        違反行為を見つけた場合は直ちに登録を削除いたします。
      </p>
      <p class="form">
        <textarea v-model="introduction"></textarea>
      </p>
      <div class="form__action">
        <button @click="registerProc">この内容で登録する</button>
      </div>
    </div>
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
  mounted() {
  },
  methods: {
    async registerProc() {
      try {
        const { data } = await axios.post('/api/update_introduction', {
          user_id: this.$route.query.id,
          introduction: this.introduction
        })
        if (data.flag) {
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