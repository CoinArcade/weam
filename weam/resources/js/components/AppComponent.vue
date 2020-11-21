<template>

    <div>

        <router-view></router-view>

    </div>

</template>

<script>
    
    export default {

        name: 'App',

        methods: {

        	getCookie(name) {
  				let value = `;${document.cookie}`;
  				let parts = value.split(`;${name}=`);
  				if (parts.length === 2) return parts.pop().split(';').shift();
			}

        },

        watch: {

        	$route (to, from) {

        		let d = new Date();
                d.setTime(d.getTime() + 1 * 24 * 60 * 60 * 1000);
                let expires = "expires=" + d.toUTCString();
                document.cookie = "language=" + this.getCookie('language') + ";" + expires + ";path=/";

        	}

        }

    }

</script>