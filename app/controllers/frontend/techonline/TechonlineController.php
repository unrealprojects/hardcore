<?php
namespace Controller\Frontend\TechOnline;

class TechonlineController extends \Controller{

    public $viewData;
    public $siteViewPath='/frontend/site_techonline/';

    public function __construct(){
        $this->getMetaData();
    }

    public function getMetaData(){
        $this->viewData=[
            'meta' => [
                'title' => 'Hardcore',
                'description' => 'Hardcore cms',
                'keywords' => 'Hardcore,cms    '
            ]
        ];
    }

}
