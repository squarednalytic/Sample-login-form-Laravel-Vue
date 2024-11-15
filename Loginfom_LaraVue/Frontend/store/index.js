import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        user: null,
        menus: [],
    },
    mutations: {
        setUser(state, user) {
            state.user = user;
        },
        setMenus(state, menus) {
            state.menus = menus;
        }
    },
    actions: {
        async fetchUser({ commit }) {
            const response = await axios.get('/api/user');
            commit('setUser', response.data);
        },
        async fetchMenus({ commit }) {
            const response = await axios.get('/api/menus');
            commit('setMenus', response.data);
        }
    }
});
