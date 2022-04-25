import Vue from 'vue'
import VueRouter from "vue-router"

import MainComponent from './components/main/MainComponent'
import vCart from './components/Cart/v-cart'
import vCatalog from './components/Catalog/v-catalog'

Vue.use(VueRouter)

export default new VueRouter({
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
    ],
    scrollBehavior(to, from, savedPosition) {
        return { x: 0, y: 0 };
    },

})
