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
	}

	public function down()
	{
        Schema::dropIfExists('catalog_base');
	}

}
