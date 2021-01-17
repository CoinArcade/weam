import Vuex from 'vuex'

const state = {
    user: [
        {
            message: 'Hello, je suis une bannière d\'information',
            button: false,
            buttonMessage: 'test',
            closable: false
        }
    ]
}

const mutations = {

    ADD_NOTIFICATION: (state) => {
        state.user.push({

        })
    }

}

const getters = {

    notifications: state => state.notifications

}

let UserStore = new Vuex.Store({

    state,
    mutations,
    getters,
    actions: {},
    strict: true

})

export default UserStore
