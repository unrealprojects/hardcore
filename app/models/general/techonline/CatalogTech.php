<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General\TechOnline;

class CatalogTech extends TechOnline {
    protected $table = 'catalog_tech';
    public $timestamps = true;

    /* Связи */
    public function model(){
        return $this->hasOne('Model\General\TechOnline\CatalogBase','id','model_id');
    }

    public function region(){
        return $this->hasOne('Model\General\TechOnline\CatalogRegion','id','region_id');
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

        return $this::with('model',
                           'model.category',
                           'model.brand',
                           'model.metadata',
                           'model.params_values',
                           'model.params_values.paramData',
                           'region',
                           'status',
                           'opacity',
                           'admin',
                           'admin.metadata',
                           'metadata')
            ->whereHas('model', function($query) {
                if($this->filter['category']){
                    $query->whereHas('category',function($query){
                        $query->where('alias', $this->filter['category']);
                    });
                }
            })
            ->whereHas('model', function($query) {
                if($this->filter['brand']){
                    $query->whereHas('brand',function($query){
                        $query->where('alias', $this->filter['brand']);
                    });
                }
            })
            ->whereHas('region', function($query) {
                if($this->filter['region']){
                    $query->where('alias', $this->filter['region']);
                }
            })
            ->orderBy('created_at','desc')
            ->paginate(5);
    }

    public function getElement($alias){
        $this->rewrite['alias']=$alias;
        return $this::with('model',
            'model.category',
            'model.brand',
            'model.metadata',
            'model.params_values',
            'model.params_values.paramData',
            'region',
            'comments',
            'status',
            'opacity',
            'admin',
            'admin.metadata',
            'metadata')
            ->whereHas('metadata', function($query) {
                $query->where('alias',$this->rewrite['alias']);
            })
            ->first();
    }
}
