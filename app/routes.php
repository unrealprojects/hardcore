<?php
include 'routes_tests.php';
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
/*** FRONTEND::TECHONLINE::WIND ***/
Route::get('/wind','\Controller\Frontend\WindSpace\WindController@index');


/*** FRONTEND::TECHONLINE::CATALOG ***/
Route::get('/','\Controller\Frontend\TechOnline\MainPageController@index');
Route::get('/filter/{category_alias}','\Controller\Frontend\TechOnline\MainPageController@filterSet');

Route::get('/catalog','\Controller\Frontend\TechOnline\CatalogBaseController@actionList');
Route::get('/catalog/{alias}','\Controller\Frontend\TechOnline\CatalogBaseController@actionElement');

/*** FRONTEND::TECHONLINE::CATALOG_TECH ***/
Route::get('/rent','\Controller\Frontend\TechOnline\CatalogTechController@actionList');
Route::get('/rent/{alias}','\Controller\Frontend\TechOnline\CatalogTechController@actionElement');

/*** FRONTEND::TECHONLINE::CATALOG_PARTS ***/
Route::get('/parts','\Controller\Frontend\TechOnline\CatalogPartsController@actionList');
Route::get('/parts/{alias}','\Controller\Frontend\TechOnline\CatalogPartsController@actionElement');

/*** FRONTEND::TECHONLINE::CATALOG_SELLERS ***/
Route::get('/sellers','\Controller\Frontend\TechOnline\CatalogSellersController@actionList');
Route::get('/sellers/{alias}','\Controller\Frontend\TechOnline\CatalogSellersController@actionElement');


/*** FRONTEND::TECHONLINE::CABINET ***/
Route::get('/cabinet/{alias}/','\Controller\Frontend\TechOnline\CabinetController@actionCabinet');
Route::post('/cabinet/{alias}/add','\Controller\Frontend\TechOnline\CabinetController@actionAdd');
Route::get('/cabinet/{alias}/update','\Controller\Frontend\TechOnline\CabinetController@actionUpdate');
Route::get('/cabinet/{alias}/rent','\Controller\Frontend\TechOnline\CabinetController@actionRentList');
Route::get('/cabinet/{alias}/parts','\Controller\Frontend\TechOnline\CabinetController@actionPartsList');
Route::post('/cabinet/{alias}/rent/add','\Controller\Frontend\TechOnline\CabinetController@actionAddRent');
Route::post('/cabinet/{alias}/parts/add','\Controller\Frontend\TechOnline\CabinetController@actionAddParts');
Route::get('/cabinet/{alias}/rent/{item_alias}/','\Controller\Frontend\TechOnline\CabinetController@actionEditRent');
Route::get('/cabinet/{alias}/parts/{item_alias}/','\Controller\Frontend\TechOnline\CabinetController@actionEditParts');
Route::post('/cabinet/{alias}/rent/{item_alias}/update','\Controller\Frontend\TechOnline\CabinetController@actionUpdateRent');
Route::post('/cabinet/{alias}/parts/{item_alias}/update','\Controller\Frontend\TechOnline\CabinetController@actionUpdateParts');



/*** BACKEND::CATALOG ***/
Route::get('/backend/catalog','\Controller\Backend\TechOnline\CatalogController@actionIndex');

Route::get('/backend/catalog/list','\Controller\Backend\TechOnline\CatalogController@categoryBaseList');

Route::get('/backend/catalog/create','\Controller\Backend\TechOnline\CatalogController@categoryBaseCreate');

Route::get('/backend/catalog/update/{id}','\Controller\Backend\TechOnline\CatalogController@categoryBaseUpdate');
Route::get('/backend/catalog/delete/{id}','\Controller\Backend\TechOnline\CatalogController@categoryBaseDelete');


/*** SYSTEM::FRONTEND::NEWS ***/
Route::get('/news','\Controller\Frontend\NewsController@actionList');
Route::get('/news/{alias}','\Controller\Frontend\NewsController@actionItem');


/*** SYSTEM::FRONTEND::     VOTED ***/
Route::get('/vote/up/{app_section}/{id}','\Controller\VoteController@up');
Route::get('/vote/down/{app_section}/{id}','\Controller\VoteController@down');


/*** SYSTEM::FRONTEND::COMMENTS ***/
Route::get('/comments/add/{list_id}','\Controller\CommentsController@add');