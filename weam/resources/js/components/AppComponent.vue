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

        	    let cookieLanguage = getCookie("language");

                if (cookieLanguage !== undefined && cookieLanguage !== null) {

                    eraseCookie("language");
                    setCookie("language", getCookie("language"), 364);

                } else {

                    setCookie("language", this.__('Default language'), 364);

                }

        	}

        }

    }

</script>
