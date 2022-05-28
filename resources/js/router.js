import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './pages/Frontend/HomePageOne.vue';
import Login from './pages/Frontend/Login.vue';
import About from './pages/About.vue';
import BannerForm from './pages/Backend/BannerAddForm.vue';
import BannerList from './pages/Backend/BannerList.vue';
import Details from './pages/Details.vue';
import Edit from './pages/Backend/BannerEditForm.vue';
import MenuForm from './pages/Backend/MenuAddForm.vue';
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [{
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/banner/list',
            name: 'bannerList',
            component: BannerList
        },
        {
            path: '/bannerform',
            name: 'bannerForm',
            component: BannerForm
        },
        // {
        //     path: '/menu/list',
        //     name: 'menuList',
        //     component: MenuList
        // },
        {
            path: '/menuform',
            name: 'menuForm',
            component: MenuForm
        },
        // {
        //     path: '/subMenu/list',
        //     name: 'subMenuList',
        //     component: subMenuList
        // },
        // {
        //     path: '/subMenuform',
        //     name: 'subMenuForm',
        //     component: subMenuForm
        // },
        {
            path: '/details',
            name: 'details',
            component: Details
        },
        {
            path: '/edit',
            name: 'edit',
            component: Edit
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },

    ]
});

export default router;