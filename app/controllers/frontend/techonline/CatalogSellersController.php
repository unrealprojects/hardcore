<?php
namespace Controller\Frontend\TechOnline;

class CatalogSellersController extends TechonlineController{
    public function actionList()
    {
        /* ФИЛЬТРАЦИЯ */
        $filter = [
            'region' => \Input::get('region')?:false
        ];

        /* МОДЕЛЬ */
        $CatalogAdmin = new \Model\General\TechOnline\CatalogAdmin();
        $CatalogAdminList=$CatalogAdmin->getList($filter);

        /* ДАННЫЕ ВИД */
        $this->viewData['content'] = [
            'pagination' => $CatalogAdminList->links(),
            'list' => $CatalogAdminList->toArray()['data'],
            'template' => 'content',
            'regions' => \Model\General\TechOnline\CatalogRegion::all()->toArray()
        ];
//        print_r($filters->toArray());exit;
        return \View::make($this->siteViewPath.'/layouts/CatalogSellers',$this->viewData);
    }

    public function actionElement($alias)
    {
        /* ПОЛУЧЕНИЕ СПИСКА ДАННЫХ ИЗ КАТАЛОГА */
        $CatalogAdmin = new \Model\General\TechOnline\CatalogAdmin();
        $CatalogAdminList=$CatalogAdmin->getElement($alias);

        $this->viewData['content'] = [
            'item' => $CatalogAdminList->toArray(),
            'template' => 'content'
        ];
//        print_r($CatalogAdminList->toArray());exit;

        return \View::make($this->siteViewPath.'/layouts/CatalogSellersElement',$this->viewData);
    }
}
