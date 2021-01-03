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

        <form v-if="activeTab === 1" class="bg-white rounded mb-2 flex flex-col col-span-full md:col-start-2 md:col-span-10">

            <form-input @validate="usernameLoginValidation" input-id="login-username" input-type="text"
                        label="Username" placeholder="Enter your username" ref="loginUsername"></form-input>

            <form-input @validate="passwordLoginValidation" input-id="login-password" input-type="password"
                        label="Password" placeholder="************" ref="loginPassword"></form-input>

            <div class="w-full mt-5">
                <button-loader @submitted="submitLogin" key="loginSubmitButton" :text="__('Log In')" :submit-error="this.loginFormError"
                               ref="submitLoginButton"></button-loader>
            </div>

        </form>

        <form v-if="activeTab === 2" class="bg-white rounded mb-2 flex flex-col col-span-full md:col-start-2 md:col-span-10">

            <form-input @validate="usernameSignupValidation" input-id="signup-username" input-type="text"
                        label="Username" placeholder="Enter your username" ref="signupUsername"></form-input>

            <form-input @validate="emailSignupValidation" input-id="signup-email" input-type="email"
                        label="Email address" placeholder="Enter your email address" ref="signupEmail"></form-input>

            <form-input @validate="passwordSignupValidation" input-id="signup-password" input-type="password"
                        label="Password" placeholder="************" ref="signupPassword"></form-input>

            <form-input @validate="passwordConfirmationSignupValidation" input-type="password" input-id="signup-password-confirmation"
                        label="Password confirmation" placeholder="************" ref="signupPasswordConfirmation"></form-input>

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
                <button-loader @submitted="submitSignup" key="signupSubmitButton" :text="__('Sign Up')" :submit-error="this.signupFormError"
                               ref="submitSignupButton"></button-loader>
            </div>

        </form>

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
                signupPasswordConfirmation: null,
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

            usernameSignupValidation: function(value) {

                if (!/^[_a-zA-Z0-9]{3,25}$/.test(value)) {
                    this.signupUsername = null
                    this.$refs.signupUsername.showErrorMsg("Username must contain between 3 and 25 alphanumeric characters")
                } else {
                    this.signupUsername = value
                    this.$refs.signupUsername.resetErrorMsg()
                }

                this.checkSignupForm()

            },

            emailSignupValidation: function(value) {

                if (!/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(value)) {
                    this.signupEmail = null
                    this.$refs.signupEmail.showErrorMsg("Please enter a valid e-mail address")
                } else {
                    this.signupEmail = value
                    this.$refs.signupEmail.resetErrorMsg()
                }

                this.checkSignupForm()

            },

            passwordSignupValidation: function(value) {

                if (!/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/.test(value)) {
                    this.signupPassword = null
                    this.$refs.signupPassword.showErrorMsg('Password must contain at least 8 characters, including 1 upper case, 1 lower case and 1 number')
                } else {
                    this.signupPassword = value
                    this.$refs.signupPassword.resetErrorMsg()
                }

                this.checkSignupForm()

            },

            passwordConfirmationSignupValidation: function(value) {

                if (value !== this.signupPassword) {
                    this.signupPasswordConfirmation = null
                    this.$refs.signupPasswordConfirmation.showErrorMsg('Password do not match')
                } else {
                    this.signupPasswordConfirmation = value
                    this.$refs.signupPasswordConfirmation.resetErrorMsg()
                }

                this.checkSignupForm()

            },

            // verifies that all fields are correctly filled in and authorises the submission of the signup form
            checkSignupForm: function() {

                if (this.signupUsername && this.signupEmail && this.signupPassword && this.signupPasswordConfirmation
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
