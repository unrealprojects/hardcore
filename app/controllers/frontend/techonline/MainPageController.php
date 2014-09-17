<?php
namespace Controller\Frontend\TechOnline;

class MainPageController extends TechonlineController{

	public function index()
	{
        /* Фильтр */
        /* Новости, Исполнители с наивысшим рейтингом */

        $this->viewData['content']=[
            'categories'=>\Model\General\Categories::toSubCategories(),
            'categories_list'=>\Model\General\Categories::all(),
            'categories_with_popular'=>\Model\General\Categories::toSubCategories(true),
            'regions'=>\Model\General\TechOnline\CatalogRegion::toSubRegions(true),
            'regions_list'=>\Model\General\TechOnline\CatalogRegion::all(),
            'brands'=>\Model\General\TechOnline\CatalogBrand::all()->toArray(),
            'news'=>\Model\General\News::orderBy('rating','desc')->with('tags','metadata')->limit(6)->get()->toArray(),
            'sellers'=>\Model\General\TechOnline\CatalogAdmin::orderBy('rating','desc')->with('region','metadata')->limit(6)->get()->toArray()
        ];

        return \View::make($this->siteViewPath.'/layouts/MainPage',$this->viewData);
	}
}
