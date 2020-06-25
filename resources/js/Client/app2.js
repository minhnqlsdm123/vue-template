import router2 from "./router2";

window.Vue = require('vue');

import Vue from 'vue';
import App from '../App.vue';
// import App2 from './App2.vue'

import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import axios from 'axios';
import router from '../Admin/router.js';
import VueAxios from 'vue-axios';
import swal from 'sweetalert2';
import CKEditor from 'ckeditor4-vue';
import VueProgressBar from 'vue-progressbar'


import AdminMaster from "../Admin/AdminMaster";
import PublicMaster from "./PublicMaster";
import Loader from "./components/Loader.vue"
import AuthMain from "../Admin/views/Auth/AuthMain";


Vue.component('adminmain', AdminMaster);
Vue.component('home-main', PublicMaster);
Vue.component('loader', Loader);
Vue.component('auth',AuthMain);


const VueProgressBarOptions = {
    color: '#50d38a',
    failedColor: '#87111d',
    thickness: '5px',
    transition: {
        speed: '0.5s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
};

// const VueProgressBarOptions = {
//   color:'#50d38a',
//   failedColor:'#87111d',
//   thickness:'5px',
//     transition: {
//       speed:'0.5s',
//       opacity:'0.6s',
//       termination:400
//     },
//     aautoRevert: true,
//     location: 'top',
//     inverse: false
//
// };
Vue.use(VueProgressBar, VueProgressBarOptions);

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
Vue.use( CKEditor );
Vue.component('pagination', require('laravel-vue-pagination'));



const app = new Vue({
    el: '#app',
    router:router2,
    render: h => h(PublicMaster),

});
// const app2 = new Vue({
//     el: '#app2',
//     // router:router,
//     render: h => h(App2),
//
// });






