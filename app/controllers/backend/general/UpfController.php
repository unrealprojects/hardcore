<?php
namespace Controller\Backend;

class UpfController extends BackendController{
    public function index(){
        $this->viewData['content'] = [];
        return \View::make('/backend/standard/layouts/upf/Main',$this->viewData);
    }

}
