<?php
namespace Controller\Frontend\TechOnline;

class MainPageController extends TechonlineController{

	public function index()
	{
        /* Фильтр */
        /* Новости, Исполнители с наивысшим рейтингом */

        $this->viewData['content']=[
            'filter'=>[
                'categories'=>\Model\General\Categories::toSubCategories(true),
                'brands'=>\Model\General\TechOnline\CatalogBrand::orderBy('foreign')->get()->toArray(),
                'categories_list'=>\Model\General\Categories::all(),
                'regions'=>\Model\General\TechOnline\CatalogRegion::toSubRegions(true),
                'regions_list'=>\Model\General\TechOnline\CatalogRegion::all(),
            ],
            'categories'=>\Model\General\Categories::toSubCategories(),
            'news'=>\Model\General\News::orderBy('rating','desc')->with('tags','metadata')->limit(6)->get()->toArray(),
            'sellers'=>\Model\General\TechOnline\CatalogAdmin::orderBy('rating','desc')->with('region','metadata')->limit(6)->get()->toArray()
        ];

        return \View::make($this->siteViewPath.'/layouts/MainPage',$this->viewData);
	}

    public function filterSet($category_alias){
        $paramFilters = new \Model\General\Categories();
        $filters = $paramFilters->getFilters($category_alias);
        $this->viewData['content']=[
            'filters'=>$filters
        ];
        $content=\View::make($this->siteViewPath.'/layouts/filter/FilterParams',$this->viewData);
        $script=\View::make($this->siteViewPath.'/layouts/filter/FilterParamsScript',$this->viewData);
        echo json_encode([
            'params'=>[htmlentities($content)],
            'script'=>[htmlentities($script)],
        ]);
    }
}
