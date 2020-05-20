import Vue from 'vue';
import Router from 'vue-router';
import Welcome from './Welcome.vue';
import AllCategory from './Views/Category/Index.vue'
import AddCategory from "./Views/Category/AddCategory.vue";
import EditCategory from "./Views/Category/EditCategory.vue";

Vue.use(Router);

const routes=[
    {
        path:'/',
        name: 'welcome',
        component:Welcome
    },
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
    }
];
const router = new Router({
    routes:routes
});

export default router;

