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

      $query = $this::with('model',
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
          /*** Фильтр в Регионах ***/
          ->whereHas('region', function($query) {
              if($this->filter['region']){
                  \Model\General\TechOnline\CatalogRegion::filterSubRegions($query,$this->filter['region']);
              }
          })
            /*** Фильтр в Категориях ***/
            ->whereHas('model', function($query) {
                if($this->filter['category']){
                    $query->whereHas('category',function($query){
                       \Model\General\Categories::filterSubCategories($query,$this->filter['category']);
                    });
                }
            })
            /*** Фильтр по Поизводителям ***/
            ->whereHas('model', function($query) {
                if($this->filter['brands']){
                    $query->whereHas('brand',function($query){
                        $query->whereIn('alias', $this->filter['brands']);
                    });
                }
            })
            /*** Фильтр по Параметрам ***/
            ->whereHas('model', function($query) {
                if($this->filter['params']){
                    $query->whereHas('params_values',function($query){
                        foreach($this->filter['params'] as $key => $param){
                            $query->where('param_id',$param['id'])
                                ->where('value','>=',$param['min-value'])
                                ->where('value','<=',$param['max-value']);
                        }
                    });
                }
            })
            ->orderBy('status_id','desc')
            ->orderBy('created_at','desk');

    if($this->filter['price-max'] && $this->filter['price-min']){
        $query = $query->where('price','>=',$this->filter['price-min'])
                 ->where('price','<=',$this->filter['price-max']);
    }

        return $query->paginate(5);
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
