<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TechonlineCatalog extends Migration {

    /*** КАТАЛОГ ***/
	public function up()
	{

        /*** БАЗОВЫЙ КАТАЛОГ***/
        Schema::create('hardcore_catalog_base', function($table)
        {
            $table->increments('id');

            $table->string('model')->nullable();
            $table->text('description')->nullable();

            $table->text('photos')->nullable();

            $table->integer('params_set_id')->nullable();
            $table->integer('brand_id')->nullable();
        });
	}

	public function down()
	{
        Schema::dropIfExists('hardcore_catalog_base');
	}

}
