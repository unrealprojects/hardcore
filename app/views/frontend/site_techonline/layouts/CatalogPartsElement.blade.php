@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Snippet-Item Row Split" itemscope itemtype="http://data-vocabulary.org/Product">
        <header class="Section-Header">
            <h4>
                {{$content['item']['name']}}
            </h4>
        </header>

        <div class="Item-Gallery Grid XS-5">
            @foreach(json_decode($content['item']['photos'],true) as $i=>$photo)
            @if($i==1)
            <a href="{{$photo['src']}}" rel="Gallery" class="fancybox"><img class="Item-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}"></a>

            <ul>
                @elseif($i>1 && $i<5)
                <li>
                    <a href="{{$photo['src']}}" rel="Gallery" class="fancybox"><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></a>
                </li>
                @elseif($i>5)
                <li style="display: none">
                    <a href="{{$photo['src']}}" rel="Gallery" class="fancybox"><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></a>
                </li>
                @endif
                @endforeach
            </ul>
        </div>

        <div class="Item-Content XS-7">
            <p>{{$content['item']['description']}}</p>

            <!-- Параметры товара -->
            <h6>Характеристики</h6>
            <table>
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