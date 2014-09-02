<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/**
 * Создание маршрутов frontend сайта
 */

/* Маршруты из таблицы routes*/
$routes_db=Routes::get()->toArray();

/* Временные маршруты*/
$routes_static = [
    ['path'=>'/as2','controller'=>'MainPageController','function'=>'showWelcome3']
];
/* Слияние маршрутов */
$routes = array_merge($routes_db,$routes_static);

/* Перебор маршрутов и инициализация */
foreach($routes as $route){
    Route::get($route['path'], $route['controller'].'@'.$route['function']);
}