<template>

    <button @click="loaderManager"
            v-bind:class="this.submitError ? 'bg-gray-500' : 'bg-th-color hover:bg-purple-700 focus:ring-2 focus:ring-th-btn focus:ring-offset-2 focus:ring-offset-th-btn-soft'"
            class="w-full flex-shrink-0 text-white text-base font-semibold py-1 px-2 rounded-lg shadow-md focus:outline-none"
    >

        <span v-if="this.isLoading">
            <div class="loader-bar">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </span>

        <span v-else>
            {{ this.savedText }}
        </span>

    </button>

</template>

<script>

    export default {

        name: "ButtonLoaderComponent",

        props: ['text', 'submitError'],

        data: function() {

            return {

                savedText: "",
                isLoading: false

            }

        },

        mounted: function() {

            this.savedText = this.text

        },

        methods: {

            loaderManager: function() {

                if (this.isLoading === false && !this.submitError) {

                    this.savedText = ""
                    this.isLoading = true
                    this.$emit('submitted')

                }

            },

            stopLoader: function() {

                this.savedText = this.text
                this.isLoading = false

            }

        }

    }

</script>
