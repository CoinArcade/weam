/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import VueRouter from 'vue-router'
import VueSweetalert2 from 'vue-sweetalert2'
import VueTranslation from './translations'

require('./bootstrap');
require('@fortawesome/fontawesome-free/js/all.js');

window.Vue = require('vue');

Vue.use(VueRouter)
Vue.use(VueSweetalert2)

Vue.mixin(VueTranslation)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/HomeComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// App
let App = require('./components/AppComponent').default;

// App components
let Home = require('./components/home/HomeComponent').default;

// Settings components
let Tasks = require('./components/settings/TaskComponent').default;

// Swal components
let swalLang = Vue.component('swalLang', require('./components/general/swal/ChooseLanguageComponent').default);
let swalLoginAndSigninForm = Vue.component('swalLoginAndSigninForm', require('./components/general/swal/LoginAndSigninFormComponent').default);


// Vue router
const router = new VueRouter({
    mode: 'history',
    base: '/weam/weam/public',
    routes: [

        // App
        {
            path: '/',
            component: Home,
            meta: {
                title: VueTranslation.methods.__('Weam'),
                page: 'home'
            }
        },

        // Settings
        {
            path: '/settings',
            component: Tasks,
            meta: {
                title: VueTranslation.methods.__('Tasks'),
                page: 'settings'
            }
        },

        // Not found
        {
            path: '*',
            redirect: '/settings'
        }
    ]
});



// Page title
router.beforeEach((to, from, next) => {
    document.title = to.meta.title

    next()
});



// Vue global variables
Vue.prototype.$appURL = "http://localhost:8000/weam/weam/public"
Vue.prototype.$swalRouter = router


// Vue app
const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router
});
