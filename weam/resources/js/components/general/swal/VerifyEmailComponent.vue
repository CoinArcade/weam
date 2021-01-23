<template>

    <!--<div class="flex items-center justify-center h-screen">

        <div class="bg-th-card text-black rounded-lg shadow mx-2 xs:max-w-sm md:max-w-xl">-->
    <div class="text-left">

        <p class="font-bold m-5 mt-10 xs:m-10 xs:mb-2">
            {{ __('Verify your email address') }}
        </p>

        <div class="mt-5 mx-2 xs:mx-10 text-sm">
            {{ __('A verification link has been sent to your email address, if you did not receive the email, you can request another from your profile') }}
        </div>

        <button class="btn btn-link p-0 mt-5 mx-2 mb-2 xs:mx-10 xs:mb-10 text-sm">{{ __('View my profile') }}</button>

    </div>

</template>

<script>

    import FormError from '../form/FormErrorComponent';

    export default {

        name: "VerifyEmail",

        components: {
            FormError
        }

    }

</script>
