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
}
