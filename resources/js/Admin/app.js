window.Vue = require('vue');

import Vue from 'vue';


import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap';
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios';
import router from './router.js';
import VueAxios from 'vue-axios';
import swal from 'sweetalert2';
import CKEditor from 'ckeditor4-vue';
import DataTable from 'laravel-vue-datatable';
import VueProgressBar from 'vue-progressbar'
import Snotify, { SnotifyPosition } from 'vue-snotify'
import VoerroTagsInput from '@voerro/vue-tagsinput';


import 'vue-loading-overlay/dist/vue-loading.css';

import AdminMaster from "./AdminMaster";

const SnotifyOptions = {
    toast: {
        position: SnotifyPosition.rightTop
    }
}
Vue.use(Snotify, SnotifyOptions)
const VueProgressBarOptions = {
    color: '#50d38a',
    failedColor: '#87111d',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
};
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

Vue.use(BootstrapVue);
Vue.use(VueAxios, axios);
Vue.use( CKEditor );
Vue.use(DataTable);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('tags-input', VoerroTagsInput);




const app = new Vue({
    el: '#app',
    router:router,
    render: h => h(AdminMaster),

});
// const app2 = new Vue({
//     el: '#app2',
//     // router:router,
//     render: h => h(App2),
//
// });






