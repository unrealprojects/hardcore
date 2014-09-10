<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class News extends Migration {

	public function up()
	{
        Schema::dropIfExists('news');
        Schema::dropIfExists('news_voted');
        Schema::dropIfExists('news_categories');
        Schema::dropIfExists('news_tags');
        Schema::dropIfExists('news_to_tags');
        /*** КОММЕНТАРИИ ***/
        Schema::create('news', function($table)
        {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('photo')->nullable();

            $table->string('text_preview')->nullable();
            $table->text('text')->nullable();

            $table->integer('level')->nullable();
            $table->integer('parent_id')->nullable();

            $table->integer('comments_id')->nullable();
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
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::dropIfExists('news');
        Schema::dropIfExists('news_voted');
        Schema::dropIfExists('news_categories');
        Schema::dropIfExists('news_tags');
        Schema::dropIfExists('news_to_tags');
	}

}
