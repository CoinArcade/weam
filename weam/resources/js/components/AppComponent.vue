<template>

    <div>

        <router-view></router-view>

    </div>

</template>

<script>

    import { mapActions } from 'vuex';
    import UserStore from "./store/UserStore";

    export default {

        name: 'App',

        store: UserStore,

        created: function() {

            if (this.getLSI('token')) {

                axios
                    .get(this.$apiURL + '/user', {
                        headers: {
                            Authorization: 'Bearer ' + this.getLSI('token') + 'a'
                        }
                    })
                    .then(response => {
                        try {
                            if (response.data) {
                                this.addUser({
                                    id: response.data.id,
                                    username: response.data.username,
                                    email: response.data.email,
                                    verified: response.data.email_verified_at,
                                    role: response.data.role,
                                    birthdate: response.data.birthdate
                                })
                            }
                        } catch (error) {
                            this.VueSwal2('swalWarning', {
                                'title': 'Error',
                                'message': 'We are unable to retrieve your data',
                                'showButtons': false,
                                'buttons': null
                            }, null, () => {
                                this.logout()
                            })
                        }
                    })
                    .catch(error => {
                        this.VueSwal2('swalWarning', {
                            'title': 'Error',
                            'message': 'Invalid user access token',
                            'showButtons': true,
                            'buttons': [
                                {
                                    content: 'test',
                                    action: function() {
                                        Vue.swal.close()
                                    }
                                }
                            ]
                        }, null, () => {
                            this.logout()
                        })
                    })

            }
        },

        methods: {

            // allow to add a user in the store
            ...mapActions(['addUser'])

        },

        watch: {

        	$route (to, from) {

        	    let cookieLanguage = this.getCookie("language");

                if (cookieLanguage !== undefined && cookieLanguage !== null) {

                    this.eraseCookie("language");
                    this.setCookie("language", this.getCookie("language"), 364);

                } else {

                    this.setCookie("language", this.__('Default language'), 364);

                }

        	}

        }

    }

</script>
