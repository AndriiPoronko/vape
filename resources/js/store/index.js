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
        // slider: {},
        categories: null,
        // contacts: {},
        // trand: {},
        // deals: {},
        // newProducts: [],
        isVisibleModalCall: false,
        cart: [],
        isModalProduct: false,
        oneProduct: null,
    },
    mutations:{

        SET_PRODUCTS_TO_STATE: (state, products) => {
            state.products = products;
        },
        // SET_CONTACTS_TO_STATE: (state, contacts) => {
        //     state.contacts = contacts;
        // },
        // SET_SLIDES_TO_STATE: (state, slides) => {
        //     state.slider = slides;
        // },
        // SET_TRAND_TO_STATE: (state, trand) => {
        //     state.trand = trand;
        // },
        // SET_DEALS_TO_STATE: (state, deals) => {
        //     state.deals = deals;
        // },
        // SET_NEW_TO_STATE: (state, newProducts) => {
        //     state.newProducts = newProducts;
        // },
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
        CHANGE_MODAL_PRODUCT: (state, product) => {
            state.isModalProduct = !state.isModalProduct;
            if (product) {
                state.oneProduct = product;
            }
        },
    },
    actions:{

        GET_PRODUCTS_FROM_API({ commit }) {
           axios.get('/api/products')
               .then((response) => {
               commit("SET_PRODUCTS_TO_STATE", response.data);
           }).catch(e => {
           })
        },
        GET_CATEGORIES_FROM_API({ commit }) {
            axios.get('/api/categories')
                .then((response) => {
                    commit("SET_CATEGORIES_TO_STATE", response.data);
                }).catch(e => {
            })
        },
        ACTIVE_MODAL_CALL({ commit }) {
            commit("CHANGE_MODAL_CALL");
        },
        ADD_TO_CART({ commit }, product) {
            commit("SET_CART", product);
        },
        DELETE_PRODUCT_FROM_CART({ commit }, index) {
            commit("REMOVE_FROM_CART", index);
        },
        ACTIVE_MODAL_PRODUCT({ commit }, product) {
            commit("CHANGE_MODAL_PRODUCT", product);
        },
    },
    getters:{
        //
        // CONTACTS(state) {
        //     return state.contacts;
        // },
        PRODUCTS(state) {
            return state.products;
        },
        // SLIDES(state) {
        //     return state.slider;
        // },
        // TRAND(state) {
        //     return state.trand;
        // },
        // DEALS(state) {
        //     return state.deals;
        // },
        // NEWPRODUCTS(state) {
        //     return state.newProducts;
        // },
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
    }
});
