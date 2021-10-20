<?php

require __DIR__ . "../../vendor/autoload.php";

// Instanciamento do router
$router = new \Bramus\Router\Router();

// Definição das rotas
$router->get('/', 'App\Controllers\HomeController@index');

// Roda o router!
$router->run();