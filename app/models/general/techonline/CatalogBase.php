<?php

/**
 *  БАЗОВЫЙ КАТАЛОГ
 */
namespace Model\General\TechOnline;

class CatalogBase extends TechOnline {
    protected $table = 'catalog_base';

    protected static function boot() {
        static::addGlobalScope(new Model\General\TechOnline\CatalogBrand);
        parent::boot();
    }
    /* Связи */
    public function brand()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogBrand','id','brand_id');
    }

    /* Связи */
    public function category()
    {
        return $this->hasOne('Model\General\TechOnline\CatalogTechCategories','id','category_id');
    }

    public function getList(){
      $this ->//join('catalog_tech_categories','catalog_base.category_id','=','catalog_tech_categories.id')
                   //->join('catalog_brand','catalog_base.brand_id','=','catalog_brand.id')
          newQuery()->with('category')
                   ->where('catalog_tech_categories.alias','frontalnye-pogruzchiki')

                    ->paginate(5);
        print_r( \DB::getQueryLog());
    exit;
    }

    public function getElement($alias){
        return $this->with('brand')
                    ->with('category')
                    ->where('alias','=',$alias)
                    ->first();
    }
}
