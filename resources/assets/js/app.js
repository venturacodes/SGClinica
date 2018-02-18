
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful Web applications using Vue and Laravel.
 */

window.Vue = require('vue')

import FullCalendar from 'vue-full-calendar'
import vSelect from 'vue-select'
import VueResource from 'vue-resource'

Vue.use(FullCalendar)
Vue.use(VueResource);
var componentsCalendarURI = './components/theme/Calendar'
Vue.component('v-select', vSelect)
Vue.component('Calendar', require(componentsCalendarURI + '/Calendar.vue'))
Vue.component('Modal', require(componentsCalendarURI + '/Modal.vue'))

const app = new Vue({
    el: '#app',
    data:{
        showModal : false,
        server : 'http://localhost:8000'
    }
})
