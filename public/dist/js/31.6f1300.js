(window.webpackJsonp=window.webpackJsonp||[]).push([[31],{260:function(n,t,e){var a=e(402);"string"==typeof a&&(a=[[n.i,a,""]]);var i={hmr:!0,transform:void 0,insertInto:void 0};e(8)(a,i);a.locals&&(n.exports=a.locals)},401:function(n,t,e){"use strict";e(260)},402:function(n,t,e){(n.exports=e(7)(!1)).push([n.i,'.news__container[data-v-5de87079] {\n  width: 600px;\n  margin-left: auto;\n  margin-right: auto;\n  padding-top: 30px;\n  padding-bottom: 60px;\n}\n@media screen and (max-width: 768px) {\n.news__container[data-v-5de87079] {\n    width: 90vw;\n    padding-top: 6vw;\n    padding-bottom: 10vw;\n}\n}\nh2[data-v-5de87079] {\n  font-size: 26px;\n  text-align: center;\n  color: var(--main-color);\n  margin-bottom: 60px;\n  position: relative;\n}\n@media screen and (max-width: 768px) {\nh2[data-v-5de87079] {\n    font-size: 5vw;\n    margin-bottom: 10vw;\n}\n}\nh2[data-v-5de87079]:before {\n  content: "";\n  position: absolute;\n  left: 50%;\n  bottom: -20px;\n  transform: translate(-50%, 0);\n  width: 50px;\n  height: 1px;\n  background-color: var(--main-color);\n}\n@media screen and (max-width: 768px) {\nh2[data-v-5de87079]:before {\n    bottom: -5vw;\n    width: 20vw;\n}\n}\nh2.non_border[data-v-5de87079] {\n  margin-bottom: 40px;\n}\nh2.non_border[data-v-5de87079]:before {\n  display: none;\n}\n.news__list[data-v-5de87079] {\n  padding-top: 30px;\n  margin-bottom: 30px;\n}\n@media screen and (max-width: 768px) {\n.news__list[data-v-5de87079] {\n    padding-top: 6vw;\n}\n}\n.news__list .news__item[data-v-5de87079] {\n  width: 100%;\n  align-items: center;\n  display: flex;\n}\n@media screen and (max-width: 768px) {\n.news__list .news__item[data-v-5de87079] {\n    display: block;\n}\n}\n.news__list .news__item .date[data-v-5de87079] {\n  margin-right: 20px;\n  color: #5c4a3c;\n  font-weight: bold;\n}\n@media screen and (max-width: 768px) {\n.news__list .news__item .date[data-v-5de87079] {\n    font-size: 3.5vw;\n    margin-right: 0;\n}\n}\n.news__list .news__item .content[data-v-5de87079] {\n  font-size: 14px;\n}\n@media screen and (max-width: 768px) {\n.news__list .news__item .content[data-v-5de87079] {\n    font-size: 3.5vw;\n}\n}',""])},77:function(n,t,e){"use strict";e.r(t);var a=e(1),i=e.n(a);function o(n,t,e,a,i,o,s){try{var d=n[o](s),r=d.value}catch(n){return void e(n)}d.done?t(r):Promise.resolve(r).then(a,i)}var s={mounted:function(){this.init()},data:function(){return{news:null}},methods:{back:function(){this.$router.back()},init:function(){var n,t=this;return(n=i.a.mark((function n(){var e,a;return i.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return n.prev=0,n.next=3,axios.post("/api/get_news_detail",{id:t.$route.query.id});case 3:e=n.sent,a=e.data,t.news=a.news,n.next=10;break;case 8:n.prev=8,n.t0=n.catch(0);case 10:case"end":return n.stop()}}),n,null,[[0,8]])})),function(){var t=this,e=arguments;return new Promise((function(a,i){var s=n.apply(t,e);function d(n){o(s,a,i,d,r,"next",n)}function r(n){o(s,a,i,d,r,"throw",n)}d(void 0)}))})()}}},d=(e(401),e(4)),r=Object(d.a)(s,(function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("div",{staticClass:"news__container"},[n.news?e("h2",[n._v(n._s(n.news.title))]):n._e(),n._v(" "),e("div",{staticClass:"news__list"},[e("p",{staticClass:"date"},[n._v(n._s(n._f("productUpTimeFormat")(n.news.created_at)))]),n._v(" "),e("div",{staticClass:"content"},[n._v("\n      "+n._s(n.news.content)+"\n    ")])]),n._v(" "),e("div",{staticClass:"back_btn"},[e("button",{on:{click:n.back}},[n._v("戻る")])])])}),[],!1,null,"5de87079",null);t.default=r.exports}}]);