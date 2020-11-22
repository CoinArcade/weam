<template>

    <div>

        <!--<p v-for="(language, code) in availableLanguages"><span class="pointer" @click="chooseLang(code)">{{ language }}</span></p>-->
        <h1>Langues</h1>

        <section v-if="error">
            <p>Nous sommes désolés, nous ne sommes pas en mesure de récupérer ces informations pour le moment. Veuillez réessayer ultérieurement.</p>
        </section>

        <section v-else>
            <div v-if="loading">Chargement...</div>

            <div
                v-else
                v-for="(language, code) in availableLanguages"
            >
                <span class="pointer" @click="chooseLang(code)">
                    {{ language }}
                </span>
            </div>

  </section>
    </div>

</template>

<script>
    
    export default {

        name: 'ChooseLanguage',

        data: function() {

            return {
                availableLanguages: [],
                error: false,
                loading: true
            }

        },

        created: function() {

            axios
                .get(this.$appURL + '/languages/list')
                .then(response => {

                    if (response.data.success) {
                        this.availableLanguages = response.data.success
                    } else {
                        throw new Error(response.data.error)
                    }

                })
                .catch(error => {

                    this.error = true

                })
                .finally(() => {

                    this.loading = false

                })

        },

        methods: {

            chooseLang(lang) {

                if (this.__('Current language') !== lang) {

                    axios
                        .post(this.$appURL + '/languages/modify/' + lang)
                        .then(() => {

                            this.setlangCookie(lang)
                            this.$swal.close()
                            this.$swalRouter.go()

                        })
                        .catch(error => {

                            alert(error)

                        })

                }
            },

            setlangCookie(lang) {

                let d = new Date();
                d.setTime(d.getTime() + 1 * 24 * 60 * 60 * 1000);
                let expires = "expires=" + d.toUTCString();
                document.cookie = "language=" + lang + ";" + expires + ";path=/";

            }

        }

    }

</script>