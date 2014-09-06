<?php
namespace Controller\Frontend\TechOnline;

class CatalogBaseController extends TechonlineController{
    public function actionList()
    {
        /* ФИЛЬТРАЦИЯ */
        $filterCategory = \Input::get('category');
        $filterRegion = \Input::get('region');
        $filterBrand = \Input::get('brand');

        /* МОДЕЛЬ */
        $CatalogBase = new \Model\General\TechOnline\CatalogBase;
        $CatalogBaseList=$CatalogBase->getList();

        /* ДАННЫЕ ВИД */
        $this->viewData['content'] = [
            'pagination' => $CatalogBaseList->links(),
            'list' => $CatalogBaseList->toArray()['data'],
            'template' => 'content'
        ];
        print_r($CatalogBaseList->toArray()['data']);exit;
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
