/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue').default;
import Vue from 'vue';
//Router
import routes from './router/index';
import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '3px'
  })
//Import v-from
import { Form } from 'vform'
window.Form = Form;

//Message toastr
import 'cxlt-vue2-toastr/dist/css/cxlt-vue2-toastr.css';


import CxltToastr from 'cxlt-vue2-toastr'
var toastrConfigs = {
    position: 'top right',
    showDuration: 2000
}
Vue.use(CxltToastr, toastrConfigs)
//Message sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal;

const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

window.toast = toast;
window.Fire =  new Vue();

const app = new Vue({
    el: '#app',
    router: routes
});
