@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot" itemscope itemtype="http://data-vocabulary.org/Product">
        <header>
            <h4 class="Section-Header">
                {{$content['element']['name']}}
            </h4>
        </header>

        <div class="Lot-Gallery Grid-Node-1-3">
            @foreach(json_decode($content['element']['photos'],true) as $i=>$photo)
            @if($i==1)
            <img class="Lot-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}" itemprop="image">

            <ul>
                @elseif($i>1 && $i<5)
                <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
                @elseif($i>5)
                <li style="display: none">
                    <img src="{{$photo['src']}}" alt="{{$photo['name']}}">
                </li>
                @endif
                @endforeach
            </ul>
        </div>

        <div class="Lot-About Grid-Node-2-3">
            <p>{{$content['element']['description']}}</p>

            <!-- Параметры товара -->
            <h6>Характеристики</h6>
            <table class="Stripped">
                <tr>
                    <td>Категория:</td>
                    <td>{{$content['element']['category']['name']}}</td>
                </tr>
                <tr>
                    <td>Арендодатель:</td>
                    <td><a href="/  sellers/{{$content['element']['admin']['metadata']['alias']}}">{{$content['element']['admin']['name']}}</a></td>
                </tr>
                <tr>
                    <td>Cтатус:</td>
                    <td>{{$content['element']['status']['name']}}</td>
                </tr>
                <tr>
                    <td>Состояние:</td>
                    <td> {{$content['element']['opacity']['name']}}</td>
                </tr>
                <tr>
                    <td>Цена:</td>
                    <td>{{$content['element']['price']}}</td>
                </tr>
            </table>
        </div>

</section>
@include('frontend.standard.layouts.comments.List')

@endsection