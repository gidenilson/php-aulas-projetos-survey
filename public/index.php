<?php
require __DIR__ . "../../vendor/autoload.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$db = new Capsule();

$db->addConnection([
    'driver' => 'sqlite',
    // 'host' => 'localhost',
    'database' => __DIR__ . "../../database.sqlite3",
    // 'username' => 'root',
    // 'password' => 'password',
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
$router->get('/survey', 'App\Controllers\SurveyController@index');
$router->post('/survey', 'App\Controllers\SurveyController@store');
$router->get('/survey/{id}', 'App\Controllers\SurveyController@get');
$router->post('/survey/{id}', 'App\Controllers\SurveyController@update');
$router->delete('/survey/{id}', 'App\Controllers\SurveyController@delete');

$router->post('/vote', 'App\Controllers\VoteController@vote');

// Run it!
$router->run();