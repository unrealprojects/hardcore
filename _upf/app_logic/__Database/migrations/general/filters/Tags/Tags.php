<?php

namespace UpfMigrations;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
/*** Tags ***/

class Tags extends Migration {
	public function up()
	{
        \Schema::create('filter_tags', function($table)
        {
            /*** Index ***/
            $table->increments('id');
            $table->unique('alias');
            $table->string('alias')->nullable();

            /*** Content ***/
            $table->string('title')->nullable();
            $table->string('logotype')->nullable();

            /*** Relations***/
            $table->string('section')->nullable();

            /*** Statuses ***/
            $table->boolean('status')->dafault(\Config::get('models/Fields.status.default'));
            $table->boolean('privileges')->dafault(\Config::get('models/Fields.privileges.default'));
            $table->timestamps();
        });
	}

	public function down()
	{
        \Schema::dropIfExists('filter_tags');
	}
}

