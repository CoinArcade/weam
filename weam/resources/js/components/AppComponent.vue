<template>

    <div>

        <router-view></router-view>

    </div>

</template>

<script>

    export default {

        name: 'App',

        watch: {

        	$route (to, from) {

        	    let cookieLanguage = this.getCookie("language");

                if (cookieLanguage !== undefined && cookieLanguage !== null) {

                    this.eraseCookie("language");
                    this.setCookie("language", this.getCookie("language"), 364);

                } else {

                    this.setCookie("language", this.__('Default language'), 364);

                }

        	}

        }

    }

</script>
