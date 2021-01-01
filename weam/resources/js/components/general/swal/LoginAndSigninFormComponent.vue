<template>

    <div class="grid grid-cols-12 gap-4">

        <div class="flex justify-between col-span-full md:col-start-2 md:col-span-10 tabs-content">
            <button v-on:click="activetab=1" v-bind:class="[ activetab === 1 ? 'active' : '' ]" class="w-full cursor-pointer tab rounded-lg py-2 mx-2"><p class="text-center">
                {{ __('Log In') }}</p></button>
            <button v-on:click="activetab=2" v-bind:class="[ activetab === 2 ? 'active' : '' ]" class="w-full cursor-pointer tab rounded-lg py-2 mx-2"><p class="text-center">{{ __('Sign Up') }}</p></button>
        </div>

        <div class="col-span-full md:col-start-2 md:col-span-10">
            <hr class="w-full">
        </div>

        <div v-if="activetab === 1" class="bg-white rounded mb-2 flex flex-col col-span-full md:col-start-2 md:col-span-10">
            <div class="w-full">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left" for="login-username">
                    {{ __('Username') }}
                </label>
                <input id="login-username" type="text" v-bind:placeholder="__('Enter your username')" class="bg-th-body flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <p id="login-username-error" class="text-red-600 text-sm text-left mt-2"></p>
            </div>
            <div class="w-full mt-3">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left" for="login-password">
                    {{ __('Password') }}
                </label>
                <input id="login-password" type="password" v-bind:placeholder="__('************')" class="bg-th-body flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <p id="login-password-error" class="text-red-600 text-sm text-left mt-2"></p>
            </div>
            <div class="w-full mt-5">
                <button class="w-full flex-shrink-0 bg-th-color text-white text-base font-semibold py-1 px-2 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-th-btn focus:ring-offset-2 focus:ring-offset-th-btn-soft">
                    {{ __('Log In') }}
                </button>
            </div>
        </div>

        <div v-if="activetab === 2" class="bg-white rounded mb-2 flex flex-col col-span-full md:col-start-2 md:col-span-10">
            <div class="w-full">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left" for="signup-username">
                    {{ __('Username') }}
                </label>
                <input id="signup-username" type="text" v-bind:placeholder="__('Enter your username')" class="bg-th-body flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <p id="signup-username-error" class="text-red-600 text-sm text-left mt-2"></p>
            </div>
            <div class="w-full mt-3">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left" for="signup-email">
                    {{ __('Email address') }}
                </label>
                <input id="signup-email" type="email" v-bind:placeholder="__('Enter your email address')" class="bg-th-body flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm  focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <p id="signup-email-error" class="text-red-600 text-sm text-left mt-2"></p>
            </div>
            <div class="w-full mt-3">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left" for="signup-password">
                    {{ __('Password') }}
                </label>
                <input id="signup-password" type="password" v-bind:placeholder="__('************')" class="bg-th-body flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm  focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <p id="signup-password-error" class="text-red-600 text-sm text-left mt-2"></p>
            </div>
            <div class="w-full mt-3">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left" for="signup-password-confirm">
                    {{ __('Password confirmation') }}
                </label>
                <input id="signup-password-confirm" type="password" v-bind:placeholder="__('************')" class="bg-th-body flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm  focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                <p id="signup-password-confirm-error" class="text-red-600 text-sm text-left mt-2"></p>
            </div>
            <div class="w-full mt-3">
                <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left" for="signup-birthdate">
                    {{ __('Date of birth') }}
                </label>
                <div id="signup-birthdate" class="flex justify-between">
                    <input id="signup-birthdate-day" type="text" v-bind:placeholder="__('Day')" class="bg-th-body mx-1 flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm  focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <input id="signup-birthdate-month" type="text" v-bind:placeholder="__('Month')" class="bg-th-body mx-1 flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm  focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                    <input id="signup-birthdate-year" type="text" v-bind:placeholder="__('Year')" class="bg-th-body mx-1 flex-1 appearance-none border border-transparent w-full py-1 px-2 bg-grey-lighter text-grey-darker rounded-lg text-sm  focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent">
                </div>
                <p id="signup-birthdate-error" class="text-red-600 text-sm text-left mt-2"></p>
            </div>
            <div class="w-full mt-5">
                <button class="w-full flex-shrink-0 bg-th-color text-white text-base font-semibold py-1 px-2 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-th-btn focus:ring-offset-2 focus:ring-offset-th-btn-soft">
                    {{ __('Sign Up') }}
                </button>
            </div>
        </div>

    </div>

</template>

<script>

    export default {

        name: "LoginAndSigninForm",

        data: function() {

            return {

                activetab: 1

            }
        }

    }

</script>
