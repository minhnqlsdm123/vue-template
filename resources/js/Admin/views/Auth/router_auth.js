import Vue from 'vue';
import Router from 'vue-router';

import Login from "./Login"
import Register from "./Register"
import AuthMain from "./AuthMain";


Vue.use(Router);

const routes_auth=[

            {
                name:'Login',
                path: '/',
                component: Login
            },
            // {
            //     name:'register',
            //     path:'/',
            //     component:Register
            // }

];
const router_auth = new Router({
    routes:routes_auth,
    mode:'hash',
});

export default router_auth;

