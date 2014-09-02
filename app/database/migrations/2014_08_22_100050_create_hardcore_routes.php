<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHardcoreRoutes extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
       DB::raw('
        SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
        SET time_zone = "+00:00";


        /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
        /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
        /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
        /*!40101 SET NAMES utf8 */;

        --
        -- База данных: `hardcore`
        --

        -- --------------------------------------------------------

        --
        -- Структура таблицы `hardcore_routes`
        --

        CREATE TABLE IF NOT EXISTS `hardcore_routes` (
        `id` int(11) NOT NULL,
          `path` varchar(255) NOT NULL,
          `controller` varchar(255) NOT NULL,
          `function` varchar(255) NOT NULL
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

        --
        -- Дамп данных таблицы `hardcore_routes`
        --

        INSERT INTO `hardcore_routes` (`id`, `path`, `controller`, `function`) VALUES
        (1, "/", "MainPageController", "showWelcome"),
        (2, "/path1", "MainPageController", "showWelcome1");

        --
        -- Indexes for dumped tables
        --

        --
        -- Indexes for table `hardcore_routes`
        --
        ALTER TABLE `hardcore_routes`
         ADD PRIMARY KEY (`id`);

        --
        -- AUTO_INCREMENT for dumped tables
        --

        --
        -- AUTO_INCREMENT for table `hardcore_routes`
        --
        ALTER TABLE `hardcore_routes`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
        /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
        /*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
        /*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
       ');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
