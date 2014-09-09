<?php
namespace Controller\Backend\TechOnline;


class CatalogController extends TechonlineController{

	public function actionIndex()
	{

        $this->viewData['content'] = [
            'category_list' => \Model\General\TechOnline\CatalogBase::all()->toArray(),
            'template'=> 'content'
        ];

        return \View::make($this->siteViewPath.'/layouts/CatalogTech', $this->viewData);
	}




    /*** Обработка category_base ***/

    public function categoryBaseList()
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

    public function categoryBaseCreate()
    {
        if (\Input::has('model') && \Input::has('description')) {
            $model = \Input::get('model');
            $description = \Input::get('description');

            $item_create=new \Model\General\TechOnline\CatalogBase;
            $item_create->model= $model;
            $item_create->description= $description;
            $item_create->save();
        }

    }

    public function categoryBaseUpdate($id=false)
    {
        if ($id) {

            $model = \Input::get('model');
            $description = \Input::get('description');

            $item_create= \Model\General\TechOnline\CatalogBase::find($id);
            $item_create->model = $model;
            $item_create->description = $description;
            $item_create->save();
        }
        /* Обновление элемента catalog_base */
    }

    public function categoryBaseDelete($id=false)
    {

        if ($id) {
            $item_create= \Model\General\TechOnline\CatalogBase::find($id);
            $item_create->delete();
        }
        /* Удаление элемента catalog_base */
    }

}
