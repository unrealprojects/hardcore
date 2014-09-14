<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardcoreCategories extends Migration {

	public function up()
	{
        /*** TAGS ***/
        Schema::dropIfExists('tags');
        Schema::dropIfExists('tags_to_items');
        Schema::create('tags', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable() ;
            $table->string('name')->nullable();

            $table->string('app_section')->nullable();
        });

        Schema::create('tags_to_items', function($table)
        {
            $table->increments('id');
            $table->integer('tag_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->string('app_section')->nullable();
        });

        /*** TAGS ***/
        $faker = Faker\Factory::create();
        for($i=0;$i<12;$i++){
            $tags = new \Model\General\Tags();
            $tags->name = $faker->word();
            $tags->alias = Mascame\Urlify::filter($tags->name);

            $tags->app_section = 'news';
            $tags->save();
        }
        for($i=0;$i<12;$i++){
            $tags = new \Model\General\Tags();
            $tags->name = $faker->word();
            $tags->alias = Mascame\Urlify::filter($tags->name);

            $tags->app_section = 'catalog';
            $tags->save();
        }

        /*** TAGS_TO_ITEMS ***/
        for($i=0;$i<12;$i++){
            for($j=0;$j<12;$i++){
                $tags_to_items = new \Model\General\TagsToItems();
                $tags_to_items->tag_id=$i;
                $tags_to_items->item_id=$j;
                $tags_to_items->app_section = 'news';
                $tags_to_items->save();
            }
        }
        for($i=0;$i<12;$i++){
            for($j=0;$j<12;$i++){
                $tags_to_items = new \Model\General\TagsToItems();
                $tags_to_items->tag_id=$i;
                $tags_to_items->item_id=$j;
                $tags_to_items->app_section = 'catalog';
                $tags_to_items->save();
            }
        }
	}

	public function down()
	{
        Schema::dropIfExists('tags');
	}
}
