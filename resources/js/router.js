import Vue from 'vue';
import VueRouter from 'vue-router';
import Home from './pages/Frontend/HomePageOne.vue';
import Auth from './pages/Frontend/Login.vue';
// import About from './pages/About.vue';
import BannerForm from './pages/Backend/BannerAddForm.vue';
import BannerList from './pages/Backend/BannerList.vue';
import Details from './pages/Details.vue';
import BannerEditForm from './pages/Backend/BannerEditForm.vue';
import MenuForm from './pages/Backend/MenuAddForm.vue';
import DetailsPageOne from './pages/Frontend/DetailsPageOne.vue';
import store from './store'
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
            path: '/bannerList',
            name: 'bannerList',
            component: BannerList,
            meta: { layout: 'Admin',
            isUserLoggedIn: true,
        },
        },
        
        {
            path: '/bannerEditForm',
            name: 'bannerEditForm',
            component: BannerEditForm,
            meta: { layout: 'Admin',
            isUserLoggedIn: true,
        }},
        {
            path: '/bannerform',
            name: 'bannerForm',
            component: BannerForm,
            meta: { layout: 'Admin',
            isUserLoggedIn: true,
        }},
        {
            path: '/pages/:token',
            name: 'detailsPageOne',
            component: DetailsPageOne
        },
        // {
        //     path: '/menu/list',
        //     name: 'menuList',
        //     component: MenuList
        // },
        {
            path: '/menuform',
            name: 'menuForm',
            component: MenuForm,
            meta: { layout: 'Admin',
            isUserLoggedIn: true,
        },
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
            path: '/auth',
            name: 'auth',
            component: Auth
        },

    ]
});

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.isUserLoggedIn)) {
      // this route requires auth, check if logged in
      // if not, redirect to login page.
    //   alert(record.meta.isUserLoggedIn);
      if (!store.state.isUserLoggedIn) {
        next({ name: 'auth' })
      } else {
        next() // go to wherever I'm going
      }
    } else {
      next() // does not require auth, make sure to always call next()!
    }
  })

export default router;