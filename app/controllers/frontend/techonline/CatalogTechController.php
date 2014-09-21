<?php
namespace Controller\Frontend\TechOnline;

class CatalogTechController extends TechonlineController{
    public function actionList()
    {
        /* ФИЛЬТРАЦИЯ */
        $filter = [
            'category' => \Input::get('category')?:false,
            'brands' => \Input::get('brands')?:false,
            'region' => \Input::get('region')?:false,
            'params' => \Input::get('params')?:false,
            'price-min' => \Input::get('price-min')?:false,
            'price-max' => \Input::get('price-max')?:false,
        ];

        /* МОДЕЛЬ */
        $modelCategories = new \Model\General\Categories();
        $CatalogTech = new \Model\General\TechOnline\CatalogTech();
        $CatalogTechList=$CatalogTech->getList($filter);
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
                'regions'=>\Model\General\TechOnline\CatalogRegion::toSubRegions(true),
                'regions_list'=>\Model\General\TechOnline\CatalogRegion::all(),
                'has_params'=>true,
                'params'=>$modelCategories->getFilters(\Input::get('category'))
            ],
            'pagination' => $CatalogTechList->appends(\Input::except('page'))->links(),
            'list' => $CatalogTechList->toArray()['data'],
            'template' => 'content',
            'categories' => \Model\General\Categories::toSubCategories(),
            'brands' => \Model\General\TechOnline\CatalogBrand::all()->toArray(),
            'regions' => \Model\General\TechOnline\CatalogRegion::all()->toArray(),
            'filters' => $filters?:false
        ];
//       print_r( $this->viewData['content']['list']);exit;
        return \View::make($this->siteViewPath.'/layouts/CatalogTech',$this->viewData);
    }

    public function actionElement($alias)
    {
        /* ПОЛУЧЕНИЕ СПИСКА ДАННЫХ ИЗ КАТАЛОГА */
        $CatalogTech = new \Model\General\TechOnline\CatalogTech;
        $CatalogTechElement=$CatalogTech->getElement($alias);

        $this->viewData['content'] = [
            'item' => $CatalogTechElement->toArray(),
            'template' => 'content'
        ];

        return \View::make($this->siteViewPath.'/layouts/CatalogTechElement',$this->viewData);
    }
}
