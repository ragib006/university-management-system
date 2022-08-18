/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex'
Vue.use(Vuex)
//use element

Vue.use(ElementUI);

import storeData from "./store/index.js"
const store = new Vuex.Store(

      storeData

)



//view router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//path
import {routes} from './routes.js';



const router = new VueRouter({
//  mode:'history',
mode: 'history',
 //mode:'hash',
  routes // short for `routes: routes`
})

//v-form
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;


//sweet alert

import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast;



//
Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//
//
// Vue.component('admin-sidebar', require('./components/Adminsidebar.vue').default);
// Vue.component('admin-header', require('./components/Adminheader.vue').default);
//  Vue.component('admin-footer', require('./components/Adminfooter.vue').default);
//
// Vue.component('website-footer', require('./frontend/Websitefooter.vue').default);
// Vue.component('website-header', require('./frontend/Websiteheader.vue').default);
// Vue.component('website-sidebar', require('./frontend/Websitesidebar.vue').default);
// Vue.component('website-searchbar', require('./frontend/Websitesearchbox.vue').default);
// Vue.component('website-slider', require('./frontend/Webiteslider.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app1 = new Vue({
    el: '#ragib1',
    router,
    store,
});
