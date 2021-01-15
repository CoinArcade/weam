<?php

// FR

return [

	// Common
    'Weam' => 'Weam',

    // Menu
    'Parameters' => 'Paramètres',
    'Log In' => 'Connexion',
    'Sign Up' => 'Inscription',
    'Current language' => App::getLocale(),
    'Default language' => config("app.fallback_locale"),

    // Log In/Sign Up
    'Username' => 'Nom d\'utilisateur',
    'Enter your username' => 'Entrez votre nom d\'utilisateur',
    'Username must contain between 3 and 25 alphanumeric characters' => 'Le nom d\'utilisateur doit contenir entre 3 et 25 caractères alphanumériques.',
    'Password' => 'Mot de passe',
    'Password confirmation' => 'Confirmation du mot de passe',
    '************' => '************',
    'Password must contain at least 8 characters, including 1 upper case, 1 lower case and 1 number' => 'Le mot de passe doit contenir au moins 8 caractères, dont une majuscule, une minuscule et un chiffre.',
    'Password do not match' => 'Les mots de passe de correspondent pas.',
    'Email address' => 'Adresse e-mail',
    'Enter your email address' => 'Entrez votre adresse e-mail',
    'Please enter a valid e-mail address' => 'Veuillez entrer une adresse e-mail valide.',
    'Date of birth' => 'Date de naissance',
    'Day' => 'Jour',
    'Month' => 'Mois',
    'Year' => 'Année',
    'Please enter a valid date' => 'Veuillez entrer une date valide',
    'You must be at least 13 years old to create an account' => 'Vous devez être âgé d\'au moins 13 ans pour créer un compte.',
    'You don\'t look your age ! But if you are 150 years old or older you are not human' => 'Vous ne faites pas votre âge ! Mais si vous avez 150 ans ou plus vous n\'êtes pas humain, et seuls les habitants de la planète Terre sont autorisés ici. Pour le moment...',

    // Signup email verification
    'Weam - Account verification' => 'Weam - Vérification du compte',

    // Home
    'Welcome' => 'Bienvenue à toi :name|Bienvenue à nous :name',

    // Tasks
    'Tasks' => 'Tâches',

    // CSRF error
    'Invalid token' => 'La requête s\'est perdue ! Peut être que son niveau de privilèges n\'était pas assez élevé...',

    //Form validation errors
    'Required' => [
        'username' => '',
        'email' => '',
        'password' => '',
        'birthdate' => '',
    ],

    'Unique' => [
        'username' => '',
        'email' => '',
    ],

    'String' => [
        'username' => '',
        'email' => '',
        'password' => '',
    ],

    'Min' => [
        'password' => '',
    ],

    'Max' => [
        'email' => '',
    ],

    'Between' => [
        'username' => '',
    ],

    'Email' => [
        'email' => '',
    ],

    'Date' => [
        'birthdate' => '',
    ],

    'DateFormat' => [
        'birthdate' => 'test',
    ],

    'Before' => [
        'birthdate' => '',
    ],

    'After' => [
        'birthdate' => '',
    ],
];
