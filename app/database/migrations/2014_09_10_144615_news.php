<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*** APP_SECTION::NEWS(Новости)***/

class News extends Migration {


	public function up()
	{
        Schema::dropIfExists('news');
        Schema::create('news', function($table)
        {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('photo')->nullable();

            $table->string('text_preview')->nullable();
            $table->text('text')->nullable();

            $table->integer('category_id')->nullable();
            $table->integer('comments_id')->nullable();
            $table->integer('rating')->default(0);

            $table->integer('active')->default(0);
            $table->integer('metadata_id')->default(0);

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        $faker = Faker\Factory::create();
        for($i=0;$i<500;$i++){
            $comments = new \Model\General\News();
            $comments->name = $faker->name;
            $comments->text_preview = $faker->paragraph();
            $comments->text = $faker->text();
            $comments->comments_id = $i%100;
            $comments->save();
        }
	}

	public function down()
	{
        Schema::dropIfExists('news');
	}

}
