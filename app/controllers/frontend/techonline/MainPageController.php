<?php
namespace Controller\Frontend\TechOnline;

class MainPageController extends TechonlineController{

	public function index()
	{
        /* Фильтр */

        /* Новости, Исполнители с наивысшим рейтингом */





        $this->viewData['content']=[
            'categories'=>\Model\General\Categories::toSubCategories(),
            'regions'=>\Model\General\TechOnline\CatalogRegion::all()->toArray(),
            'brands'=>\Model\General\TechOnline\CatalogBrand::all()->toArray(),
            'news'=>\Model\General\News::orderBy('rating','desc')->with('tags','metadata')->limit(6)->get()->toArray(),
            'sellers'=>\Model\General\TechOnline\CatalogAdmin::orderBy('rating','desc')->with('region','metadata')->limit(6)->get()->toArray()
        ];

	    return \View::make($this->siteViewPath.'/layouts/MainPage',$this->viewData);
	}
}
