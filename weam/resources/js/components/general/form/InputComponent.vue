<template>

    <div class="w-full mt-3">

        <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left" :for="this.inputId">
            {{ __(this.label) }}
        </label>

        <input v-model="entry"
               @keyup="validation"
               :id="this.inputId"
               type="text"
               :placeholder="__(this.placeholder)"
               class="bg-th-body flex-1 appearance-none w-full py-1 px-2 border-2 bg-grey-lighter text-grey-darker rounded-lg text-sm focus:outline-none"
               v-bind:class="this.error ? 'border-red-500 focus:border-red-500' : 'border-transparent focus:border-purple-600'"
        >

        <p class="text-red-600 text-xs text-left mt-2">{{ this.errorMsg }}</p>

    </div>

</template>

<script>

    export default {

        name: "InputComponent",

        props: ['label', 'placeholder', 'inputId'],

        data: function() {

            return {

                entry: "",
                error: false,
                errorMsg: ""

            }

        },

        methods: {

            validation: function() {

                this.$emit('validate', this.entry)

            },

            showErrorMsg: function(val) {

                this.error = true
                this.errorMsg = val

            },

            resetErrorMsg: function() {

                this.error = false
                this.errorMsg = ""

            }

        }

    }

</script>
