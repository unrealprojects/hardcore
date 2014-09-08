<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General\TechOnline;

class CatalogPartsCategories extends TechOnline {
    protected $table = 'catalog_parts_categories';

    /* Запросы */
    public function getFilters($category){
        return $this->with('filters')
            ->where('alias',$category)
            ->first();
    }
}
