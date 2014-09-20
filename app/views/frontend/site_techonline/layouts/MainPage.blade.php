@extends('frontend.site_techonline.content')

@section('main')
<section id="Page-Slider">
    <div class="Slider-Inner">
        <img id="Truck" src="/img/techonline/belaz.png" alt=""/>
        <div id="Slider-Links">
            <a class="Button _Rounded" href="#">Арендовать стройтехнику</a>
            <a class="Button _Rounded" href="#">Разместить стройтехнику</a>
        </div>
    </div>
</section>

<!-- ФИЛЬТР -->
@include('frontend.site_techonline.layouts.filter.MainPageFilter');
<!-- КАТАЛОГ СТРОЙТЕХНИКИ::КАТЕГОРИИ C КАРТИНКАМИ-->
<section class="Node Row">

    <h3 class="Heading Primary">Каталог стройтехники</h3>

    <ul class="Row Merge List-Categories Icons">
        @foreach($content['categories'] as $category)
            <li class="XS-6 SM-3"><img src="{{$category['logo']}}"><a href="/catalog/?category={{$category['alias']}}" alt="{{$category['name']}}">{{$category['name']}}</a></li>
        @endforeach
    </ul>

</section>


<section class="Node-Wrap">
<!-- АРЕНДА СТРОЙТЕХНИКИ::КАТЕГОРИИ -->
    <div class="Node Row Merge">

        <div class="XS-7">

            <h3 class="Heading Underlined">Аренда стройтехники</h3>

            <ul class="List-Categories Row Merge">
                @foreach($content['categories'] as $category)
                <li class="XS-6"><a href="/rent/?category={{$category['alias']}}" alt="{{$category['name']}}">{{$category['name']}}</a></li>
                @endforeach
            </ul>

        </div>

        <!-- АРЕНДА СТРОЙТЕХНИКИ::БРЕНДЫ -->
        <div class="XS-5">

            <h3 class="Heading Underlined">Производители</h3>

            <ul class="List-Categories Row Merge">
                @foreach($content['filter']['brands'] as $brand)
                <li class="XS-6">
                    <a href="/rent/?brand=$brand['alias']" alt="{{$brand['name']}}">
                        {{$brand['name']}}
                    </a>
                </li>
                @endforeach
            </ul>

        </div>

    </div>
</section>

<!-- АРЕНДОДАТЕЛИ::СПИСОК -->
<section class="Node Renters">

    <h3 class="Heading Primary">Лучшие арендодатели</h3>

    <ul class="List Snippets Row Split">
        @foreach($content['sellers'] as $seller)
        <li class="XS-6 HG-4 List-Item">
            <header>
                <h5 class="Item-Title">
                    <a href="/sellers/{{$seller['metadata']['alias']}}" alt=" {{$seller['name']}}">{{$seller['name']}}</a>
                    <span class="Item-Subtitle">
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
        <li class="List-Item XS-6">
            <header>
                <h5 class="Item-Title">
                    <a href="/news/{{$new['metadata']['alias']}}" alt=" {{$seller['name']}}">{{$new['name']}}</a>
                    <span class="Item-Subtitle">
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
@endsection