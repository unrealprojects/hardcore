<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General;

class News extends General{
    public $timestamps = true;
    protected $table = 'news';

    public function tags()
    {
          return $this->belongsToMany('Model\General\Tags', 'tags_to_items', 'item_id', 'tag_id');
//        return $this->hasOne('Model\General\Tags','id','tag_id');
    }

    public function category()
    {
        return $this->hasMany('Model\General\Categories','id','category_id');
    }

    /* Запросы */
    public function getList($filter){
        $this->filter = $filter;

        return $this->with('category','metadata','tags')
            /* Уточнение app_section для категории */
            /*->whereHas('category', function($query) {
                $query->where('app_section', 'news');
            })*/
            /* Уточнение app_section для тегов */
//            ->whereHas('category', function($query) {
//                $query->where('app_section', 'catalog');
//            })
            /* Фильтрация */
//            ->whereHas('category', function($query) {
//                if($this->filter['category']){
//                    $query->where('alias', $this->filter['category']);
//                }
//            })
            ->whereHas('tags', function($query) {
                if($this->filter['tag']){
                    $query->where('alias', $this->filter['tag']);
                }
            })
            ->paginate(5);
    }

    public function getItem($alias){
        $this->rewrite['alias']=$alias;
        return $this->with('category','metadata','tags','comments')
//            /* Уточнение app_section для категории */
//            ->whereHas('category', function($query) {
//                $query->where('app_section', 'catalog');
//            })
            ->whereHas('metadata', function($query) {
                $query->where('alias',$this->rewrite['alias']);
            })
            ->first();
    }
}
