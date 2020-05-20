window.Vue = require('vue');

import Vue from 'vue';
import App from './App.vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';

import axios from 'axios';
import router from './router.js';
import VueAxios from 'vue-axios';
import FlashMessage from '@smartweb/vue-flash-message';
import Swal from "sweetalert2";

Vue.use(FlashMessage);

// const options = {
//     confirmButtonColor: '#41b882',
//     cancelButtonColor: '#ff7674',
// };
// Vue.use(Swal,options);


Vue.use(VueAxios, axios);






const app = new Vue({
    el: '#app',
    router:router,
    render: h => h(App)
});

