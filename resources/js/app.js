import Vue from 'vue'
import store from './store'
import router from "./router";
import App from "./components/App";

Vue.config.productionTip = false;



require('./bootstrap');

new Vue({
    render: (h) => h(App),
    store,
    router
}).$mount("#app");
