<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General\TechOnline;

class CatalogBase extends TechOnline {
    protected $table = 'catalog_base';

    public function brand()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogBrand','id','brand_id');
    }

    public function getList(){
        return $this->with('brand')->paginate(10);
    }
}
