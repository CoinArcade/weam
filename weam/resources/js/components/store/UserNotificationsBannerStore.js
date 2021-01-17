import Vuex from 'vuex'

const state = {
    notifications: [
        {
            message: 'Hello, je suis une bannière d\'information',
            button: false,
            buttonMessage: 'test',
            closable: false
        }
    ]
}

const mutations = {

    ADD_NOTIFICATION: (state, message, button, buttonMessage, closable) => {
        state.notifications.push({
            message: message,
            button: button,
            buttonMessage: buttonMessage,
            closable: closable
        })
    }

}

const getters = {

    notifications: state => state.notifications

}

let UserNotificationsBannerStore = new Vuex.Store({

    state,
    mutations,
    getters,
    actions: {},
    strict: true

})

export default UserNotificationsBannerStore
