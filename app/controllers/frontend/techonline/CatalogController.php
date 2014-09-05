<?php
namespace Controller\Frontend\TechOnline;

class CatalogController extends TechonlineController{
    public function actionIndex()
    {
        /* ПОЛУЧЕНИЕ СПИСКА ДАННЫХ ИЗ КАТАЛОГА */
        $CatalogBase = new \Model\General\TechOnline\CatalogBase;
        $CatalogBaseList=$CatalogBase->getList();
//print_r($CatalogBaseList->toArray()['data']);exit;
        $this->viewData['content'] = [
            'pagination' => $CatalogBaseList->links(),
            'list' => $CatalogBaseList->toArray()['data'],
            'template' => 'content'
        ];

        return \View::make($this->siteViewPath.'/layouts/CatalogTech',$this->viewData);
    }
}
