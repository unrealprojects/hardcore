<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TechonlineCatalog extends Migration {

    /*** КАТАЛОГ ***/
	public function up()
	{
        /*** БАЗОВЫЙ КАТАЛОГ ***/
        Schema::create('catalog_base', function($table)
        {
            $table->increments('id');

            $table->string('model')->nullable();
            $table->text('description')->nullable();

            $table->text('photos')->nullable();

            $table->integer('params_set_id')->nullable();
            $table->integer('brand_id')->nullable();
        });

        for($i=1;$i<30;$i++){
            $catalog_base = new \Model\General\TechOnline\CatalogBase();

            $catalog_base->model = 'Test Drive Кран '.$i*11;

            $catalog_base->description =
                'Длинное описание Test Drive Крана '. $i*11 .
                'Длинное описание Test Drive Крана '. $i*11 .
                'Длинное описание Test Drive Крана '. $i*11 .
                'Длинное описание Test Drive Крана '. $i*11;

            $catalog_base->photoes =
                '{0:{name:"Big Japan Car",src:"bigcar.jpg"},
                  1:{name:"Big Japan Car",src:"bigcar.jpg"},
                  2:{name:"Big Japan Car",src:"bigcar.jpg"},
                  3:{name:"Big Japan Car",src:"bigcar.jpg"},
                  4:{name:"Big Japan Car",src:"bigcar.jpg"}}';

            $catalog_base->params_set_id=$i;
            $catalog_base->brand_id=$i;
        }

        /*** КАТАЛОГ ТЕХНИКИ***/
        Schema::create('catalog_tech', function($table)
        {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('rate')->nullable();

            $table->text('photos')->nullable();

            $table->integer('model_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('region_id')->nullable();

            $table->integer('status_id')->nullable();
            $table->integer('opacity_id')->nullable();

            $table->boolean('active')->default(false);

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        /*** КАТАЛОГ ЗАПЧАСТЕЙ***/
        Schema::create('catalog_parts', function($table)
        {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->text('description')->nullable();

            $table->strint('brand')->nullable();
            $table->string('price')->nullable();

            $table->text('photos')->nullable();

            $table->integer('category_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('region_id')->nullable();

            $table->integer('status_id')->nullable();
            $table->integer('opacity_id')->nullable();

            $table->boolean('active')->default(false);

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        /*** АДМИНИСТРАТОР ***/
        Schema::create('catalog_admin', function($table)
        {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->text('description')->nullable();

            $table->strint('logo')->nullable();
            $table->string('adress')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('skype')->nullable();
            $table->string('website')->nullable();

            $table->text('photos')->nullable();

            $table->integer('region_id')->nullable();

            $table->integer('status_id')->nullable();
            $table->integer('opacity_id')->nullable();

            $table->boolean('active')->default(false);

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        /*** БРЕНД ***/
        Schema::create('catalog_brand', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
        });

        /*** РЕГИОНЫ ***/
        Schema::create('catalog_region', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
        });

        /*** КАТЕГОРИИ ЗАПЧАСТЕЙ ***/
        Schema::create('catalog_parts_categories', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
        });

        /*** КАТЕГОРИИ ТЕХНИКИ ***/
        Schema::create('catalog_tech_categories', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
        });

        /*** СОСТОЯНИЕ ***/
        Schema::create('hardcore_catalog_opacity', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
        });

        /*** СТАТУСЫ ***/
        Schema::create('hardcore_catalog_statuses', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
        });

        /*** ПАРАМЕТРЫ ДЛЯ ТЕХНИКИ ***/
        Schema::create('hardcore_catalog_params', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();

            $table->integer('max_value')->nullable();
            $table->integer('min_value')->nullable();

            $table->string('dimension')->nullable();
        });

        /*** ПАРАМЕТРЫ ДЛЯ ТЕХНИКИ ***/
        Schema::create('hardcore_catalog_params_values', function($table)
        {
            $table->increments('id');

            $table->integer('model_id')->nullable();
            $table->integer('param_id')->nullable();

            $table->integer('value')->nullable();

        });

        /*** ОТНОШЕНИЕ ПАРАМЕТРОВ К КАТЕГОРИИ ТЕХНИКИ ***/
        Schema::create('hardcore_catalog_tech_categories_to_params', function($table)
        {
            $table->increments('id');

            $table->integer('category_id')->nullable();
            $table->integer('param_id')->nullable();
        });
	}

	public function down()
	{
        Schema::dropIfExists('catalog_base');
        Schema::dropIfExists('catalog_tech');
        Schema::dropIfExists('catalog_parts');

        Schema::dropIfExists('catalog_admin');

        Schema::dropIfExists('catalog_brand');
        Schema::dropIfExists('catalog_region');

        Schema::dropIfExists('catalog_parts_categories');
        Schema::dropIfExists('catalog_tech_categories');

        Schema::dropIfExists('hardcore_catalog_opacity');
        Schema::dropIfExists('hardcore_catalog_statuses');

        Schema::dropIfExists('hardcore_catalog_params');
        Schema::dropIfExists('hardcore_catalog_params_values');
        Schema::dropIfExists('hardcore_catalog_tech_categories_to_params');
	}
}
