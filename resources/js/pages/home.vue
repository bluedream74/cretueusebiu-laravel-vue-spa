<template>
  <main>
    <section class="mv_wrap action holizon_open">
      <div class="sitewrap">
        <h1 class="mv_tit action ups delay_2">
          <b>補助金申請</b>のことなら<br>
          <strong>事業者</strong><span><img src="/assets/img/top/txt_deco01.png" alt="×"></span><strong>支援機関</strong><br>
          マッチングサイト
        </h1>
        <router-link :to="{ name: 'consultant_form' }" class="form_btn action ups delay_3">
          <img src="/assets/img/top/img_free.png" alt="補助金を受けたいと考えている方へ認定支援機関に無料相談する" class="display_pc">
          <img src="/assets/img/top/img_free_sp.png" alt="補助金を受けたいと考えている方へ認定支援機関に無料相談する" class="display_sp">
        </router-link>
        <p class="lead action ups delay_4">当サイトは事業者の方と国（経済産業大臣）が認定した<br class="display_pc">
          <span>「認定経営革新等支援機関」をマッチングするサイト</span>です。<br class="display_pc">
          事業者の方の悩み事、相談事を解決するためにご利用ください。
        </p>
      </div>
    </section>
    <section class="worry_wrap">
      <div class="sitewrap">
        <h2 class="tit action ups"><b>補助金申請</b>の<b class="deco">お悩み</b><br class="display_sp">ありませんか？</h2>
        <div class="list action ups delay_2">
          <div class="img"><img src="/assets/img/top/img_worry01.jpg" alt="悩む人の写真"></div>
          <div class="txt">
            <p>補助金申請の流れが分からない。</p>
            <p>どんな補助金が受けられるのかわからない。</p>
            <p>補助金申請する時間がない！</p>
          </div>
        </div>
      </div>
    </section>
    <section class="step_wrap">
      <div class="sitewrap">
        <h2 class="tit action ups">簡単な<b class="deco">3</b>ステップで<br class="display_sp"><b>マッチング！</b></h2>
        <div class="list action feders delay_set">
          <div class="items">
            <h3 class="step_tit"><span>STEP<b>1</b></span></h3>
            <div class="img"><img src="/assets/img/top/img_step01.png" alt="考えるイメージイラスト"></div>
            <p class="text"><span>補助金申請</span>を考えている。<br>でも、どの補助金が受けとれるか分からない。</p>
          </div>
          <div class="items">
            <h3 class="step_tit"><span>STEP<b>2</b></span></h3>
            <div class="img"><img src="/assets/img/top/img_step02.png" alt="相談に受けるイメージイラスト"></div>
            <p class="text"><span>まずは相談！<br>全ておまかせで大丈夫！</span></p>
          </div>
          <div class="items">
            <h3 class="step_tit"><span>STEP<b>3</b></span></h3>
            <div class="img"><img src="/assets/img/top/img_step03.png" alt="マッチングするイメージイラスト"></div>
            <p class="text">あとは<span>自動でマッチング！</span><br>支援機関からメールが届きます！</p>
          </div>
        </div>
      </div>
    </section>
    <section class="entrust_wrap">
      <div class="sitewrap">
        <h2 class="tit action ups"><b>補助金活用.COMに<br class="display_sp">お任せください</b></h2>
        <div class="list action feders delay_set">
          <div class="items">
            <div class="img"><img src="/assets/img/top/img_entrust01.jpg" alt="ものづくりのイメージ"></div>
            <h3 class="items_tit">ものづくり補助金</h3>
            <p>正式名称は、ものづくり・商業・サービス生産性向上促進補助金です。<br>製造業のほか小売業や飲食業のネットショップ構築など幅広い用途で活用されているので多くの方にお勧めできる補助金です。</p>
          </div>
          <div class="items">
            <div class="img"><img src="/assets/img/top/img_entrust02.jpg" alt="IT導入のイメージ"></div>
            <h3 class="items_tit">IT導入補助金</h3>
            <p>ソフトウェア等のIT ツールを導入する際に補助を受けることができます。会計ソフト・受発注ソフト・決済ソフト・ECソフトの導入やPC・タブレット・レジ等の導入も対象となります</p>
          </div>
          <div class="items">
            <div class="img"><img src="/assets/img/top/img_entrust03.jpg" alt="事業再構築するイメージ"></div>
            <h3 class="items_tit">事業再構築補助金</h3>
            <p>コロナ禍または原油価格・物価高騰等により業況が厳しい個人事業主や中小事業者が思い切った取組をする場合に活用できる補助金です。建物費や一時移転費も補助対象です。</p>
          </div>
        </div>
        <h3 class="sub_tit action ups"><span>他にも様々な補助金があります</span></h3>
        <div class="common_btn action ups delay_2"><router-link :to="{ name: 'consultant_form' }"><span>認定支援機関に<b>無料相談</b>する</span></router-link></div>
      </div>
    </section>
    <section class="consultation_wrap">
      <div class="sitewrap">
        <h2 class="tit action ups"><b>ただいま、<br class="display_sp">掲載中のご相談</b></h2>
        <p class="sub_tit action ups delay_2"><span>掲載された内容は、<br class="display_sp">支援機関と随時マッチング</span></p>
        <div class="slider action holizon_open">
          <div class="items" v-for="(item, index) in consultants" :key="index">
            <p class="pref">都道府県：{{ item.prefecture }}</p>
            <dl class="detail">
              <dt>概 要</dt>
              <dd>{{ item.message_title }}</dd>
            </dl>
            <div class="cat">
              <span class="type">{{ JOBS[item.job] }}</span>
              <span class="num">{{ AMOUNTS[item.amount] }}</span>
              <span class="sales">年商　{{ PRICES[item.income] }}</span>
            </div>
          </div>
        </div>
        <div class="common_btn action ups"><router-link :to="{ name: 'consultant' }"><span>最新の相談をみる</span></router-link></div>
      </div>
    </section>
    <section class="add_wrap">
      <div class="sitewrap">
        <h2 class="sub_tit action ups"><span>税務、金融・財務の豊富な専門的知識と、<br class="display_sp">実務経験をもつ多くの支援機関が登録しています。</span></h2>
        <p class="add_tit action ups delay_2">おすすめの認定支援機関</p>
        <div class="list action feders delay_set">
          <a :href="item.link" target="_blank" v-for="(item, index) in banners" :key="index"><img :src="item.image_url" alt="広告アドのバナー"></a>
        </div>
      </div>
    </section>
    <section class="register_wrap">
      <div class="sitewrap">
        <div class="list action feders delay_set">
          <p class="register_tit">支援機関も募集しています。</p>
          <div class="common_btn"><router-link :to="{ name: 'register' }"><span>支援機関に新規登録する</span></router-link></div>
        </div>
      </div>
    </section>
    <section class="news_wrap">
      <div class="sitewrap">
        <h2 class="tit action ups"><b>お知らせ</b></h2>
        <ul class="topics_list action feders delay_set">
          <li v-for="(item, index) in news" :key="index">
            <article><a @click="toDetailNews(item)">
                <time>{{ item.created_at | dateFormatEnDot }}</time>
                <p>{{ item.title }}</p>
              </a></article>
          </li>
        </ul>
        <div class="more_link">
          <router-link :to="{ name: 'news' }"><span>お知らせ一覧　＞</span></router-link>
        </div>
      </div>
    </section>
  </main>
</template>
<script>
import { JOBS, AMOUNTS, PRICES } from '../const'
import moment from 'moment'
export default {
  layout: 'default',
  data() {
    return {
      consultants: [],
      news: [],
      banners: [],
      JOBS: JOBS,
      AMOUNTS: AMOUNTS,
      PRICES: PRICES,
    }
  },
  created() {
    window.document.title = '補助金活用.COM | 補助金申請のことなら事業者×支援機関マッチングサイト'
    $('meta[name=description]').attr('content','補助金活用.COMのホームページです。当サイトは事業者の方と国（経済産業大臣）が認定した「認定経営革新等支援機関」をマッチングするサイトです。事業者の方の悩み事、相談事を解決するためにご利用ください。')
    $('meta[name=og:description]').attr('content','補助金活用.COMのホームページです。当サイトは事業者の方と国（経済産業大臣）が認定した「認定経営革新等支援機関」をマッチングするサイトです。事業者の方の悩み事、相談事を解決するためにご利用ください。')
  },
  mounted() {
    setTimeout(() => {
      let recaptchaScript = document.createElement('script')
      recaptchaScript.setAttribute('src', 'https://hojyokin-katsuyou.com/assets/js/common.js')
      document.head.appendChild(recaptchaScript)
    }, 1000)

    this.init()
  },
  methods: {
    async init() {
      try {
        const { data } = await axios.post('/api/get_home_data')
        this.consultants = data.consultants.filter((item, index) => {
          return index < 10
        }).filter(item => {
          return moment(item.expired_at).format('YYYYMMDD') >= moment().format('YYYYMMDD')
        })
        this.news = data.news
        this.banners = data.banners
      } catch (error) {
      }
    },

    toDetailNews(item) {
      if (!!item.url) {
        window.open(item.url, "_blank");
      } else if (!!item.pdf) {
        window.open(item.pdf_url, "_blank");
      } else {
        this.$router.push({ name: 'news.detail', query: { id: item.id } })
      }
    },

    async toConsultantDetail(id) {
      if (!this.$store.getters['auth/user']) {
        this.$router.push({ name: 'consultant_detail', query: { id: id } })
        return
      }
      try {
        const { data } = await axios.post('/api/check_consultant_answer', {
          id: id
        })
        if (!!data.answer) {
          this.$router.push({ name: 'history_detail', query: { id: id } })
        } else {
          this.$router.push({ name: 'consultant_detail', query: { id: id } })
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
</style>