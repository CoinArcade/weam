<template>

    <label class="block tracking-wide text-grey-darker text-xs font-bold mb-2 text-left mt-3" :for="this.labelFor">
        {{ __(this.labelMsg) }}
    </label>

</template>

<script>

export default {

    name: "FormLabel",

    props: ['labelMsg', 'labelFor']

}

</script>
