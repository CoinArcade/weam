<template>

	<div>

		<menu-top></menu-top>

    	<div class="container">

        	<h1><a href="#">{{ __("Welcome", 1, ["test"]) }}</a></h1>
        	<span class="fa fa-cog white-text"></span>
        	<button class="btn btn-primary" @click="chooseLang">alert</button>

    	</div>

    </div>

</template>

<script>

    import MenuTop from '../menus/HomeTopMenuComponent';

    export default {

    	name: 'Home',

        components: {
            'MenuTop': MenuTop
        },

        methods: {

        	chooseLang() {
        		VueSwal2('swalLang', null)
        	}

        }

    }

</script>
