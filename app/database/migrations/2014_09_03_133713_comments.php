<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Comments extends Migration {
	public function up()
	{
        Schema::dropIfExists('comments');
        Schema::dropIfExists('comments_voted');
        /*** КОММЕНТАРИИ ***/
        Schema::create('comments', function($table)
        {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->text('comment')->nullable();

            $table->integer('level')->nullable();
            $table->integer('parent_id')->nullable();

            $table->integer('list_id')->nullable();
            $table->integer('rating')->default(0);

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });


        $faker = Faker\Factory::create();
        for($i=0;$i<500;$i++){
            $comments = new \Model\General\Comments();
            $comments->name = $faker->name;
            $comments->comment = $faker->paragraph();
            $comments->parent_id = 0;
            $comments->list_id = $i%100;
            $comments->save();
        }

        Schema::create('comments_voted', function($table)
        {
            $table->increments('id');
            $table->string('ip')->nullable();
            $table->integer('comment_id')->nullable();

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('comments');
        Schema::dropIfExists('comments_voted');
	}

}
