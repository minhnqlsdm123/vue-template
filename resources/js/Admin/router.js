import Vue from 'vue';
import Router from 'vue-router';



import AllCategory from './views/Category/Index.vue'
import AddCategory from "./views/Category/AddCategory.vue";
import EditCategory from "./views/Category/EditCategory.vue";

import AllPost from "./views/Post/Index.vue";
import AddPost from "./views/Post/AddPost.vue";
import EditPost from "./views/Post/EditPost.vue";

import AllContact from "./views/Contact/Index.vue";

import AdminHome from "./components/AdminHome";

import Dashboard from "./views/Dashboard"
import Login from "./views/Auth/Login";
import Register from "./views/Auth/Register";

import * as auth from './service/auth_service.js'

Vue.use(Router);

const routes=[
    {
      path:'/',
      component: AdminHome,
      children:[
              {
                path: '/',
                name: 'Dashboard',
                component: Dashboard
              },
            {
                //Category
                path: '/category',
                name:'AllCategory',
                component: AllCategory
            },
            {
                path:'/category/add/',
                name:'AddCategory',
                component: AddCategory
            },
            {
                path: '/category/edit/:id',
                name:'EditCategory',
                component: EditCategory
            },
            //Category

            //Post
            {
                name:'AllPost',
                path:'/post',
                component: AllPost
            },
            {
                name:'AddPost',
                path:'/post/add/',
                component: AddPost
            },
            {
                name:'EditPost',
                path:'/post/edit/:id',
                component: EditPost
            },
            //Post

            //Contact
            {
                name:'AdminContact',
                path: '/contact/',
                component: AllContact
            },

        ],
        // beforeEnter(to, from, next){
        //     if(!auth.isLoggedIn()){
        //         next('/login');
        //     }else{
        //         next();
        //     }
        // }
    },

    {
        path: '/login',
        component: Login,
        name:'login',
        // beforeEnter(to, from, next){
        //     if(!auth.isLoggedIn()){
        //         next();
        //     }else{
        //         next('');
        //     }
        // }
    },
    {
        path: '/register',
        component: Register
    }


];
const router = new Router({
    routes:routes,
    mode:'hash',
});

export default router;

