<template>

    <div>

        <nav class="navbar navbar-expand-lg bg-primary-top">

            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link to="/" class="nav-link">Accueil</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/tasks" class="nav-link">Liste des tâches</router-link>
                    </li>
                </ul>
            </div>

        </nav>

        <div class="container">
            <router-view></router-view>
        </div>

    </div>

</template>

<script>
    export default {}
</script>
