<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General\TechOnline;

class CatalogTechCategories extends TechOnline {
    protected $table = 'catalog_tech_categories';

    /* Связи */
    public function filters(){
        return $this->belongsToMany('Model\General\TechOnline\CatalogParams', 'catalog_tech_categories_to_params', 'category_id', 'param_id');
    }

    /* Запросы */
    public function getFilters($category){
        return $this->with('filters')
            ->where('alias',$category)
            ->first();
    }

    static public function toSubCategories(){
       $instance = new static;
       $categories=$instance::get()->toArray();
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
