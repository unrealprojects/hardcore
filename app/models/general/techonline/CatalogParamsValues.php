<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General\TechOnline;

class CatalogParamsValues extends TechOnline {
    protected $table = 'catalog_params_values';

    public function paramData()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogParams','id','param_id');
    }
}
