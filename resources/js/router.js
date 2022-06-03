import Vue from 'vue'
import VueRouter from "vue-router"

import MainComponent from './components/main/MainComponent'
import vCart from './components/Cart/v-cart'
import vCatalog from './components/Catalog/v-catalog'
import vLogin from './components/Auth/v-login'
import vRegister from './components/Auth/v-register'
import vPersonal from './components/Auth/v-personal'

Vue.use(VueRouter)

const route = new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/',
            name: "main",
            component: MainComponent
        },
        {
            path: "/catalog",
            name: "catalog",
            component: vCatalog,
        },
        {
            path: "/cart",
            name: "cart",
            component: vCart,
        },
        {
            path: "/login",
            name: "login",
            component: vLogin,
        },
        {
            path: "/register",
            name: "register",
            component: vRegister,
        },
        {
            path: "/personal",
            name: "personal",
            component: vPersonal,
        },
        {
            path: "*",
            name: "404",
            component: MainComponent,
        },
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 };
    },

})
route.beforeEach( (to, from, next) => {

    const accessToken = localStorage.getItem('access_token')

    if(to.name === 'login' && accessToken || to.name === 'register' && accessToken){
        return next({
            name: 'personal'
        })
    }
    next()
})
export default route
