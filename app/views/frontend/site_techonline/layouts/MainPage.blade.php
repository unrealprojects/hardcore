@extends('frontend.site_techonline.content')

@section('main')
<section id="Page-Slider">
    <div class="Slider-Inner">
        <img id="Truck" src="/img/techonline/belaz.png" alt=""/>
        <div id="Slider-Links">
            <a class="Button _Rounded" href="#">Арендовать стройтехнику</a>
            <a class="Button _Rounded" href="#">Разместить стройтехнику</a></div>
    </div>
</section>

<!-- ФИЛЬТР -->

<section class="Node Filter">

    <h3 class="Heading Primary">Поиск стройтехники</h3>

    <dl class="Tabs">
        <dt class="Active Tab-Regions"><span>Выбор региона</span></dt>
        <dd class="Active Tab-Regions">
            <div>
                <div class="Control-Group">
                    <input class="Autocomplete Autocomplete-Regions" placeholder="Поиск региона ..."/>
                </div>
                <!-- ФИЛЬТР::ТАБ 1::РЕГИОНЫ-->
                <ul class="Filter Accordion ">
                    @foreach($content['regions'] as $region)
                        <li class="Filter-Subheader Accordion-Subheader">
                            @if($region['subRegions'])
                                <div class="Accordion-Switch"><span>&or;</span></div>
                            @endif
                            <a href="/catalog/?region={{$region['alias']}}" alias="{{$region['alias']}}">{{$region['name']}}</a>
                        </li>

                        @if($region['subRegions'])
                        <li class="Filter-Subcategory Accordion-Subcategory">
                            <ul>
                                @foreach($region['subRegions'] as $subRegions)
                                    <li>
                                        <a href="/catalog/?region={{$subRegions['alias']}}" alias="{{$subRegions['alias']}}">{{$subRegions['name']}}</a>
                                        <!-- Вложенные города -->

                                        @if(!empty($subRegions['cities']))
                                        <div class="Filter-Cities">
                                            <a class="All-Cities" href="/catalog/?region={{$subRegions['alias']}}" alias="{{$subRegions['alias']}}">Все города</a>
                                            <a class="Back" href="/">Вернуться к выбору региона</a>
                                            <ul>
                                                @foreach($subRegions['cities'] as $city)
                                                <li><a href="/catalog/?region={{$city['alias']}}" alias="{{$city['alias']}}">{{$city['name']}}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>



                                @endforeach
                            </ul>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </dd>

        <dt class="Tab-Categories"><span>Выбор категории</span></dt>
        <dd class="Tab-Categories">
            <div>
                <div class="Control-Group">
                    <input class="Autocomplete Autocomplete-Categories" placeholder="Поиск техники ..."/>
                </div>
                <ul class="Filter Accordion">
                    @foreach($content['categories_with_popular'] as $category)
                    <li class="Filter-Subheader Accordion-Subheader">
                        @if($category['subCategories'])
                        <div class="Accordion-Switch"><span>&or;</span></div>
                        @endif
                        <a href="/catalog/?category={{$category['alias']}}" alias="{{$category['alias']}}">{{$category['name']}}</a>
                    </li>

                    @if($category['subCategories'])
                    <li class="Filter-Subcategory Accordion-Subcategory">
                        <ul>
                            @foreach($category['subCategories'] as $subCategory)
                            <li><a href="/catalog/?category={{$subCategory['alias']}}" alias="{{$category['alias']}}">{{$subCategory['name']}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </dd>

        <dt class="Wide Tab-Params"><span>Дополнительные параметры</span></dt>
        <dd class="Tab-Params">
            <div>
                <form class="Form-Vertical" action="">
                    <!-- ФИЛЬТР::ТАБ 3::ПАРАМЕТРЫ (ЗАВЕРСТАТЬ СЛАЙДЕР JQUERY - ВЫВЕДУ ПОЗЖЕ) -->
                    <div class="Control-Group">
                        <label for="Slider-Range-1">Цена: <span id="Slider-Range-Value-1"></span></label>

                        <div class="Slider-Range" id="Slider-Range-1"></div>
                    </div>
                    <div class="Control-Group">
                        <label for="Slider-Range-2">Свойство 2: <span id="Slider-Range-Value-2"></span></label>

                        <div class="Slider-Range" id="Slider-Range-2"></div>
                    </div>

                </form>
            </div>
        </dd>
    </dl>
    <div class="Control-Group Offset">
        <button class="Button Search">Выполнить поиск</button>
    </div>
</section>


<!-- КАТАЛОГ СТРОЙТЕХНИКИ::КАТЕГОРИИ C КАРТИНКАМИ-->
<section class="Node Row">

    <h3 class="Heading Primary">Каталог стройтехники</h3>

    <ul class="Row Merge List-Categories Icons">
        @foreach($content['categories'] as $category)
            <li class="Grid XS-6 SM-3"><img src="{{$category['logo']}}"><a href="/catalog/?category={{$category['alias']}}" alt="{{$category['name']}}">{{$category['name']}}</a></li>
        @endforeach
    </ul>

</section>



<!-- АРЕНДА СТРОЙТЕХНИКИ::КАТЕГОРИИ -->
<section class="Node Row Merge">

    <div class="Grid XS-7">

        <h3 class="Heading Underlined">Аренда стройтехники</h3>

        <ul class="List-Categories Row Merge">
            @foreach($content['categories'] as $category)
            <li class="Grid XS-6"><a href="/rent/?category={{$category['alias']}}" alt="{{$category['name']}}">{{$category['name']}}</a></li>
            @endforeach
        </ul>

    </div>

    <!-- АРЕНДА СТРОЙТЕХНИКИ::БРЕНДЫ -->
    <div class="Grid XS-5">

        <h3 class="Heading Underlined">Производители</h3>

        <ul class="List-Categories Row Merge">
            @foreach($content['brands'] as $brand)
            <li class="Row Merge Grid XS-6">
                <a href="/rent/?brand=$brand['alias']" alt="{{$brand['name']}}">
                    {{$brand['name']}}
                </a>
            </li>
            @endforeach
        </ul>

    </div>

</section>


<!-- АРЕНДОДАТЕЛИ::СПИСОК -->
<section class="Node Renters">

    <h3 class="Heading Primary">Лучшие арендодатели</h3>

    <ul class="List Snippets Row Split">
        @foreach($content['sellers'] as $seller)
        <li class="List-Item Grid XS-6 LR-4">
            <header>
                <h5 class="Title">
                    <a href="/sellers/{{$seller['metadata']['alias']}}" alt=" {{$seller['name']}}">{{$seller['name']}}</a>
                    <span class="Seller-Location">
                        {{$seller['region']['name']}}
                    </span>
                </h5>


                <ul class="Vote">
                    <li><a class="Vote-Down" href="#"></a></li>
                    <li><span>{{$seller['rating']}}</span></li>
                    <li><a class="Vote-Up" href="#"></a></li>
                </ul>
            </header>
            <div class="Description">
                {{$seller['description']}}
            </div>
        </li>
        @endforeach
    </ul>

</section>

<!-- НОВОСТИ::СПИСОК -->
<section class="Node News">

    <h3 class="Heading Primary">Новости</h3>

    <ul class="List Snippets Row Split">
        @foreach($content['news'] as $new)
        <li class="List-Item Grid XS-6">
            <header>
                <h5 class="Title">
                    <a href="/news/{{$new['metadata']['alias']}}" alt=" {{$seller['name']}}">{{$new['name']}}</a>
                    <span class="News-Date">
                        {{$new['updated_at']}}
                    </span>
                </h5>


                <ul class="Vote">
                    <li><a class="Vote-Down" href="#"></a></li>
                    <li><span>{{$seller['rating']}}</span></li>
                    <li><a class="Vote-Up" href="#"></a></li>
                </ul>
            </header>

            <img src="{{$new['logo']}}" alt="{{$new['name']}}">
            <article class="Description">
                <div>{{$new['text_preview']}}</div>
            </article>
        </li>
        @endforeach
    </ul>

</section>

@endsection

@section('scripts')
    @parent
    <script src="/js/frontend/Accordion.js" type="text/javascript"></script>
    <script src="/js/frontend/techonline/MainPage.js" type="text/javascript"></script>
    <script>
        searchArray = {};
        /* Формирование слайдера */
        $("#Slider-Range-1").slider({
             range: true,
             min: 100,
             max: 50000,
             values: [ 100, 50000 ],
            slide: function( event, ui ) {
                $("#Slider-Range-Value-1").text(ui.values[ 0 ] + "руб. - " + ui.values[ 1 ] +"руб.");
                searchArray['price-min']=ui.values[ 0 ];
                searchArray['price-max']= ui.values[ 1 ];
            }
        });
        $("#Slider-Range-Value-1").text( "$" + $( "#Slider-Range-1").slider( "values", 0 ) +
            " - руб." + $( "#Slider-Range-1" ).slider( "values", 1 ) );




        /* Autocomplite */
        var regions = [
            @foreach($content['regions_list'] as $region)
                {key:"{{$region['alias']}}",label:"{{$region['name']}}"},
            @endforeach
        ];
        $( ".Autocomplete-Regions" ).autocomplete({
            source: regions,
            select: function (event, ui) {
                /* Запись параметров */
                searchArray['region']=ui.item.key;
                delete searchArray['region_type'];

                /* Смена таба */
                $('.Tab-Regions').removeClass('Active');
                $('.Tab-Categories').addClass('Active');
            }
        });


        var categories = [
            @foreach($content['categories_list'] as $category)
               {key:"{{$category['alias']}}",label:"{{$category['name']}}"},
            @endforeach
        ];

        $( ".Autocomplete-Categories" ).autocomplete({
            source: categories,
            select: function (event, ui) {
                /* Запись параметров */
                searchArray['category']=ui.item.key;

                /* todo:: ajax запрос на смену таба */
                /* Смена таба */
                $('.Tab-Categories').removeClass('Active');
                $('.Tab-Params').addClass('Active');
            }
        });

        /* Некликабельность ссылок */
        $(document).on('click','.Filter a',function(){
            return false;
        });

        /* Таб :: Региионы */
        $('dd.Tab-Regions .Filter-Subcategory li>a').click(function(){
            /* Переход на города, если они есть */
            if($('.Filter-Cities',$(this).parent()).length){
                var cities=$('.Filter-Cities',$(this).parent());
                $('dd.Tab-Regions .Filter.Accordion').hide().after($(cities).clone());
                /* Запись параметров региона */
                searchArray['region']=$(this).attr('alias');
                delete searchArray['region_type'];

                /* Возврат на категории */
                $('.Tabs .Back').on('click',function(){
                    $('dd>div>.Filter-Cities').remove();
                    $('.Tab-Regions .Filter.Accordion').show();
                    return false;
                });
                /* Если нет городов, выбор категории */
            }else{

                /* Запись параметров */
                searchArray['region']=$(this).attr('alias');
                delete searchArray['region_type'];

                /* Смена таба */
                $('.Tab-Regions').removeClass('Active');
                $('.Tab-Categories').addClass('Active');
            }
            return false;
        });

        /* Выбор города */
        $(document).on('click','.Filter-Cities a',function(){
            searchArray['region']=$(this).attr('alias');
            delete searchArray['region_type'];

            /* Смена таба */
            $('.Tab-Regions').removeClass('Active');
            $('.Tab-Categories').addClass('Active');
            return false;
        });

        /* Выбор типа категории (популярные, области...)*/
        $('dd.Tab-Regions .Filter-Subheader a').click(function(){
            /* Запись параметров */
            searchArray['region_type']=$(this).attr('alias');
            delete searchArray['region'];

            /* Смена таба */
            $('.Tab-Regions').removeClass('Active');
            $('.Tab-Categories').addClass('Active');
            return false;
        });

        /* Таб :: Категории */

        $('dd.Tab-Categories a').click(function(){
            /* Запись параметров */
            searchArray['category']=$(this).attr('alias');

            /* todo:: ajax запрос на смену таба */

            /* Смена таба */
            $('.Tab-Categories').removeClass('Active');
            $('.Tab-Params').addClass('Active');
            return false;
        });

        /* Поиск */
        $('.Search').click(function(){
            searchString='?';
            $.each(searchArray,function(key,value){
                searchString+=key+'='+value+'&';
            });
            location.href='rent'+searchString;
            //console.log(searchString);
        });
 </script>
@endsection