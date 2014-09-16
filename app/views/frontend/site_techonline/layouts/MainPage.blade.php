@extends('frontend.site_techonline.content')

@section('main')
<section class="Page-Slider">
    <div class="Slider-Inner">
        <img class="Truck" src="/img/techonline/belaz.png" alt=""/>
        <ul class="Slider-Links">
            <li>
                <a href="#">Арендовать стройтехнику</a>
            </li>
            <li>
                <a href="#">Разместить стройтехнику</a>
            </li>
        </ul>
    </div>
</section>

<div class="Node Row Category-List">

    <!-- КАТАЛОГ СТРОЙТЕХНИКИ::КАТЕГОРИИ C КАРТИНКАМИ-->
    <h3 class="Section-Header">Каталог стройтехники</h3>
    <ul class="Row Merge List-Categories Icons">
        @foreach($content['categories'] as $category)
            <li class="Three"><img src="{{$category['logo']}}"><a href="/catalog/?category={{$category['alias']}}" alt="{{$category['name']}}">{{$category['name']}}</a></li>
        @endforeach
    </ul>

</div>

<div class="Node Row Split Rent-List">

    <!-- АРЕНДА СТРОЙТЕХНИКИ::КАТЕГОРИИ -->
    <div class="Seven">
        <h4 class="Header-Column">Аренда стройтехники</h4>
        <ul class="List-Categories Row Merge">
            @foreach($content['categories'] as $category)
            <li class="Six""><a href="/rent/?category={{$category['alias']}}" alt="{{$category['name']}}">{{$category['name']}}</a></li>
            @endforeach
        </ul>
    </div>

    <!-- АРЕНДА СТРОЙТЕХНИКИ::БРЕНДЫ -->
    <div class="Five">
        <h4 class="Header-Column">Производители</h4>
        <ul class="List-Categories Row Merge">
            @foreach($content['brands'] as $brand)
            <li class="Row Merge Six">
                <a href="/rent/?brand=$brand['alias']" alt="{{$brand['name']}}">
                    {{$brand['name']}}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

</div>
<!-- ФИЛЬТР -->

<div class="Node Tabs Filter">

    <dl class="Tabs">
        <dt class="Active">Выбор региона</dt>
        <dd class="Active">
            <div>
                <!-- ФИЛЬТР::ТАБ 1::РЕГИОНЫ-->
                <ul class="Filter-Regions Row Merge">
                    @foreach($content['regions'] as $region)
                    <li class="Three"><a href="/tech/?region=$region['alias']" alt="{{$brand['name']}}">{{$region['name']}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </dd>

        <dt>Выбор категории</dt>
        <dd>
            <div>
                <ul class="Filter-Categories">
                    <!-- ФИЛЬТР::ТАБ 2::Категории-->
                    @foreach($content['categories'] as $category)
                    <li><a href="/catalog/?category={{$category['alias']}}&{{\Input::getQueryString()}}">{{$category['name']}}</a></li>

                    @if($category['subCategories'])
                    <ul>
                        @foreach($category['subCategories'] as $subCategory)
                        <li><a href="/catalog/?category={{$subCategory['alias']}}&{{\Input::getQueryString()}}">{{$subCategory['name']}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                    @endforeach
                </ul>
            </div>
        </dd>

        <dt class="Disabled">Дополнительные параметры</dt>
        <dd>
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
        <button class="Button">Применить фильтр</button>
    </div>
</div>

<!-- АРЕНДОДАТЕЛИ::СПИСОК -->
<div class="Node">
    <h4 class="Section-Header">Лучшие арендодатели</h4>
    <ul class="Seller-List Row Split">
        @foreach($content['sellers'] as $seller)
        <li class="Seller-Item Six">
            <header>
                <h5 class="Title">
                    <a href="/sellers/{{$seller['metadata']['alias']}}" alt=" {{$seller['name']}}">{{$seller['name']}}</a>
                    <span class="Seller-Location">
                        {{$seller['region']['name']}}
                    </span>
                </h5>


                <div class="Rating">
                    {{$seller['rating']}}
                </div>
            </header>
            <div class="Description">
                {{$seller['description']}}
            </div>
        </li>
        @endforeach
    </ul>
</div>

<!-- НОВОСТИ::СПИСОК -->
<section class="News Node">
    <h4 class="Section-Header">Новости</h4>
    <ul class="News-List Row Split">
        @foreach($content['news'] as $new)
        <li class="News-Item Six">
            <header>
                <h5 class="Title">
                    <a href="/news/{{$new['metadata']['alias']}}" alt=" {{$seller['name']}}">{{$new['name']}}</a>
                    <span class="News-Date">
                        {{$new['updated_at']}}
                    </span>
                </h5>


                <div class="Rating">
                    {{$new['rating']}}
                </div>
            </header>
            <article class="Description">
                <img src="{{$new['logo']}}" alt="{{$new['name']}}">
                <div>{{$new['text_preview']}}</div>
            </article>
        </li>
        @endforeach
    </ul>
</section>

<div title="Вернуться наверх" id="Scroll-Top"></div>
@endsection

@section('scripts')
    @parent
    <script src="/js/frontend/techonline/MainPage.js" type="text/javascript"></script>
    <script>
        $("#Slider-Range-1").slider({
             range: true,
             min: 100,
             max: 50000,
             values: [ 100, 50000 ],
            slide: function( event, ui ) {
                $("#Slider-Range-Value-1").text(ui.values[ 0 ] + "руб. - " + ui.values[ 1 ] +"руб.");
            }
        });
        $("#Slider-Range-Value-1").text( "$" + $( "#Slider-Range-1").slider( "values", 0 ) +
            " - руб." + $( "#Slider-Range-1" ).slider( "values", 1 ) );

    </script>
@endsection