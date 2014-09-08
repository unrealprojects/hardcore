<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General\TechOnline;

class CatalogParts extends TechOnline {
    protected $table = 'catalog_parts';
    public $timestamps = true;

    /* Связи */

    public function category()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogPartsCategories','id','category_id');
    }

    public function comments()
    {
        return $this->hasMany('Model\General\Comments','list_id','comments_id');
    }

    public function status()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogStatuses','id','status_id');
    }

    public function opacity()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogOpacity','id','opacity_id');
    }

    public function admin()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogAdmin','id','admin_id');
    }


    /* Запросы */
    public function getList($filter){
        $this->filter = $filter;

        return $this->with('category','status','opacity','admin')
            ->whereHas('category', function($query) {
                if($this->filter['category']){
                    $query->where('alias', $this->filter['category']);
                }
            })
            ->paginate(5);
    }

    public function getElement($alias){
        return $this->with('category','status','opacity','admin','comments')
            ->where('alias','=',$alias)
            ->first();
    }
}
