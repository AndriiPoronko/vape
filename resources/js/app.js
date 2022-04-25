import Vue from 'vue'
import store from './store'
import router from "./router";
import App from "./components/App";
import AOS from "aos"
import 'aos/dist/aos.css'


Vue.config.productionTip = false;



require('./bootstrap');



new Vue({
    render: (h) => h(App),
    store,
    router,
    created() {
        AOS.init();
    }
}).$mount("#app");
