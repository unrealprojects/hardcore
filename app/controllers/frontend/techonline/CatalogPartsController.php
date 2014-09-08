<?php
namespace Controller\Frontend\TechOnline;

class CatalogPartsController extends TechonlineController{
    public function actionList()
    {
        /* ФИЛЬТРАЦИЯ */
        $filter = [
            'category' => \Input::get('category')?:false,
            'brand' => \Input::get('brand')?:false
        ];

        /* МОДЕЛЬ */
        $CatalogParts = new \Model\General\TechOnline\CatalogParts();
        $CatalogBaseList=$CatalogParts->getList($filter);
        $filters=false;
        if($filter['category']){
            $paramFilters = new \Model\General\TechOnline\CatalogPartsCategories();
            $filters = $paramFilters->getFilters($filter['category']);
        }

        /* ДАННЫЕ ВИД */
        $this->viewData['content'] = [
            'pagination' => $CatalogBaseList->links(),
            'list' => $CatalogBaseList->toArray()['data'],
            'template' => 'content',
            'categories' => \Model\General\TechOnline\CatalogTechCategories::all()->toArray(),
            'brands' => \Model\General\TechOnline\CatalogBrand::all()->toArray(),
            'filters' => $filters?:false
        ];
//        print_r($filters->toArray());exit;
        return \View::make($this->siteViewPath.'/layouts/CatalogParts',$this->viewData);
    }

    public function actionElement($alias)
    {
        /* ПОЛУЧЕНИЕ СПИСКА ДАННЫХ ИЗ КАТАЛОГА */
        $CatalogBase = new \Model\General\TechOnline\CatalogBase;
        $CatalogBaseElement=$CatalogBase->getElement($alias);

        $this->viewData['content'] = [
            'element' => $CatalogBaseElement->toArray(),
            'template' => 'content'
        ];

        return \View::make($this->siteViewPath.'/layouts/CatalogPartsElement',$this->viewData);
    }
}
