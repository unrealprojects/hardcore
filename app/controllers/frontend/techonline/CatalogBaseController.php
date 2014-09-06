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
        $CatalogBase = new \Model\General\TechOnline\CatalogBase;
        $CatalogBaseList=$CatalogBase->getList($filter);

        /* ДАННЫЕ ВИД */
        $this->viewData['content'] = [
            'pagination' => $CatalogBaseList->links(),
            'list' => $CatalogBaseList->toArray()['data'],
            'template' => 'content',
            'categories' => \Model\General\TechOnline\CatalogTechCategories::all()->toArray(),
            'brands' => \Model\General\TechOnline\CatalogBrand::all()->toArray()
        ];
//        print_r($CatalogBaseList->toArray()['data']);exit;
        return \View::make($this->siteViewPath.'/layouts/CatalogTech',$this->viewData);
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

        return \View::make($this->siteViewPath.'/layouts/CatalogTechElement',$this->viewData);
    }
}
