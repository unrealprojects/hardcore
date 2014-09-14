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

    /* Запросы */
    public function getList($filter){
        $this->filter = $filter;

        return $this->with('region','metadata')
            ->whereHas('region', function($query) {
                if($this->filter['region']){
                    $query->where('alias', $this->filter['region']);
                }
            })
            ->where('active','=',1)
            ->paginate(5);
    }

    public function getItem($alias){
        $this->rewrite['alias']=$alias;

        return $this->with('region','partsList','partsList.metadata','techList','techList.metadata','comments','metadata')
            ->whereHas('metadata', function($query) {
                 $query->where('alias',$this->rewrite['alias']);
            })
            ->first();
    }
}
