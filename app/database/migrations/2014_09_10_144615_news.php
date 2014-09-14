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
            $table->string('logo')->nullable();

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
            $news = new \Model\General\News();
            $news->name = $faker->name;
                /* update metadata */
                $meta_data = new \Model\General\MetaData();
                $meta_data->title=$news->name;
                $meta_data->description=$news->name;
                $meta_data->keywords=$news->name;

                $meta_data->alias= Mascame\Urlify::filter($news->name);
                $meta_data->app_section = 'news';
                $meta_data->save();
                $news->metadata_id = $meta_data->id;
                /* end update metadata*/
            $news->logo = Faker\Provider\Image::imageUrl(650+$i, 420, 'transport');
            $news->text_preview = $faker->paragraph();
            $news->text =$faker->paragraph().$faker->paragraph().$faker->paragraph().$faker->paragraph();
            $news->comments_id = $i%100;
            $news->save();
        }
	}

	public function down()
	{
        Schema::dropIfExists('news');
	}

}
