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
    static public function toSubCategories($withPopular=false){
       $instance = new static;
       $categories=$instance::where('app_section','catalog')->get()->toArray();
       $sorted=[];
        $i=0;
        /* Формирование категории Популярные */
        if($withPopular){
            $sorted[0]=["name"=>"Популярные","alias"=>"popular"];
            foreach($categories as $key=>&$category){
                if($category['popular']){
                    $sorted[0]['subCategories'][]=$category;
                }
            }
            $i++;
        }

        /* Формирование подкатегорий */
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
       return $sorted;
    }

    /*** Получение вложенных категорий при поиске ***/
    public static function filterSubCategories($query,$alias){

        $categories = new \Model\General\Categories();
        $category = $categories->where('parent_id',0)->where('alias',$alias)->first();
        if($category){
            $parents = $categories->where('parent_id',$category->id)
                                  ->where('app_section', 'catalog')->get()->toArray();
            foreach($parents as $value){
                $keys[]=$value['id'];
            }
            $query->whereIn('id', $keys)->whereOr('alias', $alias);
        }else{
            $query->where('alias', $alias);
        }
    }
}
