export default {
    state: {
        loading: true,
        error: null,
    },
    mutations: {
        SET_LOADING(state, payload) {
            state.loading = payload;
        },
        SET_ERROR(state, payload) {
            state.error = payload;
        },
        CLEAR_ERROR(state) {
            state.error = null;
        },
    },
    actions: {
        GET_LOADING({ commit }, payload) {
            commit("SET_LOADING", payload);
        },
        GET_ERROR({ commit }, payload) {
            commit("SET_ERROR", payload);
        },
        GET_CLEAR_ERROR({ commit }) {
            commit("CLEAR_ERROR");
        },
    },
    getters: {
        LOADING(state) {
            return state.loading;
        },
        ERROR(state) {
            return state.error;
        },
    },
};
