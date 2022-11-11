import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import { MdCheckbox, MdRadio, MdTable } from 'vue-material/dist/components'
import './filter/index'
import Trend from "vuetrend"
import axios from 'axios'
import VueSwal from 'vue-swal'
import Spinner from 'vue-simple-spinner'
import {ServerTable, ClientTable, Event} from 'vue-tables-2';
import SweetModal from 'sweet-modal-vue/src/plugin.js'
import VueGoodTablePlugin from 'vue-good-table';
import { VueHammer } from 'vue2-hammer'
import Autocomplete from 'v-autocomplete'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faUserSecret, faMagnifyingGlass } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faUserSecret, faMagnifyingGlass)
import firebase from 'firebase/app'
import 'firebase/firestore'
import TextareaAutosize from 'vue-textarea-autosize'
import Modal from "@burhanahmeed/vue-modal-2";
import 'firebase/auth'

import '~/plugins'
import '~/components'

//AWS setting
window.axios = axios;

Vue.config.productionTip = false
Vue.use(MdCheckbox)
Vue.use(MdRadio)
Vue.use(MdTable)
Vue.use(ClientTable);
Vue.use(Trend)
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.config.productionTip = false
Vue.use(VueSwal)
Vue.use(SweetModal)
Vue.use(Modal);
Vue.use(Autocomplete)
Vue.use(TextareaAutosize)
Vue.use(VueGoodTablePlugin);
Vue.use(Spinner)
Vue.use(VueHammer)

new Vue({
  i18n,
  store,
  router,
  ...App
})
