<?php

class MainPageController extends Controller{

	public function showWelcome()
	{
	    return View::make('/frontend/site_techonline/layouts/MainPage');
	}
}
