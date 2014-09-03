<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardcoreRoutes extends Migration {

	public function up()
	{
        Schema::create('routes', function($table)
        {
            $table->increments('id');
            $table->string('path');
            $table->string('controller');
            $table->string('function');
        });
	}

	public function down()
	{
        Schema::dropIfExists('routes');
	}
}
