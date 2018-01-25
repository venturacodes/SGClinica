
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful Web applications using Vue and Laravel.
 */

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
var componentsHomePageURI = './components/theme/Homepage';
var componentsCalendarURI = './components/theme/Calendar';
/* Passport components para o vue*/
Vue.component( 'passport-clients', require('./components/passport/Clients.vue') );
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue') );
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue') );
/*----------------------------------*/
Vue.component('work-in-progress', require(componentsHomePageURI + '/WorkInProgress.vue') );
Vue.component('notification-center', require(componentsHomePageURI + '/NotificationCenter.vue') );
Vue.component('near-calendar', require(componentsHomePageURI + '/NearCalendar.vue') );
Vue.component('user-panel', require(componentsHomePageURI + '/LeftSidebarMenu/UserPanel.vue') );
Vue.component('left-menu', require(componentsHomePageURI + '/LeftSidebarMenu/LeftMenu.vue') );

const app = new Vue({
    el: '#app',
    data:{
        showModal: false
    }
});
