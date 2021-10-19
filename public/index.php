<?php

require __DIR__ . "../../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$db = new Capsule;

$db->addConnection([
    'driver' => 'sqlite',
    //'host' => 'localhost',
    'database' => __DIR__ . "../../database.sqlite3",
    //'username' => 'root',
    //'password' => 'password',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => ''
]);

// Make this Capsule instance available globally via static methods
$db->setAsGlobal();


// Setup the Eloquent ORM...
$db->bootEloquent();

// Create Router instance
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/', 'App\Controllers\HomeController@index');
$router->get('/login/{password}', 'App\Controllers\HomeController@login');


// Run it!
$router->run();