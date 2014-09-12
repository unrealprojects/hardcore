<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Metadata extends Migration {

    public function up()
    {
        Schema::dropIfExists('metadata');

        /*** Мета Данные ***/
        Schema::create('metadata', function($table)
        {
            $table->increments('id');

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('keywords')->nullable();


            $table->integer('app')->default(0);
            /*
             * 0 = frontend
             * 1 = backend
             * 2,3 ... n = other app
             */

            $table->integer('app_section')->nullable();
            $table->integer('page_id')->nullable();

            $table->string('alias')->nullable();
        });

        /*
         * /catalog/driers
         * app_section = catalog
         * alias = driers
         */
    }

    public function down()
    {
        Schema::dropIfExists('metadata');
    }

}
