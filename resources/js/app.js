window.Vue = require('vue');

import Vue from 'vue';
import App from './App.vue';
// import App2 from './App2.vue'

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import axios from 'axios';
import router from './router.js';
import VueAxios from 'vue-axios';
import swal from 'sweetalert2';

import AdminMaster from "./components/Admin/AdminMaster";
import PublicMaster from "./components/Client/PublicMaster";
import Loader from "./components/Client/_layout/Loader.vue"


Vue.component('adminmain', AdminMaster);
Vue.component('home-main', PublicMaster);
Vue.component('loader', Loader);

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

Vue.use(VueAxios, axios);


const app = new Vue({
    el: '#app',
    router:router,
    // render: h => h(App),

});
// const app2 = new Vue({
//     el: '#app2',
//     // router:router,
//     render: h => h(App2),
//
// });






