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
         $category_list= \Model\General\TechOnline\CatalogBase::paginate(5);

         foreach ($category_list as $cat_item){
            echo $cat_item['model'].'<br>';
         }

        echo $category_list->links();


        /* Вывести список техники из catalog_base */
    }

    static public function categoryBaseCreate()
    {
        /* Добавление элемента catalog_base */
    }

    static public function categoryBaseUpdate()
    {
        /* Обновление элемента catalog_base */
    }

    static public function categoryBaseDelete()
    {
        /* Удаление элемента catalog_base */
    }

    /*
    todo::разобраться как делается пагинация на laravel стандартными методами, возможно ничего придумывать не нужно
    http://laravel.com/docs/pagination
    */
}
