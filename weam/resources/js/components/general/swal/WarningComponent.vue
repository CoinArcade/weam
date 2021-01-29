<template>

    <div class="text-left">

        <p class="font-bold m-5 mt-10 xs:m-10 xs:mb-2">
            {{ __(this.title) }}
        </p>

        <div class="mt-5 mx-2 xs:mx-10 text-sm" :class="this.showButtons ? '' : 'mb-2 xs:mb-10'">
            {{ __(this.message) }}
        </div>

        <div v-if="this.showButtons" class="mt-5 mx-2 mb-2 xs:mx-10 xs:mb-10 text-sm">
            <button v-for="button in this.buttons" class="btn btn-link p-0" @click="button.action">{{ __(button.content) }}</button>
        </div>

    </div>

</template>

<script>

    export default {

        name: "Warning",

        props: ['title', 'message', 'showButtons', 'buttons']

    }

</script>

<style scoped>

</style>
