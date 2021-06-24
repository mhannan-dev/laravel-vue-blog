/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Form = Form;
import Vue from 'vue'
import moment from 'moment'
//Vue.prototype.moment = moment
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import { Form, HasError, AlertError } from 'vform'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
//VueProgressBar
import VueProgressBar from 'vue-progressbar'
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
window.Swal = Swal;

const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  window.toast = toast;

let routes = [
    { path: '/dashboard', component: require('./components/Dashboard.vue').default },
    { path: '/developer', component: require('./components/Developer.vue').default },
    { path: '/users', component: require('./components/Users.vue').default },
    { path: '/profile', component: require('./components/Profile.vue').default }

]

// Register route array/ variable
const router = new VueRouter({
    mode: 'history',
    routes

})

Vue.filter('upText', function (text){
    return text.charAt(0).toUpperCase() + text.slice(1)
})


Vue.filter('myDate', function(value) {
    if (value) {
        return moment(String(value)).format('MMMM Do YYYY')
    }
});
window.Fire =  new Vue();

Vue.use(VueProgressBar,{
    color: '#00b300',
    failedColor: '#ff471a',
    thickness: '4px'
})


Vue.component(
    'passportclients',
    require('./components/passport/Clients.vue').default
);
Vue.component(
    'passportauthorizedclients',
    require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
    'passportpersonalaccesstokens',
    require('./components/passport/PersonalAccessTokens.vue').default
);



//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
