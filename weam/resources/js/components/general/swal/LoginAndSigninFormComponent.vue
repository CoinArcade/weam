<template>

    <div class="grid grid-cols-12 gap-4">

        <div class="flex justify-between col-span-full md:col-start-2 md:col-span-10 tabs-content">
            <button @click="activeTab = 1" :class="[ activeTab === 1 ? 'active' : '' ]" class="w-full cursor-pointer tab rounded-lg py-2 mx-2"><p class="text-center">
                {{ __('Log In') }}</p></button>
            <button @click="activeTab = 2" :class="[ activeTab === 2 ? 'active' : '' ]" class="w-full cursor-pointer tab rounded-lg py-2 mx-2"><p class="text-center">{{ __('Sign Up') }}</p></button>
        </div>

        <div class="col-span-full md:col-start-2 md:col-span-10">
            <hr class="w-full">
        </div>

        <div v-if="activeTab === 1" class="bg-white rounded mb-2 flex flex-col col-span-full md:col-start-2 md:col-span-10">

            <form-input @validate="usernameLoginValidation" label="Username" placeholder="Enter your username" ref="loginUsername" input-id="login-username"></form-input>

            <form-input @validate="passwordLoginValidation" label="Password" placeholder="************" ref="loginPassword" input-id="login-password"></form-input>

            <div class="w-full mt-5">
                <button-loader @submitted="submitLogin" :text="__('Log In')" :submit-error="this.loginFormError" ref="submitLoginButton" key="loginSubmitButton"></button-loader>
            </div>

        </div>

        <div v-if="activeTab === 2" class="bg-white rounded mb-2 flex flex-col col-span-full md:col-start-2 md:col-span-10">

            <form-input @validate="usernameSignupValidation" label="Username" placeholder="Enter your username" ref="signupUsername" input-id="signup-username"></form-input>

            <form-input @validate="emailSignupValidation" label="Email address" placeholder="Enter your email address" ref="signupEmail" input-id="signup-email"></form-input>

            <form-input @validate="passwordSignupValidation" label="Password" placeholder="************" ref="signupPassword" input-id="signup-password"></form-input>

            <form-input @validate="passwordConfirmationSignupValidation" label="Password confirmation" placeholder="************" ref="signupPasswordConfirmation" input-id="signup-password-confirmation"></form-input>

            <div class="w-full mt-3">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left" for="signup-birthdate">
                    {{ __('Date of birth') }}
                </label>
                <div id="signup-birthdate" class="flex justify-between">
                    <input id="signup-birthdate-day" type="text" :placeholder="__('Day')" class="bg-th-body mx-1 flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm  focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <input id="signup-birthdate-month" type="text" :placeholder="__('Month')" class="bg-th-body mx-1 flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm  focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <input id="signup-birthdate-year" type="text" :placeholder="__('Year')" class="bg-th-body mx-1 flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm  focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                </div>
                <p id="signup-birthdate-error" class="text-red-600 text-sm text-left mt-2"></p>
            </div>

            <div class="w-full mt-5">
                <button-loader @submitted="submitSignup" :text="__('Sign Up')" :submit-error="this.signupFormError" ref="submitSignupButton" key="signupSubmitButton"></button-loader>
            </div>

        </div>

    </div>

</template>

<script>

    import ButtonLoader from '../form/ButtonLoaderComponent';
    import FormInput from "../form/InputComponent";

    export default {

        name: "LoginAndSigninForm",

        components: {
            'FormInput': FormInput,
            'ButtonLoader': ButtonLoader
        },

        data: function() {

            return {

                activeTab: 1,

                loginUsername: null,
                loginPassword: null,

                signupUsername: null,
                signupEmail: null,
                signupPassword: null,
                signupPasswordConfirm: null,
                signupBirthdateDay: null,
                signupBirthdateMonth: null,
                signupBirthdateYear: null,

                loginFormError: true,
                signupFormError: true

            }
        },

        methods: {

            /*
             * LOGIN FORM VALIDATION
             */

            // check if user with this username/email address exists
            usernameLoginValidation: function(value) {

                if (value.length < 3) {
                    this.loginUsername = null
                    this.$refs.loginUsername.showErrorMsg("error, at least 3 characters excpected !")
                } else {
                    this.loginUsername = value
                    this.$refs.loginUsername.resetErrorMsg()
                }

                this.checkLoginForm()

            },

            passwordLoginValidation: function(value) {
                this.loginPassword = value
                this.checkLoginForm()
            },

            // verifies that all fields are correctly filled in and authorises the submission of the login form
            checkLoginForm: function() {

                if (this.loginUsername && this.loginPassword) {
                    this.loginFormError = false
                } else {
                    this.loginFormError = true
                }

            },

            // submit login form
            submitLogin: function() {

                // send data, then :
                this.$refs.submitLoginButton.stopLoader()
                Vue.swal.close()
                this.$swalRouter.go()

            },

            /*
             * SIGNUP FORM VALIDATION
             */

            usernameSignupValidation: function() {

            },

            emailSignupValidation: function() {

            },

            passwordSignupValidation: function() {

            },

            passwordConfirmationSignupValidation: function() {

            },

            // verifies that all fields are correctly filled in and authorises the submission of the signup form
            checkSubmitForm: function() {

                if (this.signupUsername && this.signupEmail && this.signupPassword && this.signupPasswordConfirm
                    && this.signupBirthdateDay && this.signupBirthdateMonth && this.signupBirthdateYear) {

                    this.signupFormError = false

                } else {

                    this.signupFormError = true

                }

            },

            // submit signup form
            submitSignup: function() {

                // send data, then :
                this.$refs.submitSignupButton.stopLoader()
                Vue.swal.close()
                this.$swalRouter.go()

            }

        }

    }

</script>
