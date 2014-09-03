<?php
namespace Controller\Backend\TechOnline;

use Model\Backend\CatalogBase;

class CatalogController extends \Controller{

	static public function actionIndex()
	{

	}

    /*** Обработка category_base ***/

    static public function categoryBaseList()
    {
         $category_list = \Model\General\TechOnline\CatalogBase::paginate(5);

         $pagination = $category_list->links();

         $category_list = $category_list->toArray();
         foreach ($category_list['data'] as $cat_item){
             echo $cat_item['model'].'<br>';
         }

        echo $pagination;

        /* Вывести список техники из catalog_base */
    }

    static public function categoryBaseCreate()
    {
        if (\Input::has('model') && \Input::has('description')) {
            $model = \Input::get('model');
            $description = \Input::get('description');

            $item_create=new \Model\General\TechOnline\CatalogBase;
            $item_create->model= $model;
            $item_create->description= $description;
            $item_create->save();
        }


//        if ($_GET["model"] && $_GET["description"]) {
//            $model = $_GET["model"];
//            $description = $_GET["description"];
//
//            $item_create=new \Model\General\TechOnline\CatalogBase;
//            $item_create->model= $model;
//            $item_create->description= $description;
//            $item_create->save();
//        }


        /* Добавление элемента catalog_base */
    }

    static public function categoryBaseUpdate()
    {
        if ($_GET["id"]) {
            $id = $_GET["id"];
            $model = $_GET["model"];
            $description = $_GET["description"];

            $item_create= \Model\General\TechOnline\CatalogBase::find($id);
            $item_create->model = $model;
            $item_create->description = $description;
            $item_create->save();
        }
        /* Обновление элемента catalog_base */
    }

    static public function categoryBaseDelete()
    {

        if ($_GET["id"]) {
            $id = $_GET["id"];

            $item_create= \Model\General\TechOnline\CatalogBase::find($id);

            $item_create->delete();
        }
        /* Удаление элемента catalog_base */
    }

    /*
    todo::разобраться как делается пагинация на laravel стандартными методами, возможно ничего придумывать не нужно
    http://laravel.com/docs/pagination
    */
}
