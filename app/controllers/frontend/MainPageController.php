<?php

class MainPageController extends Controller{

	static public function showWelcome()
	{
	    return View::make('/frontend/site_techonline/layouts/MainPage');
	}
}
