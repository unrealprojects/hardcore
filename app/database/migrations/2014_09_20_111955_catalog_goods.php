<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CatalogGoods extends Migration {

	public function up()
	{
        $catalog_base = new \Model\General\TechOnline\CatalogBase();
        $catalog_base->model = 'EG40R';
        /* update metadata */
        $meta_data = new \Model\General\MetaData();
        $meta_data->alias = Mascame\Urlify::filter($catalog_base->model);
        $meta_data->title=$catalog_base->model;
        $meta_data->description=$catalog_base->model;
        $meta_data->keywords=$catalog_base->model;
        $meta_data->app_section = 'catalog';
        $meta_data->save();
        $catalog_base->metadata_id = $meta_data->id;
        /*end update metadata*/

        $catalog_base->description = 'Думпер (мини-самосвал) IHI EG40R';


        $catalog_base->photos =
            json_encode(
                [ 0=>["name"=>"Big Japan Car","src"=>"model2.jpg"]
            ]);

        $catalog_base->brand_id=9;
        $catalog_base->category_id=9;
        $catalog_base->comments_id=1;
        $catalog_base->save();

        $catalog_base = new \Model\General\TechOnline\CatalogBase();
        $catalog_base->model = 'EG110R';
        /* update metadata */
        $meta_data = new \Model\General\MetaData();
        $meta_data->alias = Mascame\Urlify::filter($catalog_base->model);
        $meta_data->title=$catalog_base->model;
        $meta_data->description=$catalog_base->model;
        $meta_data->keywords=$catalog_base->model;
        $meta_data->app_section = 'catalog';
        $meta_data->save();
        $catalog_base->metadata_id = $meta_data->id;
        /*end update metadata*/

        $catalog_base->description = 'Мини самосвал EG110R производства IHI массой 16.1 т.';


        $catalog_base->photos =
            json_encode(
                [ 0=>["name"=>"Big Japan Car","src"=>"model1.jpg"]
                ]);

        $catalog_base->brand_id=9;
        $catalog_base->category_id=9;
        $catalog_base->comments_id=1;
        $catalog_base->save();

        $catalog_base = new \Model\General\TechOnline\CatalogBase();
        $catalog_base->model = 'EG70R';
        /* update metadata */
        $meta_data = new \Model\General\MetaData();
        $meta_data->alias = Mascame\Urlify::filter($catalog_base->model);
        $meta_data->title=$catalog_base->model;
        $meta_data->description=$catalog_base->model;
        $meta_data->keywords=$catalog_base->model;
        $meta_data->app_section = 'catalog';
        $meta_data->save();
        $catalog_base->metadata_id = $meta_data->id;
        /*end update metadata*/

        $catalog_base->description = 'Мини самосвал EG70R производства IHI массой 10.8 т.';


        $catalog_base->photos =
            json_encode(
                [ 0=>["name"=>"Big Japan Car","src"=>"model3.jpg"]
                ]);

        $catalog_base->brand_id=9;
        $catalog_base->category_id=9;
        $catalog_base->comments_id=1;
        $catalog_base->save();
	}

	public function down()
	{

	}

}
