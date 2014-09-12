<?php
namespace Controller\Frontend;

class FrontendController extends \Controller {

    public $viewData;

    public function __construct(){
        $this->getMetaData();
    }

    public function getMetaData(){
        $alias=\Route::current()->parameter('alias');
        $app_section=\Request::segment(1);

        $MetaData = \Model\General\MetaData::where('app_section',$app_section)->where('alias',$alias)->first()  ;

        $this->viewData=[
            'meta' => [
                'title' => (!empty($MetaData->title))?:\Config::get('site/app_settings.MetaData.title'),
                'description' => (!empty($MetaData->description))?:\Config::get('site.app_settings.metadata.description'),
                'keywords' => (!empty($MetaData->keywords))?:\Config::get('site.app_settings.metadata.keyword')
            ]
        ];
    }

}
