import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import { MdCheckbox, MdRadio, MdTable } from 'vue-material/dist/components'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'
import './filter/index'
import Trend from "vuetrend"
import axios from 'axios'
import VueSwal from 'vue-swal'
import Spinner from 'vue-simple-spinner'
import {ServerTable, ClientTable, Event} from 'vue-tables-2';
import SweetModal from 'sweet-modal-vue/src/plugin.js'
import VueGoodTablePlugin from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css'
import { VueHammer } from 'vue2-hammer'
import Autocomplete from 'v-autocomplete'
import 'v-autocomplete/dist/v-autocomplete.css'
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
import AWS from 'aws-sdk';

export const aws_access_key_id = 'AKIAI7YE6URKTDVYDE4Q';
export const aws_secret_access_key = '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';
export const bucket_name = 'napll';
export const region= 'ap-northeast-1';
AWS.config.update({
  accessKeyId: aws_access_key_id,
  secretAccessKey: aws_secret_access_key,
  region: region
})
export const s3 = new AWS.S3({
  apiVersion: '2006-03-01',
  params: {
    Bucket: bucket_name
  }
})


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

var firebaseConfig = {
  apiKey: "AIzaSyBrE9w2uvYNv2NejvQ8v9utCqfNecDW1hw",
  authDomain: "nizimari-app.firebaseapp.com",
  projectId: "nizimari-app",
  storageBucket: "nizimari-app.appspot.com",
  messagingSenderId: "661365590906",
  appId: "1:661365590906:web:6bf6dec284ef42e06b24c3",
  measurementId: "G-T17SVD3B72"
};
firebase.initializeApp(firebaseConfig);
window.db = firebase.firestore();
window.auth = firebase.auth();

new Vue({
  i18n,
  store,
  router,
  ...App
})
