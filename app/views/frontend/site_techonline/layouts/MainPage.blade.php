@extends('frontend.site_techonline.content')

@section('main')
<section class="Page-Slider">
    <div class="Slider-Inner">
        <img class="Truck" src="/img/techonline/belaz.png" alt=""/>
    </div>
</section>

<div class="Node">
    <ul>
    <!-- КАТАЛОГ СТРОЙТЕХНИКИ::КАТЕГОРИИ C КАРТИНКАМИ-->
    @foreach($content['categories'] as $category)
        <li><a href="/tech/$category['alias']" alt="{{$category['name']}}">{{$category['name']}}</a></li>
    @endforeach
    </ul>
    <ul>
     <!-- АРЕНДА СТРОЙТЕХНИКИ::КАТЕГОРИИ -->
     @foreach($content['categories'] as $category)
        <li><a href="/tech/$category['alias']" alt="{{$category['name']}}">{{$category['name']}}</a></li>
     @endforeach
     </ul>
     <ul>
     <!-- АРЕНДА СТРОЙТЕХНИКИ::БРЕНДЫ -->
     @foreach($content['brands'] as $brand)
         <li><a href="/tech/$brand['alias']" alt="{{$brand['name']}}">{{$brand['name']}}</a>></li>
     @endforeach
     </ul>
</div>
     <!-- ФИЛЬТР -->

         <!-- ФИЛЬТР::ТАБ 1::РЕГИОНЫ-->

         @foreach($content['regions'] as $region)
            <a href="/tech/?region=$region['alias']" alt="{{$brand['name']}}">{{$region['name']}}</a>
         @endforeach

        <!-- ФИЛЬТР::ТАБ 2::РЕГИОНЫ-->
        @foreach($content['categories'] as $category)
            <a href="/tech/$category['alias']" alt="{{$category['name']}}">{{$category['name']}}</a>
        @endforeach

        <!-- ФИЛЬТР::ТАБ 3::ПАРАМЕТРЫ (ЗАВЕРСТАТЬ СЛАЙДЕР JQUERY - ВЫВЕДУ ПОЗЖЕ) -->


    <!-- АРЕНДОДАТЕЛИ::СПИСОК -->
    @foreach($content['sellers'] as $seller)\
        {{$seller['name']}}
        <a href="/sellers/{{$seller['alias']}}" alt=" {{$seller['name']}}">{{$seller['alias']}}</a>
        {{$seller['alias']}}
        {{$seller['description']}}
        {{$seller['region']['name']}}
        {{$seller['rating']}}

    @endforeach

    <!-- НОВОСТИ::СПИСОК -->

@endsection