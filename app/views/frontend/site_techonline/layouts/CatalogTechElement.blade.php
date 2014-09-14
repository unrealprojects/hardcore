@extends('frontend.site_techonline.'.$content['template'])

@section('main')

<section class="Node">
    <div class="Lot" itemscope itemtype="http://data-vocabulary.org/Product">
        <header>
            <h4 class="Section-Header">
                {{$content['item']['name']}}
                <p>{{$content['item']['model']['category']['name']}}</p>
            </h4>
            <h5 class="Lot-Price">
                {{$content['item']['rate']}}
            </h5>
        </header>

        <div class="Lot-Gallery Grid-Node-2-5">
            @foreach(json_decode($content['item']['photos'],true) as $i=>$photo)
            @if($i==1)
            <img class="Lot-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}" itemprop="image">

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
            <div class="Lot-Renter">
                Арендатор
                <a href="/admin/{{$content['item']['admin']['metadata']['alias']}}">{{$content['item']['admin']['name']}}</a>
            </div>
       </div>

        <div class="Lot-About Grid-Node-3-5">
            <ul class="Lot-Values">
                <li>Состояние: {{$content['item']['opacity']['name']}}</li>
                <li>Статус: {{$content['item']['status']['name']}}</li>
            </ul>
            <p itemprop="description">{{$content['item']['description']}}</p>

            <!-- Параметры товара -->
            <h6>Характеристики</h6>
            <table class="Stripped">
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
            </table>


            <!-- Параметры модели -->
            <h6>Характеристики модели</h6>
            <table class="Stripped">
                @foreach($content['item']['model']['params_values'] as $param)
                <tr>
                    <td>{{$param['param_data']['name']}}</td>
                    <td>{{$param['value']}}</td>
                    <td>{{$param['param_data']['dimension']}}</td>
                </tr>
                @endforeach
            </table>

    </div>

</section>
@include('frontend.standard.layouts.comments.List')


@endsection