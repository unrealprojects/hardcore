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
/*$routes_db=\Model\Backend\Routes::get()->toArray();*/

/* Временные маршруты*/
/*$routes_static = [
    ['path'=>'/as2','controller'=>'MainPageController','function'=>'showWelcome3']
];*/
/* Слияние маршрутов */
/*$routes = array_merge($routes_db,$routes_static);*/

/* Перебор маршрутов и инициализация */
/*foreach($routes as $route){
    Route::get($route['path'], $route['controller'].'@'.$route['function']);
}*/


/*** FRONTEND::CATALOG_BASE ***/
Route::get('/catalog','\Controller\Frontend\TechOnline\CatalogBaseController@actionList');
Route::get('/catalog/{alias}','\Controller\Frontend\TechOnline\CatalogBaseController@actionElement');

/*** FRONTEND::CATALOG_TECH ***/
Route::get('/rent','\Controller\Frontend\TechOnline\CatalogTechController@actionList');
Route::get('/rent/{alias}','\Controller\Frontend\TechOnline\CatalogTechController@actionElement');

/*** FRONTEND::CATALOG_PARTS ***/
Route::get('/parts','\Controller\Frontend\TechOnline\CatalogPartsController@actionList');
Route::get('/parts/{alias}','\Controller\Frontend\TechOnline\CatalogPartsController@actionElement');

/*** FRONTEND::CATALOG_SELLERS ***/
Route::get('/sellers','\Controller\Frontend\TechOnline\CatalogSellersController@actionList');
Route::get('/sellers/{alias}','\Controller\Frontend\TechOnline\CatalogSellersController@actionElement');



/*** BACKEND::CATALOG ***/
Route::get('/backend/catalog/list','\Controller\Backend\TechOnline\CatalogController@categoryBaseList');

Route::get('/backend/catalog/create','\Controller\Backend\TechOnline\CatalogController@categoryBaseCreate');

Route::get('/backend/catalog/update','\Controller\Backend\TechOnline\CatalogController@categoryBaseUpdate');
Route::get('/backend/catalog/delete','\Controller\Backend\TechOnline\CatalogController@categoryBaseDelete');