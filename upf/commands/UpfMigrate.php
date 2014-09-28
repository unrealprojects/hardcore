<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class UpfMigrate extends Command {

	protected $name = 'upf:migrate';
	protected $description = 'Migrate All Colons.';

	public function __construct()
	{
		parent::__construct();
	}

	public function fire()
	{
        /*** Get Migrations Files ***/
        $vendorDir = dirname(dirname(__FILE__));
        $baseDir = dirname($vendorDir);
        $Migrations = File::allFiles($baseDir.'/app/___Database/migrations');

        /*** Each File Execute ***/
        foreach($Migrations as $Migration){
            $FileName = '\UpfMigrations\\'.str_replace('.php','',$Migration->getFilename());
            ${$FileName} = new $FileName;

            ${$FileName}->down();
            ${$FileName}->up();
        }

        /*** Get Seeds Files ***/
        $vendorDir = dirname(dirname(__FILE__));
        $baseDir = dirname($vendorDir);
        $Seeds = File::allFiles($baseDir.'/app/___Database/seeds');

        /*** Each File Execute ***/
        foreach($Seeds as $Seeder){
            $FileName = '\UpfSeeds\\'.str_replace('.php','',$Seeder->getFilename());
            ${$FileName} = new $FileName;

            ${$FileName}->run();
        }
	}
}
