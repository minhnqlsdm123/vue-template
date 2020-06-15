import Vue from 'vue';
import Router from 'vue-router';

import Home from "./views/Home.vue";
import Contact from "./views/Contact.vue";
import Article from "./views/Article.vue";
import ArticleDetail from "./views/ArticleDetail.vue";
import FilterByCategory from "./views/FilterByCategory";

import Register from '../Admin/views/Auth/Register.vue';
import Login from '../Admin/views/Auth/Login.vue'
// import AdminMaster from "./components/Admin/AdminMaster";
import PublicHome from "./components/PublicHome";

Vue.use(Router);

const routes=[
{
        path:'/',
        component:PublicHome,
        children:[
                {
                  name:'Home',
                    path: '/',
                    component: Home
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
                },
                {
                  name:'ArticleDetail',
                  path:'/article/:id',
                    component: ArticleDetail

                },
                {
                    name:'filter',
                    path:'/home/category/:id',
                    component: FilterByCategory
                },
        ]
    }
];
const router2 = new Router({
    routes:routes,
    mode:'hash',
});

export default router2;

