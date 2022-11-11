import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import './filter/index'
import axios from 'axios'
import VueSwal from 'vue-swal'
import Spinner from 'vue-simple-spinner'
import SweetModal from 'sweet-modal-vue/src/plugin.js'

window.axios = axios;

Vue.config.productionTip = false
Vue.use(VueSwal)
Vue.use(SweetModal)
Vue.use(Spinner)

new Vue({
  i18n,
  store,
  router,
  ...App
})
