<template>

    <div @click="loaderManager" v-html="savedText"></div>

</template>

<script>

    export default {

        name: "ButtonLoaderComponent",

        props: ['text'],

        data: function() {

            return {

                isLoading: 0,
                savedText: ""

            }

        },

        mounted: function() {

            this.savedText = this.text

        },

        methods: {

            loaderManager: function() {
                if (this.isLoading === 0) {
                    this.savedText = '<div class="loader-bar"><div></div><div></div><div></div></div>'
                    this.isLoading = 1
                } else {
                    this.savedText = this.text
                    this.isLoading = 0
                }
            }

        }

    }

</script>
