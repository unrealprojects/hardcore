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
            $catalog_base = new \Model\Frontend\TechOnline\CatalogBase();

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
            $table->rate('description')->nullable();

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
	}

	public function down()
	{
        Schema::dropIfExists('catalog_base');
	}

}
