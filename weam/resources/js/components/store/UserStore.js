import Vuex from 'vuex'

const state = {
    user: []
}

const mutations = {

    ADD_USER: (state, {id, username, email, verified, role, birthdate}) => {
        state.user = []
        state.user.push({
            id,
            username,
            email,
            verified,
            role,
            birthdate,
            key: 1
        })
    }

}

const getters = {

    user: state => state.user

}

const actions = {

    addUser: (store, {id, username, email, verified, role, birthdate}) => {
        store.commit('ADD_USER', {id, username, email, verified, role, birthdate})
    }

}

export default new Vuex.Store({

    state,
    mutations,
    getters,
    actions: actions,
    strict: true

})
