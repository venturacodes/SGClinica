
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful Web applications using Vue and Laravel.
 */

window.Vue = require('vue')

import vSelect from 'vue-select'
import VueResource from 'vue-resource'
import Buefy from 'buefy'
import fullcalendar from 'fullcalendar'

Vue.use(VueResource)
Vue.use(Buefy)

Vue.component('v-select', vSelect)

const app = new Vue({
    el: '#app',
    data: {
        server: 'http://localhost:8000'
    }
})
