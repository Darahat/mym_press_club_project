/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
 
import router from './router';
import App from './layouts/MainLayout.vue';
import vuetify from './vuetify';
import VueEditor  from "vue2-editor";
import store from './store'
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
 // const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
Vue.use(VueEditor);
 Vue.component('AdminLayout', require('./layouts/AdminLayoutComponent.vue').default);
Vue.component('ClientLayout', require('./layouts/ClientLayoutComponent.vue').default);
Vue.component('navbar', require('./components/Frontend/Navbar.vue').default);
Vue.component('adminNavbar', require('./components/Backend/AdminNavbar.vue').default);

Vue.component('detailsAddForm', require('./components/Backend/DetailsAddForm.vue').default);
Vue.component('carousel', require('./components/Frontend/Carousel.vue').default);
 /**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 
const app = new Vue({
    store,
    router,
    vuetify,
    el: '#app',
    render: h => h(App)
});
