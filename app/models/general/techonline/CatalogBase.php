<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General\TechOnline;

class CatalogBase extends TechOnline {
    protected $table = 'catalog_base';
    public $filter;

    /* Связи */
    public function brand()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogBrand','id','brand_id');
    }


    public function category()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogTechCategories','id','category_id');
    }

   public function params_values()
    {
        return $this->hasMany('Model\General\TechOnline\CatalogParamsValues','model_id','id');
    }

    public function comments()
    {
        return $this->hasMany('Model\General\Comments','list_id','comments_id');
    }


    /* Запросы */
    public function getList($filter){
       $this->filter = $filter;

       return $this->with('category','brand','params_values','params_values.paramData')
            ->whereHas('category', function($query) {
                 if($this->filter['category']){
                     $query->where('alias', $this->filter['category']);
                 }
            })
           ->whereHas('brand', function($query) {
               if($this->filter['brand']){
                   $query->where('alias', $this->filter['brand']);
               }
           })
           ->paginate(5);
    }

    public function getElement($alias){
        return $this->with('category','brand','params_values','params_values.paramData','comments')
                    ->where('alias','=',$alias)
                    ->first();
    }
}