<?php
namespace Controller\Frontend\TechOnline;

class CatalogTechController extends TechonlineController{
    public function actionList()
    {
        /* ФИЛЬТРАЦИЯ */
        $filter = [
            'category' => \Input::get('category')?:false,
            'brand' => \Input::get('brand')?:false,
            'region' => \Input::get('region')?:false
        ];

        /* МОДЕЛЬ */
        $CatalogTech = new \Model\General\TechOnline\CatalogTech();
        $CatalogTechList=$CatalogTech->getList($filter);
        $filters=false;
        if($filter['category']){
            $paramFilters = new \Model\General\Categories();
            $filters = $paramFilters->getFilters($filter['category']);
        }

//        print_r($CatalogTechList->toArray()['data']);
//        exit;

        /* ДАННЫЕ ВИД */
        $this->viewData['content'] = [
            'pagination' => $CatalogTechList->links(),
            'list' => $CatalogTechList->toArray()['data'],
            'template' => 'content',
            'categories' => \Model\General\Categories::toSubCategories(),
            'brands' => \Model\General\TechOnline\CatalogBrand::all()->toArray(),
            'regions' => \Model\General\TechOnline\CatalogRegion::all()->toArray(),
            'filters' => $filters?:false
        ];
//        print_r($filters->toArray());exit;
        return \View::make($this->siteViewPath.'/layouts/CatalogTech',$this->viewData);
    }

    public function actionElement($alias)
    {
        /* ПОЛУЧЕНИЕ СПИСКА ДАННЫХ ИЗ КАТАЛОГА */
        $CatalogTech = new \Model\General\TechOnline\CatalogTech;
        $CatalogTechElement=$CatalogTech->getElement($alias);

        $this->viewData['content'] = [
            'element' => $CatalogTechElement->toArray(),
            'template' => 'content'
        ];

        return \View::make($this->siteViewPath.'/layouts/CatalogTechElement',$this->viewData);
    }
}
