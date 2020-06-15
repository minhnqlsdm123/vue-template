import AuthMain from "./AuthMain";

window.Vue = require('vue');

import Vue from 'vue';


import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios';
import router_auth from './router_auth.js';
import VueAxios from 'vue-axios';
import swal from 'sweetalert2';
import CKEditor from 'ckeditor4-vue';
import DataTable from 'laravel-vue-datatable';
// Import component
import Loading from 'vue-loading-overlay';
// Import stylesheet
import 'vue-loading-overlay/dist/vue-loading.css';



window.swal = swal;

const toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timeProcessBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});


window.toast = toast;

Vue.use(BootstrapVue);
Vue.use(VueAxios, axios);
Vue.use( CKEditor );
Vue.use(DataTable);
Vue.component('pagination', require('laravel-vue-pagination'));



const app = new Vue({
    el: '#app',
    router:router_auth,
    render: h => h(AuthMain),

});
// const app2 = new Vue({
//     el: '#app2',
//     // router:router,
//     render: h => h(App2),
//
// });






