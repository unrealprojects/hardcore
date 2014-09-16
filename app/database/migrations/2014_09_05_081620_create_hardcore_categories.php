<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

    class CreateHardcoreCategories extends Migration {

	public function up()
	{
        /*** ТЕХНИКИ ***/
        Schema::dropIfExists('categories');
        Schema::create('categories', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();

            $table->string('parent_id')->nullable();
            $table->string('app_section')->nullable();

            $table->boolean('popular')->dafault(false);
            $table->boolean('active')->dafault(false);
        });
	}

	public function down()
	{
        Schema::dropIfExists('categories');
	}
}
