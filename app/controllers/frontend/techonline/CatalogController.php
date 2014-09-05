<?php
namespace Controller\Frontend\TechOnline;

class CatalogController extends \Controller{

	static public function actionIndex()
	{
        $category_list = \Model\General\TechOnline\CatalogBase::paginate(5);

        $pagination = $category_list->links();

        $category_list = $category_list->toArray();
        foreach ($category_list['data'] as $cat_item){
            echo $cat_item['model'].'<br>';
        }

        echo $pagination;
	}


}
