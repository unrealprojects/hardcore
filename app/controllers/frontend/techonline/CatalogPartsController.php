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
        $CatalogPartsList=$CatalogParts->getList($filter);

        /* ДАННЫЕ ВИД */
        $this->viewData['content'] = [
            'pagination' => $CatalogPartsList->links(),
            'list' => $CatalogPartsList->toArray()['data'],
            'template' => 'content',
            'categories' => \Model\General\TechOnline\CatalogPartsCategories::all()->toArray(),
        ];
//        print_r($filters->toArray());exit;
        return \View::make($this->siteViewPath.'/layouts/CatalogParts',$this->viewData);
    }

    public function actionElement($alias)
    {
        /* ПОЛУЧЕНИЕ СПИСКА ДАННЫХ ИЗ КАТАЛОГА */
        $CatalogParts = new \Model\General\TechOnline\CatalogParts;
        $CatalogPartsElement=$CatalogParts->getElement($alias);

        $this->viewData['content'] = [
            'element' => $CatalogPartsElement->toArray(),
            'template' => 'content'
        ];

        return \View::make($this->siteViewPath.'/layouts/CatalogPartsElement',$this->viewData);
    }
}
