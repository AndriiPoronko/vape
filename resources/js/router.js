import Vue from 'vue'
import VueRouter from "vue-router"
import MainComponent from './components/main/MainComponent'

Vue.use(VueRouter)

export default new VueRouter({
    mode: 'history',

    routes: [
        {
            path: '/',
            component: MainComponent
        }
    ]
})