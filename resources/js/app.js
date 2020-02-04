/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');
import users from './components/users';
import villages from './components/villages';
import packages from './components/packages';
import connections from './components/connections';
import recoveries from './components/recoveries';


Vue.component('users', users);
Vue.component('villages', villages);
Vue.component('packages', packages);
Vue.component('connections', connections);
Vue.component('recoveries', recoveries);





const app = new Vue({
    el: '#app',
    data:{
        isCollapsed: true,
        isBillingAddressSame: true,
        isCustomPackage: false,
    },




});
