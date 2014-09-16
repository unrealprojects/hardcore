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

        <div class="Item-Gallery Five">
            @foreach(json_decode($content['item']['photos'],true) as $i=>$photo)
            @if($i==1)
            <img class="Item-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}" itemprop="image">

            <ul>
                @elseif($i>1 && $i<5)
                <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}" itemprop="image"></li>
                @elseif($i>5)
                <li style="display: none">
                    <img src="{{$photo['src']}}" alt="{{$photo['name']}}" itemprop="image">
                </li>
                @endif
                @endforeach
            </ul>
            <div class="Item-Additional-Info">
                Арендатор
                <a href="/admin/{{$content['item']['admin']['metadata']['alias']}}">{{$content['item']['admin']['name']}}</a>
            </div>
       </div>

        <div class="Item-Content Seven">
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