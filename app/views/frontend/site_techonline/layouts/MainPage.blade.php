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

<div class="Node Category-List">


    <!-- КАТАЛОГ СТРОЙТЕХНИКИ::КАТЕГОРИИ C КАРТИНКАМИ-->
    <h3 class="Section-Header">Каталог стройтехники</h3>
    <ul class="Grid-Row List-Categories Icons">
        @foreach($content['categories'] as $category)
        <li class="Grid-Node-1-3"><img src="#"><a href="/tech/$category['alias']" alt="{{$category['name']}}">{{$category['name']}}</a>
        </li>
        @endforeach
    </ul>

</div>

<div class="Node Rent-List">

    <!-- АРЕНДА СТРОЙТЕХНИКИ::КАТЕГОРИИ -->
    <div class="Grid-Node-3-5">
        <h4 class="Header-Column">Аренда стройтехники</h4>
        <ul class="List-Categories">
            @foreach($content['categories'] as $category)
            <li class="Grid-Node-1-2"><a href="/tech/$category['alias']"
                                         alt="{{$category['name']}}">{{$category['name']}}</a></li>
            @endforeach
        </ul>
    </div>

    <!-- АРЕНДА СТРОЙТЕХНИКИ::БРЕНДЫ -->
    <div class="Grid-Node-2-5">
        <h4 class="Header-Column">Производители</h4>
        <ul class="List-Categories">
            @foreach($content['brands'] as $brand)
            <li class="Grid-Node-1-2"><a href="/tech/$brand['alias']" alt="{{$brand['name']}}">{{$brand['name']}}</a>
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
                <ul class="Filter-Regions">
                    @foreach($content['regions'] as $region)
                    <li class="Grid-Node-1-4"><a href="/tech/?region=$region['alias']" alt="{{$brand['name']}}">{{$region['name']}}</a>
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
    <hr/>
    <button class="Button">Применить фильтр</button>

</div>

<div class="Node">
    <!-- АРЕНДОДАТЕЛИ::СПИСОК -->
    <h4 class="Section-Header">Лучшие арендодатели</h4>
    <ul class="Seller-List Grid">
        @foreach($content['sellers'] as $seller)
        <li class="Seller-Item Grid-Node-1-2">
            <header>
                <h5 class="Seller-Title">
                    <a href="/sellers/{{$seller['metadata']['alias']}}" alt=" {{$seller['name']}}">{{$seller['name']}}</a>
                </h5>
                <small>
                    {{$seller['region']['name']}}
                </small>

                <div class="Seller-Rating">
                    {{$seller['rating']}}
                </div>
            </header>
            <div class="Seller-Description">
                {{$seller['description']}}
            </div>
        </li>
        @endforeach
    </ul>
</div>
<!-- НОВОСТИ::СПИСОК -->

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