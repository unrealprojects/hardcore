<?php
namespace UpfSeeds;
use UpfModels;
/*** Add Articles ***/
class ArticlesSeeder extends Seeder {
	public function run()
	{
        $faker = Faker\Factory::create();
        for($i=0;$i<500;$i++){
            $Articles = new \UpfModels\Articles();
            $Articles->name = $faker->name;
            /* update metadata */
            $meta_data = new \UpfModels\MetaData();
            $meta_data->title=$Articles->name;
            $meta_data->description=$Articles->name;
            $meta_data->keywords=$Articles->name;

            $meta_data->alias= Mascame\Urlify::filter($news->name);
            $meta_data->app_section = 'news';
            $meta_data->save();
            $news->metadata_id = $meta_data->id;
            /* end update metadata*/
            $Articles->logo = Faker\Provider\Image::imageUrl(650+$i, 420, 'transport');
            $Articles->text_preview = $faker->paragraph();
            $Articles->text =$faker->paragraph().$faker->paragraph().$faker->paragraph().$faker->paragraph();
            $Articles->comments_id = $i%100;

            $Articles->save();
        }
	}
}
