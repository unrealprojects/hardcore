@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot" itemscope itemtype="http://data-vocabulary.org/Product">
        <header>
            <h4 class="Section-Header">
                {{$content['item']['name']}}
            </h4>
        </header>

        <div class="Lot-Gallery Grid-Node-1-3">
            @foreach(json_decode($content['item']['photos'],true) as $i=>$photo)
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
            <p>{{$content['item']['description']}}</p>

            <!-- Параметры товара -->
            <h6>Характеристики</h6>
            <table class="Stripped">
                <tr>
                    <td>Категория:</td>
                    <td>{{$content['item']['category']['name']}}</td>
                </tr>
                <tr>
                    <td>Арендодатель:</td>
                    <td><a href="/  sellers/{{$content['item']['admin']['metadata']['alias']}}">{{$content['item']['admin']['name']}}</a></td>
                </tr>
                <tr>
                    <td>Cтатус:</td>
                    <td>{{$content['item']['status']['name']}}</td>
                </tr>
                <tr>
                    <td>Состояние:</td>
                    <td> {{$content['item']['opacity']['name']}}</td>
                </tr>
                <tr>
                    <td>Цена:</td>
                    <td>{{$content['item']['price']}}</td>
                </tr>
            </table>
        </div>

</section>
@include('frontend.standard.layouts.comments.List')

@endsection