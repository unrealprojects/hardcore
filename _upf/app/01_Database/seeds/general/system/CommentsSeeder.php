<?php
namespace UpfSeeds;
use UpfModels;
/*** Add Comments ***/
class CommentsSeeder extends \Seeder {
	public function run()
	{
        $Faker = Faker\Factory::create();

        for($i=0;$i<500;$i++){
            $Comments = new \UpfModels\Comments();

            /*** Content ***/
            $Comments->name = $Faker->name;
            $Comments->comment = $Faker->paragraph();

            /*** Relations ***/
            $Comments->parent_id = 0;
            $Comments->list_id = $i%100;

            $Comments->save();
        }
	}
}
