<?php
/** @var \Laravel\Lumen\Routing\Router $router */
/*
|---------------------------------------------------------------------
-----
| Application Routes
|---------------------------------------------------------------------
-----
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$router->get('/', function () use ($router) {
 return $router->app->version();
});
// unsecure routes
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/users',['uses' => 'UserController@getUsers']);
});

$router->get('/users','UserController@index');
$router->post('/users','UserController@add');
$router->get('/users/{id}','UserController@show');
$router->put('/users/{id}','UserController@update');
$router->patch('/users/{id}','UserController@update');
$router->delete('/users/{id}','UserController@delete');

//Routes for UserJob
$router->get('/usersjob','UserJobController@index');
$router->get('/userjob/{id}','UserJobController@show'); // get user by id

//use this code to run the server on specific port 
//php -S localhost:8000 -t public