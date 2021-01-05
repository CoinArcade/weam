<template>

    <p class="text-red-600 text-xs text-left mt-2">
        {{ __(this.errorMsg) }}
    </p>

</template>

<script>

    export default {

        name: "FormError",

        props: ['errorMsg']

    }

</script>
