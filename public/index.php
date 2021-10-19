<?php

require __DIR__ . "../../vendor/autoload.php";

session_start();

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/', 'App\Controllers\HomeController@index');
$router->get('/login/{password}', 'App\Controllers\HomeController@login');


// Run it!
$router->run();