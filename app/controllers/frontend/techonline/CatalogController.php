<?php
namespace Controller\Frontend\TechOnline;

class CatalogController extends TechonlineController{
    public function actionList()
    {
        /* ПОЛУЧЕНИЕ СПИСКА ДАННЫХ ИЗ КАТАЛОГА */
        $CatalogBase = new \Model\General\TechOnline\CatalogBase;
        $CatalogBaseList=$CatalogBase->getList();

        $this->viewData['content'] = [
            'pagination' => $CatalogBaseList->links(),
            'list' => $CatalogBaseList->toArray()['data'],
            'template' => 'content'
        ];

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
