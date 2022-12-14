<?php

use core\Route;


$this->allowed_routes =
[

    new Route(
        'IndexFilms',
        'GET',
        'filmcontroller',
        'films_index'
    ),
    new Route(
        'ShowFilm/([0-9][0-9]*)',
        'GET',
        'filmcontroller',
        'FilmShow'
    ),

    new Route(
        'registerForm',
        'GET',
        'userController',
        'registerForm'
    ),

    new Route(
        'user/register',
        'POST',
        'userController',
        'register'
    ),
    new Route(
        'test',
        'POST',
        'userController',
        'test'
    ),

    new Route(
        'logInForm',
        'GET',
        'userController',
        'login_form'
    ),

    new Route(
    'user/login',
    'POST',
    'userController',
    'login'
    ),
    
];

