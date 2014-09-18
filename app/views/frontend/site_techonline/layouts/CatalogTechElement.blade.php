@extends('frontend.site_techonline.'.$content['template'])

@section('main')

<section class="Node">
    <div class="Snippet-Item Row Split" itemscope itemtype="http://data-vocabulary.org/Product">
        <header>
            <h4 class="Section-Header">
                {{$content['item']['name']}}
                <p>{{$content['item']['model']['category']['name']}}</p>
            </h4>
            <h5 class="Item-Price">
                {{$content['item']['rate']}}
            </h5>
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
        <div class="Item-Additional-Info">
            Арендатор
            <a href="/admin/{{$content['item']['admin']['metadata']['alias']}}">{{$content['item']['admin']['name']}}</a>
        </div>
        <div class="Item-Content Grid XS-7">
            <p itemprop="description">{{$content['item']['description']}}</p>

            <!-- Параметры товара -->
            <h6>Характеристики</h6>
            <table>
                <tr>
                    <td>Бренд:</td>
                    <td>{{$content['item']['model']['brand']['name']}}</td>
                </tr>
                <tr>
                    <td>Модель:</td>
                    <td><a itemprop="category" href="/catalog/{{$content['item']['model']['metadata']['alias']}}">{{$content['item']['model']['model']}}</a></td>
                </tr>
                <tr>
                    <td>Регион:</td>
                    <td>{{$content['item']['region']['name']}}</td>
                </tr>
                @foreach($content['item']['model']['params_values'] as $param)
                <tr>
                    <td>{{$param['param_data']['name']}}</td>
                    <td>{{$param['value']}} {{$param['param_data']['dimension']}}</td>
                </tr>
                @endforeach
            </table>

    </div>

</section>
@include('frontend.standard.layouts.comments.List')


@endsection