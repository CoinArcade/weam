<template>

	<div>

		<menu-top></menu-top>

    	<div class="container">

        	<h1><a href="#">{{ __("Welcome", 1, ["test"]) }}</a></h1>

    	</div>

    </div>

</template>

<script>

    import MenuTop from '../menus/HomeTopMenuComponent';

    export default {

    	name: 'Home',

        components: {
            'MenuTop': MenuTop
        }

    }

</script>
