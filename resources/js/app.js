require('./bootstrap');
window.Vue = require('vue').default;
import Vue from 'vue';
//Router
import routes from './router/index';
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
