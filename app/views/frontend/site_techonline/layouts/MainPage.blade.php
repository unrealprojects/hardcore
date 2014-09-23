@extends('frontend.site_techonline.content')

@section('main')
<section id="Page-Slider" class="Visible-SM">
    <div class="Slider-Inner">
        <img id="Truck" src="/img/techonline/belaz.png" alt=""/>
        <div id="Slider-Links">
            <a class="Button _Rounded" href="#">Арендовать стройтехнику</a>
            <a class="Button _Rounded" href="#">Разместить стройтехнику</a>
        </div>
    </div>
</section>
<section class="Node">
    <table class="Solid Lines Stripped Edit">
        <thead>
        <tr>
            <td><input type="checkbox"/></td>
            <td>№</td>
            <td>Заголовок</td>
            <td>Содержание</td>
            <td>Опубликовано</td>
            <td>Действия</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="checkbox"/></td>
            <td class="Number">01</td>
            <td contenteditable="true">Заголовок статьи или страницы</td>
            <td contenteditable="true" class="Main">Строительство качественных автомагистралей, областных и городских дорог не может выполняться без использования грейдеров.</td>
            <td contenteditable="true">16 августа 2014</td>
            <td class="Action">
                <ul>
                    <li><a title="Принять изменения" href="#"><span class="fa fa-check"></span></a></li>
                    <li><a title="Удалить ..." href="#"><span class="fa fa-remove"></span></a></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td><input type="checkbox"/></td>
            <td class="Number">02</td>
            <td contenteditable="true">Заголовок статьи или страницы</td>
            <td contenteditable="true" class="Main">Строительство качественных автомагистралей, областных и городских дорог не может выполняться без использования грейдеров.</td>
            <td contenteditable="true">26 августа 2014</td>
            <td class="Action">
                <ul>
                    <li><a title="Принять изменения" href="#"><span class="fa fa-check"></span></a></li>
                    <li><a title="Удалить ..." href="#"><span class="fa fa-remove"></span></a></li>
                </ul>
            </td>
        </tr>
        <tr>
            <td><input type="checkbox"/></td>
            <td class="Number">03</td>
            <td contenteditable="true">Другой заголовок статьи или страницы</td>
            <td contenteditable="true" class="Main">Строительство качественных автомагистралей, областных и городских дорог не может выполняться без использования грейдеров.</td>
            <td contenteditable="true">30 августа 2014</td>
            <td class="Action">
                <ul>
                    <li><a title="Принять изменения" href="#"><span class="fa fa-check"></span></a></li>
                    <li><a title="Удалить ..." href="#"><span class="fa fa-remove"></span></a></li>
                </ul>
            </td>
        </tr>
        </tbody>
    </table>
</section>
<!-- ФИЛЬТР -->
@include('frontend.site_techonline.layouts.filter.MainPageFilter');
<!-- КАТАЛОГ СТРОЙТЕХНИКИ::КАТЕГОРИИ C КАРТИНКАМИ-->
<section class="Node">

    <h3 class="Heading Primary">Каталог стройтехники</h3>

    <ul class="Row Merge List-Categories Icons">
        @foreach($content['categories'] as $category)
            <li class="Grid-XS-6 Grid-SM-3"><img src="{{$category['logo']}}"><a href="/catalog/?category={{$category['alias']}}" alt="{{$category['name']}}">{{$category['name']}}</a></li>
        @endforeach
    </ul>

</section>


<!-- АРЕНДОДАТЕЛИ::СПИСОК -->
<section class="Node Renters">

    <h3 class="Heading Primary">Лучшие арендодатели</h3>

    <ul class="List Snippets Row Split">
        @foreach($content['sellers'] as $seller)
        <li class="Grid-XS-6 Grid-HG-4 List-Item">
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
        <li class="List-Item Grid-XS-6">
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