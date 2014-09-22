<?php
namespace Controller\Frontend\TechOnline;

class CatalogBaseController extends TechonlineController{
    public function actionList()
    {
        /* ФИЛЬТРАЦИЯ */
        $filter = [
            'category' => \Input::get('category')?:false,
            'brand' => \Input::get('brand')?:false
        ];

        /* МОДЕЛЬ */
        $modelCategories = new \Model\General\Categories();
        $CatalogBase = new \Model\General\TechOnline\CatalogBase();
        $CatalogBaseList=$CatalogBase->getList($filter);
        $filters=false;
        if($filter['category']){
            $paramFilters = new \Model\General\Categories();
            $filters = $paramFilters->getFilters($filter['category']);
        }



        /* ДАННЫЕ ВИД */
        $this->viewData['content'] = [
            'filter'=>[
                'categories'=>\Model\General\Categories::toSubCategories(true),
                'brands'=>\Model\General\TechOnline\CatalogBrand::orderBy('foreign')->get()->toArray(),
                'categories_list'=>\Model\General\Categories::all(),
                'params'=>$modelCategories->getFilters(\Input::get('category')),
                'has_params'=>true,
                'has_price'=>true,
            ],
            'pagination' => $CatalogBaseList->links(),
            'list' => $CatalogBaseList->toArray()['data'],
            'template' => 'content',
            'categories' => \Model\General\Categories::toSubCategories(),
            'brands' => \Model\General\TechOnline\CatalogBrand::all()->toArray(),
            'filters' => $filters?:false
        ];
//        print_r($CatalogBaseList->toArray()['data']);exit;
        return \View::make($this->siteViewPath.'/layouts/CatalogBase',$this->viewData);
    }

    public function actionElement($alias)
    {
        /* ПОЛУЧЕНИЕ СПИСКА ДАННЫХ ИЗ КАТАЛОГА */
        $CatalogBase = new \Model\General\TechOnline\CatalogBase;
        $CatalogBaseElement=$CatalogBase->getElement($alias);

        $this->viewData['content'] = [
            'item' => $CatalogBaseElement->toArray(),
            'template' => 'content',
        ];

        return \View::make($this->siteViewPath.'/layouts/CatalogBaseElement',$this->viewData);
    }

}
