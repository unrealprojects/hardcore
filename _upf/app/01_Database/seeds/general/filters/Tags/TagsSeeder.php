<?php
namespace UpfSeeds;
/*** Add Tags ***/
class TagsSeeder extends \Seeder {
	public function run()
	{
        $Faker = \Faker\Factory::create();

        for($i=0;$i<30;$i++){
            $Tags = new \UpfModels\Tags();

            /*** Index ***/
            $Tags->alias = \Mascame\Urlify::filter($Tags->name);

            /*** Content ***/
            $Tags->title = $Faker->word();

            /*** Relations ***/
            if($i<15){
                // For Articles
                $Tags->section = 'articles';
            }elseif($i<30){
                // For Pages
                $Tags->section = 'pages';
            }
            $Tags->save();
        }
	}
}
