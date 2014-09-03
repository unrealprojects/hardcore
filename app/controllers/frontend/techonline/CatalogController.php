<?php
namespace Controller\Frontend\TechOnline;

class CatalogController extends \Controller{

	static public function actionIndex()
	{
        \Model\Frontend\TechOnline\CatalogBase::all();
	    echo 1;
	}
}
