import Vue from 'vue';
import Router from 'vue-router';

import AdminHome from "./components/Admin/AdminHome.vue";

import AllCategory from './components/Admin/Category/Index.vue'
import AddCategory from "./components/Admin/Category/AddCategory.vue";
import EditCategory from "./components/Admin/Category/EditCategory.vue";

import AllPost from "./components/Admin/Post/Index.vue";
import AddPost from "./components/Admin/Post/AddPost.vue";
import EditPost from "./components/Admin/Post/EditPost.vue";

import AllContact from "./components/Admin/Contact/Index.vue";

import Home from "./components/Client/Page/Home.vue";
import Contact from "./components/Client/Page/Contact.vue";
import Article from "./components/Client/Page/Article.vue";

Vue.use(Router);

const routes=[

    //Category
    {
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




    {   name:'Home',
        path:'/',
        component:Home
    },
    {
        name:'About',
        path:'/about/',
        component:Contact
    },
    {
        name:'Article',
        path:'/article/',
        component: Article
    }

];
const router = new Router({
    routes:routes,
    mode:'hash',
});

export default router;

