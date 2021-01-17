<template>

	<div>

		<menu-top></menu-top>

    	<div class="container">

        	<h1><a href="#">{{ __("Welcome", 1, ["test"]) }}</a></h1>
            {{ notifications[0].message }}

    	</div>

    </div>

</template>

<script>

    import MenuTop from '../menus/HomeTopMenuComponent';

    import { mapState } from "vuex";
    import UserBannerNotificationStore from "../store/UserNotificationsBannerStore";

    export default {

    	name: 'Home',

        store: UserBannerNotificationStore,

        components: {
            'MenuTop': MenuTop
        },

        computed: {

    	    ...mapState(['notifications'])

        }

    }

</script>
