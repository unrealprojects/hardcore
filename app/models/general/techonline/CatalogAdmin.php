<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General\TechOnline;

class CatalogAdmin extends TechOnline {
    protected $table = 'catalog_admin';
    public $timestamps = true;

    /* Связи */


    public function region()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogRegion','id','region_id');
    }

    public function techList(){
        return $this->hasMany('Model\General\TechOnline\CatalogTech','admin_id','id');
    }

    public function partsList(){
        return $this->hasMany('Model\General\TechOnline\CatalogParts','admin_id','id');
    }

    public function comments()
    {
        return $this->hasMany('Model\General\Comments','list_id','comments_id');
    }


    /* Запросы */
    public function getList($filter){
        $this->filter = $filter;

        return $this->with('region')
            ->where('active','=',1)
            ->paginate(5);
    }

    public function getElement($alias){
        return $this->with('region','partsList','techList','comments')
            ->where('alias','=',$alias)
            ->first();
    }
}
