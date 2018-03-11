
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful Web applications using Vue and Laravel.
 */

window.Vue = require('vue')

import FullCalendar from 'vue-full-calendar'
import vSelect from 'vue-select'
import VueResource from 'vue-resource'
import Buefy from 'buefy'

Vue.use(FullCalendar)
Vue.use(VueResource)
Vue.use(Buefy)

Vue.component('v-select', vSelect)
Vue.component('Calendar', require('./components/theme/Calendar/Calendar.vue'))
Vue.component('Modal', require('./components/theme/Calendar/Modal.vue'))
Vue.component("modal-buefy", require("./components/theme/Calendar/ModalTest.vue"))
const app = new Vue({
    el: '#app',
    data:{
        server : 'http://localhost:8000'
    }
})
