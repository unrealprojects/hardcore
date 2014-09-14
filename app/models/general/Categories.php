<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General;

class Categories extends General{
    protected $table = 'categories';

    /* Связи */
    public function filters(){
        return $this->belongsToMany('Model\General\TechOnline\CatalogParams', 'catalog_categories_to_params', 'category_id', 'param_id');
    }

    /* Запросы */
    public function getFilters($category){
        return $this->with('filters')
            ->where('alias',$category)
            ->first();
    }

    /* Создание двухуровневых вложений */
    static public function toSubCategories(){
       $instance = new static;
       $categories=$instance::where('app_section','catalog')->get()->toArray();
       $sorted=[];
       $i=0;

       foreach($categories as $key=>&$category){
           if($category['parent_id']==0){
               $sorted[]=$category;
               foreach($categories as $subKey=>&$subcategory){
                   if($subcategory['parent_id']!=0 && $category['id']==$subcategory['parent_id']){
                       $sorted[$i]['subCategories'][]=$subcategory;
                       unset($categories[$subKey]);
                   }
               }
               unset($categories[$key]);
               $i++;

           }
       }
//        print_r($sorted);
//        exit;
       return $sorted;
    }
}
