import Vuex from 'vuex'

const state = {
    user: null,
    logged: false,
    pageLoading: true
}

const mutations = {

    ADD_USER: (state, {id, username, email, verified, role, birthdate}) => {
        state.user = {
            id,
            username,
            email,
            verified,
            role,
            birthdate,
            key: 1
        }
        state.logged = true
    },

    REMOVE_USER: (state) => {
        state.user = null
        state.logged = false
    },

    SET_PAGE_LOADING: (state, status) => {
        state.pageLoading = status
    }

}

const getters = {

    user: state => state.user,
    logged: state => state.logged,
    pageLoading: state => state.pageLoading

}

const actions = {

    addUser: (store, {id, username, email, verified, role, birthdate}) => {
        store.commit('ADD_USER', {id, username, email, verified, role, birthdate})
    },

    removeUser: (store) => {
        store.commit('REMOVE_USER')
    },

    setPageLoading: (store, status) => {
        store.commit('SET_PAGE_LOADING', status)
    }

}

export default new Vuex.Store({

    state,
    mutations,
    getters,
    actions: actions,
    strict: true

})
