<?php
namespace Controller\Frontend\TechOnline;

class CabinetController extends TechonlineController{
    public function actionCabinet($alias)
    {
        //todo: если админ, то работаю с его id
        /* ДАННЫЕ ВИД */
        $CatalogAdmin = new \Model\General\TechOnline\CatalogAdmin();
        $CatalogAdminList=$CatalogAdmin->getItem($alias);

        $this->viewData['content'] = [
            'item' => $CatalogAdminList->toArray(),
            'regions' => \Model\General\TechOnline\CatalogRegion::all()->toArray(),
            'template' => 'content'
        ];

        return \View::make($this->siteViewPath.'/layouts/cabinet/Cabinet',$this->viewData);
    }


   /* public function actionElement($alias)
    {
        $this->viewData['content'] = [
            'item' => $CatalogAdminList->toArray(),
            'template' => 'content',
        ];

        return \View::make($this->siteViewPath.'/layouts/CatalogBaseElement',$this->viewData);
    }*/
}
