<?php

// EN

return [

	// Common
    'Weam' => 'Weam',

    // Menu
    'Parameters' => 'Parameters',
    'Log In' => 'Log In',
    'Sign Up' => 'Sign Up',
    'Log Out' => 'Log Out',
    'Current language' => App::getLocale(),
    'Default language' => config("app.fallback_locale"),

    // Log In/Sign Up
    'Username' => 'Username',
    'Enter your username' => 'Enter your username',
    'Username must contain between 3 and 25 alphanumeric characters' => 'Username must contain between 3 and 25 alphanumeric characters.',
    'Password' => 'Password',
    'Password confirmation' => 'Password confirmation',
    '************' => '************',
    'Password must contain at least 8 characters, including 1 upper case, 1 lower case and 1 number' => 'Password must contain at least 8 characters, including 1 upper case, 1 lower case and 1 number.',
    'Password do not match' => 'Password do not match.',
    'Email address' => 'Email address',
    'Enter your email address' => 'Enter your email address',
    'Please enter a valid email address' => 'Please enter a valid email address.',
    'Date of birth' => 'Date of birth',
    'Day' => 'Day',
    'Month' => 'Month',
    'Year' => 'Year',
    'Please enter a valid date' => 'Please enter a valid date.',
    'You must be at least 13 years old to create an account' => 'You must be at least 13 years old to create an account.',
    'You don\'t look your age ! But if you are 150 years old or older you are not human' => 'You don\'t look your age ! But if you are 150 years old or older you are not human, and only residents of planet Earth are allowed here. For the time being...',
    'Sorry, this user is not from here' => 'Sorry, this user is not from here.',
    'Too many login attempts' => 'Too many login attempts. Please try again in :seconds seconds.',

    // Signup email verification
    'Weam - Account verification' => 'Weam - Account verification',

    // Home
    'Welcome' => 'Welcome to you :name|Welcome to us :name',

    // Tasks
    'Tasks' => 'Tasks',

    // CSRF error
    'Invalid token' => 'The request was lost ! Maybe his privilege level was not high enough...',

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
