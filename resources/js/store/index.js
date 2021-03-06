import Vue from 'vue'
import Vuex from 'vuex'
import common from "./modules/common";

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        common
    },
    state: {
        products: null,
        categories: null,
        trends: {},
        newArrivals: {},
        isVisibleModalCall: false,
        cart: [],
        isModalProduct: false,
        oneProduct: null,
        token: null
    },
    mutations: {

        SET_PRODUCTS_TO_STATE: (state, products) => {
            state.products = products;
        },
        SET_TRENDS_TO_STATE: (state, trends) => {
            state.trends = trends;
        },
        SET_CATEGORIES_TO_STATE: (state, categories) => {
            state.categories = categories;
        },
        CHANGE_MODAL_CALL: (state) => {
            state.isVisibleModalCall = !state.isVisibleModalCall;
        },
        SET_CART: (state, product) => {
            if (state.cart.length) {
                let isProductExists = false;
                state.cart.map((item) => {
                    if (item.id === product.id) {
                        isProductExists = true;
                        item.quantity++;
                    }
                });

                if (!isProductExists) {
                    state.cart.push(product);
                }
            } else {
                state.cart.push(product);
            }
        },
        REMOVE_FROM_CART: (state, index) => {
            state.cart.splice(index, 1);
        },
        REMOVE_ALL_FROM_CART: (state) => {
            state.cart = [];
        },
        CHANGE_MODAL_PRODUCT: (state, product) => {
            state.isModalProduct = !state.isModalProduct;
            if (product) {
                state.oneProduct = product;
            }
        },
        SET_TOKEN: (state, token) => {
            state.token = token;
        },
        REMOVE_TOKEN: (state, token) => {
            state.token = token;
        },
        SET_NEW_ARRIVALS_TO_STATE: (state, newArrivals) => {
            state.newArrivals = newArrivals;
        }
     },
    actions: {

        GET_PRODUCTS_FROM_API({commit}) {
            axios.get('/api/products')
                .then((response) => {
                    commit("SET_PRODUCTS_TO_STATE", response.data);
                }).catch(e => {
            })
        },
        GET_CATEGORIES_FROM_API({commit}) {
            axios.get('/api/categories')
                .then((response) => {
                    commit("SET_CATEGORIES_TO_STATE", response.data);
                }).catch(e => {
            })
        },
        GET_TRENDS_FROM_API({commit}) {
            axios.get('/api/trends')
                .then((response) => {
                    commit("SET_TRENDS_TO_STATE", response.data);
                }).catch(e => {
            })
        },
        GET_NEW_ARRIVALS_FROM_API({commit}) {
            axios.get('/api/newArrivals')
                .then((response) => {
                    commit("SET_NEW_ARRIVALS_TO_STATE", response.data);
                }).catch(e => {
            })
        },
        ACTIVE_MODAL_CALL({commit}) {
            commit("CHANGE_MODAL_CALL");
        },
        ADD_TO_CART({commit}, product) {
            commit("SET_CART", product);
        },
        DELETE_PRODUCT_FROM_CART({commit}, index) {
            commit("REMOVE_FROM_CART", index);
        },
        DELETE_ALL_PRODUCTS_FROM_CART({commit}) {
            commit("REMOVE_ALL_FROM_CART");
        },
        ACTIVE_MODAL_PRODUCT({commit}, product) {
            commit("CHANGE_MODAL_PRODUCT", product);
        },
        ADD_TOKEN({commit}, token) {
            commit("SET_TOKEN", token);
        },
        REMOVE_TOKEN({commit}) {
            commit("SET_TOKEN", null);
        }
    },
    getters: {
        PRODUCTS(state) {
            return state.products;
        },
        TRENDS(state) {
            return state.trends;
        },
        NEW_ARRIVALS(state) {
            return state.newArrivals;
        },
        CATEGORIES(state) {
            return state.categories;
        },
        MODALCALL(state) {
            return state.isVisibleModalCall;
        },
        CART(state) {
            return state.cart;
        },
        MODALPRODUCT(state) {
            return state.isModalProduct;
        },
        ONEPRODUCT(state) {
            return state.oneProduct;
        },
        TOKEN(state) {
            return state.token;
        }
    }
});
