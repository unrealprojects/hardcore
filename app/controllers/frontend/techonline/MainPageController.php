<?php
namespace Controller\Frontend\TechOnline;

class MainPageController extends TechonlineController{

	public function index()
	{
        /* Категории вверху */

        /* Каталог стройтехники */

        /*  Производители */

        /* Фильтр */

        /* Новости, Исполнители с наивысшим рейтингом */



        $this->viewData['content']=[
            '1'=>1
        ];
        $this->viewData['modules']=[
            '1'=>1
        ];

	    return \View::make($this->siteViewPath.'/layouts/MainPage',$this->viewData);
	}
}
