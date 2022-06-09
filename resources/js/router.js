import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './pages/Frontend/HomePageOne.vue';
import Login from './pages/Frontend/Login.vue';
import About from './pages/About.vue';
import BannerForm from './pages/Backend/BannerAddForm.vue';
import BannerList from './pages/Backend/BannerList.vue';
import Details from './pages/Details.vue';
import BannerEditForm from './pages/Backend/BannerEditForm.vue';
import MenuForm from './pages/Backend/MenuAddForm.vue';
import DetailsPageOne from './pages/Frontend/DetailsPageOne.vue';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    base: process.env.BASE_URL,
    routes: [{
            path: '/',
            name: 'home',
            component: Home,
            
        },
        {
            path: '/about',
            name: 'about',
            component: About
        },
        {
            path: '/admin/banner/list',
            name: 'bannerList',
            component: BannerList
        },
        
        {
            path: '/admin/banner/bannerEditForm',
            name: 'bannerEditForm',
            component: BannerEditForm
        },
        {
            path: '/admin/banner/bannerform',
            name: 'bannerForm',
            component: BannerForm
        },
        {
            path: '/:token',
            name: 'detailsPageOne',
            component: DetailsPageOne
        },
        // {
        //     path: '/menu/list',
        //     name: 'menuList',
        //     component: MenuList
        // },
        {
            path: '/admin/menu/menuform',
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
            path: '/admin/details',
            name: 'details',
            component: Details
        },
        // {
        //     path: '/edit',
        //     name: 'edit',
        //     component: Edit
        // },
        {
            path: '/login',
            name: 'login',
            component: Login
        },

    ]
});

export default router;