<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TechonlineCatalog extends Migration {

    /*** КАТАЛОГ ***/
	public function up()
	{

        Schema::dropIfExists('catalog_base');
        Schema::dropIfExists('catalog_tech');
        Schema::dropIfExists('catalog_parts');

        Schema::dropIfExists('catalog_admin');

        Schema::dropIfExists('catalog_brand');
        Schema::dropIfExists('catalog_region');

        Schema::dropIfExists('catalog_parts_categories');
        Schema::dropIfExists('catalog_tech_categories');

        Schema::dropIfExists('hardcore_catalog_opacity');
        Schema::dropIfExists('hardcore_catalog_statuses');

        Schema::dropIfExists('hardcore_catalog_params');
        Schema::dropIfExists('hardcore_catalog_params_values');
        Schema::dropIfExists('hardcore_catalog_tech_categories_to_params');

        /*** БАЗОВЫЙ КАТАЛОГ ***/
        Schema::create('catalog_base', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable();

            $table->string('model')->nullable();
            $table->string('logo')->nullable();

            $table->text('description')->nullable();

            $table->text('photos')->nullable();

            $table->integer('params_set_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
        });

        for($i=1;$i<30;$i++){
            $catalog_base = new \Model\General\TechOnline\CatalogBase();

            $catalog_base->model = 'Test Drive Кран '.$i*11;
            $catalog_base->alias =Mascame\Urlify::filter($catalog_base->model);
            $catalog_base->logo  = 'logo.jpg';

            $catalog_base->description =
                'Длинное описание Test Drive Крана '. $i*11 .
                'Длинное описание Test Drive Крана '. $i*11 .
                'Длинное описание Test Drive Крана '. $i*11 .
                'Длинное описание Test Drive Крана '. $i*11;

            $catalog_base->photos =
                '{"0":{"name":"Big Japan Car","src":"bigcar.jpg"},"1":{"name":"Big Japan Car","src":"bigcar.jpg"},"2":{"name":"Big Japan Car","src":"bigcar.jpg"},"3":{"name":"Big Japan Car","src":"bigcar.jpg"}}';


            $catalog_base->params_set_id=$i;
            $catalog_base->brand_id=$i;
            $catalog_base->category_id=$i;
            $catalog_base->save();
        }

        /*** КАТАЛОГ ТЕХНИКИ***/
        Schema::create('catalog_tech', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable();

            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();
            $table->string('rate')->nullable();

            $table->text('photos')->nullable();

            $table->integer('model_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('region_id')->nullable();

            $table->integer('status_id')->nullable();
            $table->integer('opacity_id')->nullable();

            $table->boolean('active')->default(false);

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        for($i=1;$i<30;$i++){
            $catalog_base = new \Model\General\TechOnline\CatalogTech();

            $catalog_base->name = 'Сдам в аренду кран №'.$i;
            $catalog_base->rate = $i*98 . ' руб/ч';
            $catalog_base->alias = Mascame\Urlify::filter($catalog_base->name);
            $catalog_base->logo  = 'logo.jpg';

            $catalog_base->description =
                'Длинное описание Test Drive Крана '. $i*11 .
                'Длинное описание Test Drive Крана '. $i*11 .
                'Длинное описание Test Drive Крана '. $i*11 .
                'Длинное описание Test Drive Крана '. $i*11;

            $catalog_base->photos =
                '{0:{name:"Big Japan Car",src:"bigcar.jpg"},
                  1:{name:"Big Japan Car",src:"bigcar.jpg"},
                  2:{name:"Big Japan Car",src:"bigcar.jpg"},
                  3:{name:"Big Japan Car",src:"bigcar.jpg"},
                  4:{name:"Big Japan Car",src:"bigcar.jpg"}}';

            $catalog_base->model_id=$i;
            $catalog_base->category_id=$i;
            $catalog_base->admin_id=$i;
            $catalog_base->region_id=$i;

            $catalog_base->status_id=2;
            $catalog_base->opacity_id=2;
            $catalog_base->active=true;
            $catalog_base->save();
        }


        /*** КАТАЛОГ ЗАПЧАСТЕЙ***/
        Schema::create('catalog_parts', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable();

            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();

            $table->string('brand')->nullable();
            $table->string('price')->nullable();

            $table->text('photos')->nullable();

            $table->integer('category_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('region_id')->nullable();

            $table->integer('status_id')->nullable();
            $table->integer('opacity_id')->nullable();

            $table->boolean('active')->default(false);

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });

        for($i=1;$i<30;$i++){
            $catalog_base = new \Model\General\TechOnline\CatalogParts();

            $catalog_base->name = 'Запчасть для крана '.$i;
            $catalog_base->price = $i*98 . ' руб.';

            $catalog_base->alias = Mascame\Urlify::filter($catalog_base->name);
            $catalog_base->logo  = 'logo.jpg';

            $catalog_base->description =
                'Длинное описание Test Drive запчасти для Крана '. $i*11 .
                'Длинное описание Test Drive запчасти для Крана '. $i*11 .
                'Длинное описание Test Drive запчасти для Крана '. $i*11 .
                'Длинное описание Test Drive запчасти для Крана '. $i*11;

            $catalog_base->photos =
                '{0:{name:"Big Japan Car",src:"bigcar.jpg"},
                  1:{name:"Big Japan Car",src:"bigcar.jpg"},
                  2:{name:"Big Japan Car",src:"bigcar.jpg"},
                  3:{name:"Big Japan Car",src:"bigcar.jpg"},
                  4:{name:"Big Japan Car",src:"bigcar.jpg"}}';

            $catalog_base->category_id=$i;
            $catalog_base->admin_id=$i;
            $catalog_base->region_id=$i;

            $catalog_base->status_id=2;
            $catalog_base->opacity_id=2;
            $catalog_base->active=true;
            $catalog_base->save();
        }

        /*** АДМИНИСТРАТОР ***/
        Schema::create('catalog_admin', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable();

            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->text('description')->nullable();

            $table->string('adress')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('skype')->nullable();
            $table->string('website')->nullable();

            $table->text('photos')->nullable();

            $table->integer('region_id')->nullable();

            $table->boolean('active')->default(false);

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });


        for($i=1;$i<30;$i++){
            $catalog_base = new \Model\General\TechOnline\CatalogAdmin();

            $catalog_base->name = 'Транспортная кампания  №'.$i;

            $catalog_base->alias = Mascame\Urlify::filter($catalog_base->name);
            $catalog_base->logo  = 'logo.jpg';

            $catalog_base->description =
                'Длинное описание Транспортной кампании '. $i*11 .
                'Длинное описание Транспортной кампании '. $i*11 .
                'Длинное описание Транспортной кампании '. $i*11 .
                'Длинное описание Транспортной кампании '. $i*11 ;

            $catalog_base->adress = 'г. Москва,пр. Ленина д. 31, оф. 3';
            $catalog_base->phone = '7900'. $i*11 . $i*23 . $i*11 . $i*23;
            $catalog_base->skype = 'skypecompany'. $i;
            $catalog_base->email = 'company'. $i . '@gmail.com';
            $catalog_base->website = 'http://company'. $i . '.com';


            $catalog_base->photos =
                '{0:{name:"Big Japan Car",src:"bigcar.jpg"},
                  1:{name:"Big Japan Car",src:"bigcar.jpg"},
                  2:{name:"Big Japan Car",src:"bigcar.jpg"},
                  3:{name:"Big Japan Car",src:"bigcar.jpg"},
                  4:{name:"Big Japan Car",src:"bigcar.jpg"}}';

            $catalog_base->region_id=$i;

            $catalog_base->active=true;
            $catalog_base->save();
        }

        /*** БРЕНД ***/
        Schema::create('catalog_brand', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable();
            $table->string('name')->nullable();
        });

        $brands = [
                'Mercedes-Benz',
                'КамАЗ',
                'КрАЗ',
                'MAN',
                'Foton',
                'Carmix',
                'МТЗ',
                'Putzmeister',
                'Brinkmann',
                'Zettelmeyer',
                'УРБ',
                'Vicon'
            ];

        foreach($brands as $brand){
            $catalog_brand = new \Model\General\TechOnline\CatalogBrand();
            $catalog_brand->name=$brand;
            $catalog_brand->alias = Mascame\Urlify::filter($catalog_brand->name);
            $catalog_brand->save();
        }

        /*** РЕГИОНЫ ***/
        Schema::create('catalog_region', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable();
            $table->string('name')->nullable();
        });

        $regions = [
            'Москва',
            'Московская область',
            'Санкт-Петербург',
            'Волгоград',
            'Екатеринбург',
            'Казань',
            'Краснодар',
            'Нижний Новгород',
            'Пермь',
            'Ростов-на-Дону',
            'Самара',
            'Уфа',
            'Челябинск',
            'Адыгея',
            'Архангельская обл.',
            'Астраханская обл',
            'Башкортостан',
            'Белгородская обл.',
            'Брянская обл. обл.',
            'Владимирская обл.',
            'Волгоградская обл.',
            'Вологодская обл.',
            'Владимирская обл.',
            'Воронежская обл.',
            'Дагестан',
            'Ивановская обл.',
            'Ингушетия',
            'Кабардино-Балкария',
            'Калининградская обл.',
            'Калмыкия Калужская обл.',
            'Карачаево-Черкесия',
            'Карелия',
            'Кировская обл.',
            'Коми',
            'Костромская обл.',
            'Краснодарский край',
            'Крым',
            'Курганская обл.',
            'Курская обл.',
            'Ленинградская обл.',
            'Липецкая обл.',
            'Марий Эл',
            'Мордовия',
            'Московская обл.',
            'Мурманская обл.',
            'Ненецкий АО',
            'Нижегородская обл.',
            'Новгородская обл.',
            'Оренбургская обл.',
            'Орловская обл.',
            'Пензенская обл.',
            'Пермский край',
            'Псковская обл.',
            'Ростовская обл.',
            'Рязанская обл.',
            'Самарская обл.',
            'Саратовская обл.',
            'Свердловская обл.',
            'Северная Осетия',
            'Смоленская обл.',
            'Ставропольский край',
            'Тамбовская обл',
            'Татарстан',
            'Тверская обл.',
            'Тульская обл.',
            'Удмуртия',
            'Ульяновская обл.',
            'Челябинская обл.',
            'Чеченская республика',
            'Чувашия',
            'Ярославская обл.'
        ];

        foreach($regions as $region){
            $catalog_region = new \Model\General\TechOnline\CatalogRegion();
            $catalog_region->name=$region;
            $catalog_region->alias = Mascame\Urlify::filter($catalog_region->name);
            $catalog_region->save();
        }

        /*** КАТЕГОРИИ ЗАПЧАСТЕЙ ***/
        Schema::create('catalog_parts_categories', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable();
            $table->string('name')->nullable();
        });

        /*** КАТЕГОРИИ ТЕХНИКИ ***/
        Schema::create('catalog_tech_categories', function($table)
        {
            $table->increments('id');
            $table->string('alias')->nullable();
            $table->string('name')->nullable();
        });

        $categories = [
            'Фронтальные погрузчики',
            'Дорожные катки',
            'Автогрейдеры',
            'Бульдозеры',
            'Тягачи'
        ];

        foreach($categories as $category){
            $catalog_category = new \Model\General\TechOnline\CatalogTechCategories();
            $catalog_category->name=$category;
            $catalog_category->alias = Mascame\Urlify::filter($catalog_category->name);
            $catalog_category->save();
        }

        /*** СОСТОЯНИЕ ***/
        Schema::create('catalog_opacity', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
        });

        $opacity = [
            'Плохое',
            'Среднее',
            'Хорошее',
            'Новый'
        ];

        foreach($opacity as $opacity_elem){
            $catalog_opacity = new \Model\General\TechOnline\CatalogOpacity();
            $catalog_opacity->name=$opacity_elem;
            $catalog_opacity->save();
        }

        /*** СТАТУСЫ ***/
        Schema::create('catalog_statuses', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();
        });

        $statuses = [
            'Занято',
            'Свободно'
        ];

        foreach($statuses as $status){
            $catalog_opacity = new \Model\General\TechOnline\CatalogStatuses();
            $catalog_opacity->name=$status;
            $catalog_opacity->save();
        }

        /*** ПАРАМЕТРЫ ДЛЯ ТЕХНИКИ ***/
        Schema::create('catalog_params', function($table)
        {
            $table->increments('id');
            $table->string('name')->nullable();

            $table->integer('max_value')->nullable();
            $table->integer('min_value')->nullable();

            $table->string('dimension')->nullable();
        });

        /*** ПАРАМЕТРЫ ДЛЯ ТЕХНИКИ ***/
        Schema::create('catalog_params_values', function($table)
        {
            $table->increments('id');

            $table->integer('model_id')->nullable();
            $table->integer('param_id')->nullable();

            $table->integer('value')->nullable();

        });



        /*** ОТНОШЕНИЕ ПАРАМЕТРОВ К КАТЕГОРИИ ТЕХНИКИ ***/
        Schema::create('catalog_tech_categories_to_params', function($table)
        {
            $table->increments('id');

            $table->integer('category_id')->nullable();
            $table->integer('param_id')->nullable();
        });
	}

	public function down()
	{
        Schema::dropIfExists('catalog_base');
        Schema::dropIfExists('catalog_tech');
        Schema::dropIfExists('catalog_parts');

        Schema::dropIfExists('catalog_admin');

        Schema::dropIfExists('catalog_brand');
        Schema::dropIfExists('catalog_region');

        Schema::dropIfExists('catalog_parts_categories');
        Schema::dropIfExists('catalog_tech_categories');

        Schema::dropIfExists('catalog_opacity');
        Schema::dropIfExists('catalog_statuses');

        Schema::dropIfExists('catalog_params');
        Schema::dropIfExists('catalog_params_values');
        Schema::dropIfExists('catalog_tech_categories_to_params');
	}
}
