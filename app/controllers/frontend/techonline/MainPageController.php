<?php
namespace Controller\Frontend\TechOnline;

class MainPageController extends TechonlineController{

	public function index()
	{
        /* Фильтр */

        /* Новости, Исполнители с наивысшим рейтингом */





        $this->viewData['content']=[
            '1'=>1,
            'categories'=>\Model\General\TechOnline\CatalogTechCategories::all()->toArray(),
            'regions'=>\Model\General\TechOnline\CatalogRegion::all()->toArray(),
            'brands'=>\Model\General\TechOnline\CatalogBrand::all()->toArray(),
            'news'=>'news',
            'sellers'=>\Model\General\TechOnline\CatalogAdmin::orderBy('rating','desc')->with('region')->limit(6)->get()->toArray()
        ];

	    return \View::make($this->siteViewPath.'/layouts/MainPage',$this->viewData);
	}
}
