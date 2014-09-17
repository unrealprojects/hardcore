<?php
namespace Controller\Frontend\TechOnline;

class CabinetController extends TechonlineController{
    public function actionCabinet($alias)
    {
        //todo: если админ, то работаю с его id
        /* ДАННЫЕ ВИД */
        $CatalogAdmin = new \Model\General\TechOnline\CatalogAdmin();
        $CatalogAdminList=$CatalogAdmin->getFullItem($alias);

        $this->viewData['content'] = [
            'item' => $CatalogAdminList->toArray(),
            'regions' => \Model\General\TechOnline\CatalogRegion::all()->toArray(),
            'template' => 'content'
        ];

        return \View::make($this->siteViewPath.'/layouts/cabinet/Cabinet',$this->viewData);
    }

    public function actionPartsList($alias){
        /* МОДЕЛЬ */
        $CatalogParts = new \Model\General\TechOnline\CatalogParts();
        $CatalogPartsList=$CatalogParts->getListForSeller($alias);

        /* ДАННЫЕ ВИД */
        $this->viewData['content'] = [
            'pagination' => $CatalogPartsList->links(),
            'list' => $CatalogPartsList->toArray()['data'],
            'template' => 'content',
            'categories' => \Model\General\Categories::toSubCategories(),
        ];
//        print_r($filters->toArray());exit;
        return \View::make($this->siteViewPath.'/layouts/cabinet/CabinetParts',$this->viewData);
    }


    public function actionCabinetRent($alias)
    {
            //todo: если админ, то работаю с его id
            /* ДАННЫЕ ВИД */
            $CatalogAdmin = new \Model\General\TechOnline\CatalogAdmin();
            $CatalogAdminList=$CatalogAdmin->getFullItem($alias);

            $this->viewData['content'] = [
                'item' => $CatalogAdminList->toArray(),
                'regions' => \Model\General\TechOnline\CatalogRegion::all()->toArray(),
                'template' => 'content'
            ];

            return \View::make($this->siteViewPath.'/layouts/cabinet/Cabinet',$this->viewData);
    }

}
