<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

    /** @var Router $router */

    use Laravel\Lumen\Routing\Router;

    $router->get('/minha-rota', function() {
        return 'Hello World';
    });

    $router->get('/', 'HomeController@home');
    $router->get('/catalogo/{id_marca}', 'HomeController@catalogo');
    $router->get('/cadastro', 'HomeController@cadastro');
    $router->get('/editar/{id_carro}', 'HomeController@edicao');

    $router->post('/editar/{id_carro}', 'HomeController@salvar');
