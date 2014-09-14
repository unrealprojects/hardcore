<?php
namespace Controller\Frontend;

class NewsController extends FrontendController{


    public function actionList(){
        /* ФИЛЬТРАЦИЯ */
        $filter = [
            'category' => \Input::get('category')?:false,
            'tag' => \Input::get('tag')?:false
        ];

        /* МОДЕЛЬ */
        $News = new \Model\General\News();
        $NewsList=$News->getList($filter);
        $filters=false;
        if($filter['category']){
            $paramFilters = new \Model\General\Categories();
            $filters = $paramFilters->getFilters($filter['category']);
        }

        /* ДАННЫЕ ВИД */
        $this->viewData['content'] = [
            'pagination' => $NewsList->links(),
            'list' => $NewsList->toArray()['data'],
            'template' => 'content',
            'tags' => \Model\General\Tags::where('app_section','news')->get(),
            'filters' => $filters?:false
        ];

//        print_r($NewsList->toArray());
        return \View::make('/frontend/site_techonline/layouts/News',$this->viewData);
    }

    public function actionItem($alias){
        $News = new \Model\General\News;
        $NewsItem=$News->getItem($alias);

        $this->viewData['content'] = [
            'item' => $NewsItem->toArray(),
            'template' => 'content',
        ];

        return \View::make('/frontend/site_techonline/layouts/NewsItem',$this->viewData);
    }
}
