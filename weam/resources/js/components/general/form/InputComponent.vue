<template>

    <div :class="[this.containerWidth ? this.containerWidth : 'w-full', this.containerClass ? this.containerClass : '']">

        <label v-if="this.label" class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left mt-3" :for="this.inputId">
            {{ __(this.label) }}
        </label>

        <input v-model="entry"
               @keyup="validation"
               :id="this.inputId"
               :type="this.inputType ? this.inputType : 'text'"
               :placeholder="__(this.placeholder)"
               class="bg-th-body flex-1 appearance-none w-full py-1 px-2 border-2 bg-grey-lighter text-grey-darker rounded-lg text-sm focus:outline-none"
               :class="[this.error ? 'border-red-600 focus:border-red-600' : 'border-transparent focus:border-purple-600', this.inputClass ? this.inputClass : '']"
        >

        <p v-if="!this.disableError" class="text-red-600 text-xs text-left mt-2">{{ __(this.errorMsg) }}</p>

    </div>

</template>

<script>

    export default {

        name: "InputComponent",

        props: ['containerWidth', 'containerClass', 'label', 'placeholder', 'inputType', 'inputClass', 'disableError'],

        data: function() {

            return {

                entry: '',
                inputId: this.$vnode.key,
                error: false,
                errorMsg: ''

            }

        },

        methods: {

            validation: function() {

                this.$emit('validate', this.entry)

            },

            showErrorMsg: function(val) {

                if (!this.disableError) {
                    this.error = true
                    this.errorMsg = val
                }

            },

            resetErrorMsg: function() {

                this.error = false
                this.errorMsg = ""

            },

            showError: function() {

                this.error = true

            },

            resetError: function() {

                this.error = false

            }

        }

    }

</script>
