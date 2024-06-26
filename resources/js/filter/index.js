import Vue from 'vue'
import moment from 'moment'

let filters = {
  isPhoto(name) {
    return /\.(jpe?g|png|gif)$/i.test(name)
  },

  productUpTimeFormat(datetime) {
    if (!datetime)
      return
    return moment.utc(datetime).local().format('MM/DD HH:mm')
  },


  truncate(str, len) {
    var length = len
    if (str.length < length) {
      return str.substring(0, length)
    } else {
      return str.substring(0, length)+'...'
    }
  },

  moneyFormat(value) {
    value += '';
    let rgx = /(\d+)(\d{3})/;
    while (rgx.test(value)) {
        value = value.replace(rgx, '$1' + ',' + '$2');
    }
    return value;
  },

  dateFormat(date){
    if(!date) return ''
    return moment.utc(date).local().format('YYYY年MM月DD日')
  },

  dateTimeFormat(date){
    if(!date) return ''
    return moment.utc(date).local().format('HH時mm分')
  },
  
  dateFormatEn(date){
    if(!date) return ''
    return moment.utc(date).local().format('YYYY/MM/DD')
  },

  dateFormatEnDot(date){
    if(!date) return ''
    return moment.utc(date).local().format('YYYY.MM.DD')
  },

  yearFormat(date) {
    if(!date) return ''
    return moment.utc(date).local().format('YYYY')
  },

  monthFormat(date) {
    if(!date) return ''
    return moment.utc(date).local().format('MM')
  },

  dayFormat(date) {
    if(!date) return ''
    return moment.utc(date).local().format('DD')
  },

  movieDuration(seconds) {
    if (!seconds) return '00:00'
    
    var hours = Math.floor(seconds / 60 / 60);
    var minutes = Math.floor(seconds / 60) - (hours * 60);
    var seconds = seconds % 60;

    return hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
  },

  paymentMethod(flag) {
    return flag == 'buy' ? '購入': '投げ銭'
  },

  refundStatus(flag) {
    return flag == 1 ? 'お待ち' : '入金済み'
  },

  buttonText(flag) {
    return flag ? '保存' : '編集'
  }
}

// Register All Filters on import
Object.keys(filters).forEach(function (filterName) {
  Vue.filter(filterName, filters[filterName])
})