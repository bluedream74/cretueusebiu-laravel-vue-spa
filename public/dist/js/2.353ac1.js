(window.webpackJsonp=window.webpackJsonp||[]).push([[2],{234:function(n,t,e){var o=e(350);"string"==typeof o&&(o=[[n.i,o,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0};e(8)(o,r);o.locals&&(n.exports=o.locals)},28:function(n,t,e){"use strict";e.r(t);var o=e(1),r=e.n(o),a=e(5);function i(n,t,e,o,r,a,i){try{var c=n[a](i),s=c.value}catch(n){return void e(n)}c.done?t(s):Promise.resolve(s).then(o,r)}function c(n){return function(){var t=this,e=arguments;return new Promise((function(o,r){var a=n.apply(t,e);function c(n){i(a,o,r,c,s,"next",n)}function s(n){i(a,o,r,c,s,"throw",n)}c(void 0)}))}}var s={layout:"admin",middleware:"admin",data:function(){return{chatrooms:[],answer:"",SEXALITY:a.j,PREFECTURES:a.h,columns:[{label:"ユーザー１",field:"user1"},{label:"ユーザー２",field:"user2"},{label:"メッセージ数",field:"message_count"},{label:"詳細",field:"detail"}],rows:[],showModal:!1,currentContact:null}},mounted:function(){this.init()},methods:{init:function(){var n=this;return c(r.a.mark((function t(){var e,o;return r.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return t.prev=0,t.next=3,axios.post("/admin/get_chatrooms");case 3:e=t.sent,o=e.data,n.chatrooms=o.chatrooms,n.rows=n.chatrooms,t.next=11;break;case 9:t.prev=9,t.t0=t.catch(0);case 11:case"end":return t.stop()}}),t,null,[[0,9]])})))()},toDetail:function(n){this.$router.push({name:"admin.chatrooms.detail",query:{id:n.id}})},blockUser:function(n){var t=this;return c(r.a.mark((function e(){var o,a;return r.a.wrap((function(e){for(;;)switch(e.prev=e.next){case 0:return e.prev=0,e.next=3,axios.post("/admin/block_user",{user_id:n});case 3:o=e.sent,a=o.data,t.chatrooms=a.chatrooms,t.rows=t.chatrooms,e.next=11;break;case 9:e.prev=9,e.t0=e.catch(0);case 11:case"end":return e.stop()}}),e,null,[[0,9]])})))()}}},d=(e(349),e(4)),u=Object(d.a)(s,(function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("div",{staticClass:"admin__container"},[e("h1",[n._v("チャット一覧")]),n._v(" "),e("div",{staticClass:"table"},[e("vue-good-table",{attrs:{columns:n.columns,rows:n.rows,"line-numbers":!0,"pagination-options":{enabled:!0,mode:"pages",perPage:50,position:"top",perPageDropdown:[50,100,200],dropdownAllowAll:!1,setCurrentPage:1,nextLabel:"次",prevLabel:"前",rowsPerPageLabel:"表示行数",ofLabel:"合計",pageLabel:"ページ",allLabel:"すべて"},"search-options":{enabled:!0,skipDiacritics:!0,placeholder:"検索する条件を入力してください。"}},scopedSlots:n._u([{key:"table-row",fn:function(t){return["user1"==t.column.field?e("div",[n._v("\n                "+n._s(t.row.participants[0]?t.row.participants[0].user.profile.nickname:"")+"\n              ")]):"user1_action"==t.column.field?e("div",{staticClass:"detail_btn"},[e("button",{on:{click:function(e){return n.blockUser(t.row.participants[0].user.id)}}},[n._v("非公開設定")])]):"user2"==t.column.field?e("div",[n._v("\n                "+n._s(t.row.participants[1]?t.row.participants[1].user.profile.nickname:"")+"\n              ")]):"user2_action"==t.column.field?e("div",{staticClass:"detail_btn"},[e("button",{on:{click:function(e){return n.blockUser(t.row.participants[1].user.id)}}},[n._v("非公開設定")])]):"message_count"==t.column.field?e("div",[n._v("\n                "+n._s(t.row.messages.length)+"\n              ")]):"detail"==t.column.field?e("div",{staticClass:"detail_btn"},[e("button",{on:{click:function(e){return n.toDetail(t.row)}}},[n._v("メッセージ一覧へ")])]):e("span",[n._v("\n                  "+n._s(t.formattedRow[t.column.field])+"\n              ")])]}}])})],1)])}),[],!1,null,"5886b595",null);t.default=u.exports},349:function(n,t,e){"use strict";e(234)},350:function(n,t,e){(n.exports=e(7)(!1)).push([n.i,".admin__container[data-v-5886b595] {\n  padding: 20px;\n  flex: 1;\n}\n.append_action[data-v-5886b595] {\n  display: flex;\n  justify-content: flex-end;\n}\n.append_action button[data-v-5886b595] {\n  width: 160px;\n  height: 30px;\n  border-radius: 4px;\n  border: 0;\n  background-color: #f09415;\n  color: white;\n  font-weight: bold;\n  display: flex;\n  align-items: center;\n  justify-content: center;\n}\n.table[data-v-5886b595] {\n  margin-top: 20px;\n}\n.detail_btn[data-v-5886b595] {\n  width: 200px;\n}\n.detail_btn p button[data-v-5886b595] {\n  width: 100%;\n  height: 30px;\n  border-radius: 4px;\n  border: 0;\n  background-color: #f09415;\n  color: white;\n  display: flex;\n  align-items: center;\n  justify-content: center;\n}\n.detail_btn p button.detail[data-v-5886b595] {\n  background-color: #1dc973;\n  margin-bottom: 5px;\n}\n.detail_btn p button.edit[data-v-5886b595] {\n  margin-bottom: 5px;\n  background-color: #0f7e47;\n}\nh1[data-v-5886b595] {\n  font-size: 20px;\n  font-weight: bold;\n  color: #333;\n  padding-left: 15px;\n  border-left: 2px solid #f09415;\n  margin-bottom: 10px;\n}\n.avatar[data-v-5886b595] {\n  display: flex;\n  width: 120px;\n  height: 180px;\n  border-radius: 10px;\n  position: relative;\n  overflow: hidden;\n  background-color: #ddd;\n}\n.avatar img[data-v-5886b595] {\n  position: absolute;\n  left: 0;\n  top: 0;\n  width: 100%;\n  height: 100%;\n  -o-object-fit: contain;\n     object-fit: contain;\n}\n.mask[data-v-5886b595] {\n  position: fixed;\n  left: 0;\n  top: 0;\n  width: 100%;\n  height: 100%;\n  background-color: rgba(0, 0, 0, 0.5);\n  z-index: 250;\n}\n.answer_modal[data-v-5886b595] {\n  width: 400px;\n  position: fixed;\n  left: 50%;\n  top: 50%;\n  transform: translate(-50%, -50%);\n  z-index: 300;\n  background-color: #fff;\n  padding: 20px;\n}\n.answer_modal textarea[data-v-5886b595] {\n  width: 100%;\n  height: 100px;\n  border: 1px solid #ccc;\n  border-radius: 5px;\n}",""])},5:function(n,t,e){"use strict";e.d(t,"h",(function(){return o})),e.d(t,"j",(function(){return r})),e.d(t,"a",(function(){return a})),e.d(t,"e",(function(){return i})),e.d(t,"d",(function(){return c})),e.d(t,"i",(function(){return s})),e.d(t,"k",(function(){return d})),e.d(t,"f",(function(){return u})),e.d(t,"m",(function(){return l})),e.d(t,"g",(function(){return p})),e.d(t,"c",(function(){return f})),e.d(t,"l",(function(){return b})),e.d(t,"b",(function(){return v})),e.d(t,"n",(function(){return h})),e.d(t,"o",(function(){return m}));var o=["北海道","青森県","岩手県","宮城県","秋田県","山形県","福島県","山梨県","長野県","新潟県","富山県","石川県"," 福井県","東京都","神奈川県","千葉県","埼玉県","群馬県","茨城県","栃木県","山梨県","愛知県","静岡県","岐阜県","三重県","大阪府","兵庫県","京都府","滋賀県","奈良県","和歌山県","鳥取県","島根県","岡山県","広島県","山口県","徳島県","香川県","愛媛県","高知県","福岡県","佐賀県","長崎県","熊本県","大分県","宮崎県","鹿児島県","沖縄県","海外"],r=["ストレート","ゲイ","レズビアン","バイセクシャル","ノンセクシャル","アセクシャル","トランスジェンダ","パンセクシャル","アロマンティック","どれでもない"],a=["やせ型","標準","筋肉質","ぽっちゃり","太っている","その他"],i=["会社員","公務員","自営業","専門職","アルバイト","その他"],c=["土日祝日休み","シフト制（固定）","シフト（不定）","好きな時に休める","その他"],s=["300万円以下","300〜500万","500〜700万","700〜900万","900万以上"],d=["中学","高校","高専","専門学校","短大","大学","大学院","その他"],u=["飲む","あまり飲まない","全く飲まない"],l=["吸う","たまに吸う","全く吸わない"],p=["あり","なし"],f=["結婚歴あり子供なし","結婚歴あり子供あり（同居中）","結婚歴あり子供あり（別居中）","結婚歴なし"],b=["同居","別居","その他"],v=["望む（性交渉あり）","望む（性交渉なし）","望まない・相談"],h=function(){for(var n=[],t=18;t<=70;t++)n.push(t);return n},m=function(){for(var n=[],t=140;t<=200;t++)n.push(t);return n}}}]);