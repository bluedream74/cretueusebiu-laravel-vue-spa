(window.webpackJsonp=window.webpackJsonp||[]).push([[20],{231:function(n,t,e){var a=e(344);"string"==typeof a&&(a=[[n.i,a,""]]);var i={hmr:!0,transform:void 0,insertInto:void 0};e(8)(a,i);a.locals&&(n.exports=a.locals)},27:function(n,t,e){"use strict";e.r(t);var a=e(1),i=e.n(a),r=e(5),o=e(2),s=e.n(o);function d(n,t,e,a,i,r,o){try{var s=n[r](o),d=s.value}catch(n){return void e(n)}s.done?t(d):Promise.resolve(d).then(a,i)}var u={props:["user"],data:function(){return{liked:!1,SEXALITY:r.j,PREFECTURES:r.h}},mounted:function(){var n=this,t=this.$store.getters["auth/user"].favorites.find((function(t){return t.target_id==n.$props.user.id}));this.liked=!!t},methods:{isNewly:function(){var n=s()(),t=s()(this.$props.user.created_at);return n.diff(t,"days")<=7},toggle:function(n){var t,e=this;return(t=i.a.mark((function t(){return i.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return n.stopPropagation(),n.preventDefault(),e.liked=!e.liked,t.prev=3,t.next=6,axios.post("/api/favorite_proc",{target_id:e.$props.user.id,liked:e.liked});case 6:t.sent.data,e.$store.dispatch("auth/fetchUser"),t.next=13;break;case 11:t.prev=11,t.t0=t.catch(3);case 13:case"end":return t.stop()}}),t,null,[[3,11]])})),function(){var n=this,e=arguments;return new Promise((function(a,i){var r=t.apply(n,e);function o(n){d(r,a,i,o,s,"next",n)}function s(n){d(r,a,i,o,s,"throw",n)}o(void 0)}))})()},toDetail:function(){this.$router.push({name:"user.detail",query:{id:this.$props.user.id}})}}},c=(e(343),e(4)),p=Object(c.a)(u,(function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("div",{staticClass:"user_item",on:{click:n.toDetail}},[e("div",{staticClass:"avatar"},[n.user.avatars.length>0?e("img",{attrs:{src:n.user.avatars[0].avatar_url}}):e("img",{attrs:{src:"/asset/profile_avatar.png"}})]),n._v(" "),e("div",{staticClass:"info"},[e("p",{staticClass:"name"},[n._v(n._s(n.user.profile.nickname)+"("+n._s(n.user.profile.age+18)+"歳)")]),n._v(" "),e("p",{staticClass:"tags"},[e("span",[n._v(n._s(n.SEXALITY[n.user.profile.sexality]))]),e("span",[n._v(n._s(n.PREFECTURES[n.user.profile.area]))])])]),n._v(" "),n.isNewly()?e("span",{staticClass:"newly"},[n._v("NEW")]):n._e(),n._v(" "),e("a",{staticClass:"favorite_btn",on:{click:n.toggle}},[n.liked?e("img",{attrs:{src:"/asset/star-solid.svg"}}):e("img",{attrs:{src:"/asset/star-regular.svg"}})])])}),[],!1,null,"8b24319a",null);t.default=p.exports},343:function(n,t,e){"use strict";e(231)},344:function(n,t,e){(n.exports=e(7)(!1)).push([n.i,".user_item[data-v-8b24319a] {\n  width: calc((100% - 60px) / 4);\n  margin-right: 20px;\n  margin-bottom: 20px;\n  border: 1px solid #ddd;\n  position: relative;\n  cursor: pointer;\n  border-radius: 10px;\n  overflow: hidden;\n}\n@media screen and (max-width: 768px) {\n.user_item[data-v-8b24319a] {\n    width: calc((100% - 4vw) / 2);\n    margin-right: 4vw;\n    margin-bottom: 4vw;\n    border-radius: 2vw;\n}\n}\n.user_item .newly[data-v-8b24319a] {\n  position: absolute;\n  left: 10px;\n  top: 10px;\n  background-color: #ec5f5f;\n  color: #fff;\n  padding-left: 5px;\n  padding-right: 5px;\n  height: 20px;\n  display: flex;\n  align-items: center;\n  justify-content: center;\n  font-size: 12px;\n}\n@media screen and (max-width: 768px) {\n.user_item .newly[data-v-8b24319a] {\n    left: 3vw;\n    top: 3vw;\n    padding-left: 1vw;\n    padding-right: 1vw;\n    height: 5vw;\n    font-size: 3vw;\n}\n}\n.user_item .avatar[data-v-8b24319a] {\n  position: relative;\n  width: 100%;\n  padding-top: 100%;\n  overflow: hidden;\n}\n.user_item .avatar img[data-v-8b24319a] {\n  position: absolute;\n  left: 0;\n  top: 0;\n  width: 100%;\n  height: 100%;\n  -o-object-fit: cover;\n     object-fit: cover;\n}\n.user_item[data-v-8b24319a]:nth-of-type(4n) {\n  margin-right: 0;\n}\n@media screen and (max-width: 768px) {\n.user_item[data-v-8b24319a]:nth-of-type(2n) {\n    margin-right: 0;\n}\n}\n.user_item .info[data-v-8b24319a] {\n  padding: 14px;\n  font-size: 14px;\n}\n@media screen and (max-width: 768px) {\n.user_item .info[data-v-8b24319a] {\n    padding: 2vw;\n    font-size: 3.5vw;\n}\n}\n.user_item .info .name[data-v-8b24319a] {\n  margin-bottom: 10px;\n}\n@media screen and (max-width: 768px) {\n.user_item .info .name[data-v-8b24319a] {\n    margin-bottom: 2vw;\n}\n}\n.user_item .info .tags[data-v-8b24319a] {\n  display: flex;\n  align-items: center;\n  justify-content: flex-end;\n}\n.user_item .info .tags span[data-v-8b24319a] {\n  padding-left: 5px;\n  padding-right: 5px;\n  height: 20px;\n  font-size: 12px;\n  color: #fff;\n  border-radius: 4px;\n}\n@media screen and (max-width: 768px) {\n.user_item .info .tags span[data-v-8b24319a] {\n    padding-left: 1vw;\n    padding-right: 1vw;\n    height: 5vw;\n    font-size: 3vw;\n}\n}\n.user_item .info .tags span[data-v-8b24319a]:first-of-type {\n  background-color: var(--main-color);\n}\n.user_item .info .tags span[data-v-8b24319a]:last-of-type {\n  background-color: #fff;\n  color: #333;\n  border: 1px solid #333;\n  margin-left: 4px;\n}\n.user_item .info .block_action[data-v-8b24319a] {\n  display: flex;\n  justify-content: center;\n  padding-top: 6px;\n}\n.user_item .info .block_action button[data-v-8b24319a] {\n  width: 100%;\n  height: 24px;\n  display: flex;\n  align-items: center;\n  justify-content: center;\n  font-size: 12px;\n  background-color: #fff;\n  border: 1px solid #333;\n  color: #333;\n  border-radius: 4px;\n}\n.favorite_btn[data-v-8b24319a] {\n  position: absolute;\n  right: 10px;\n  top: 10px;\n  width: 30px;\n  height: 30px;\n}\n.favorite_btn img[data-v-8b24319a] {\n  width: 100%;\n}",""])},5:function(n,t,e){"use strict";e.d(t,"h",(function(){return a})),e.d(t,"j",(function(){return i})),e.d(t,"a",(function(){return r})),e.d(t,"e",(function(){return o})),e.d(t,"d",(function(){return s})),e.d(t,"i",(function(){return d})),e.d(t,"k",(function(){return u})),e.d(t,"f",(function(){return c})),e.d(t,"m",(function(){return p})),e.d(t,"g",(function(){return f})),e.d(t,"c",(function(){return l})),e.d(t,"l",(function(){return v})),e.d(t,"b",(function(){return g})),e.d(t,"n",(function(){return m})),e.d(t,"o",(function(){return h}));var a=["北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","山梨県","長野県","新潟県","富山県","石川県"," 福井県","東京都","神奈川県","千葉県","埼玉県","群馬県","茨城県","栃木県","山梨県","愛知県","静岡県","岐阜県","三重県","大阪府","兵庫県","京都府","滋賀県","奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県","海外"],i=["ストレート","ゲイ","レズビアン","バイセクシャル","ノンセクシャル","アセクシャル","トランスジェンダ","パンセクシャル","アロマンティック","どれでもない"],r=["やせ型","標準","筋肉質","ぽっちゃり","太っている","その他"],o=["会社員","公務員","自営業","専門職","アルバイト","その他"],s=["土日祝日休み","シフト制（固定）","シフト（不定）","好きな時に休める","その他"],d=["300万円以下","300〜500万","500〜700万","700〜900万","900万以上"],u=["中学","高校","高専","専門学校","短大","大学","大学院","その他"],c=["飲む","あまり飲まない","全く飲まない"],p=["吸う","たまに吸う","全く吸わない"],f=["あり","なし"],l=["結婚歴あり子供なし","結婚歴あり子供あり（同居中）","結婚歴あり子供あり（別居中）","結婚歴なし"],v=["同居","別居","その他"],g=["望む（性交渉あり）","望む（性交渉なし）","望まない・相談"],m=function(){for(var n=[],t=18;t<=70;t++)n.push(t);return n},h=function(){for(var n=[],t=140;t<=200;t++)n.push(t);return n}}}]);