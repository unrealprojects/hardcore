@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot Element">
        <header>
            <h4 class="Section-Header">
                {{$content['element']['name']}}
            </h4>
            <h5>{{$content['element']['rate']}}</h5>
        </header>

        <div class="Lot-Gallery Grid-Node-1-3">
            @foreach(json_decode($content['element']['photos'],true) as $i=>$photo)
            @if($i==1)
            <img class="Lot-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}">

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

        <div class="Lot-About Grid-Node-3-5">
            <p>{{$content['element']['description']}}</p>

            <!-- Параметры товара -->
            <h6>Характеристики</h6>
            <table class="Stripped">
                <tr>
                    <td>Категория:</td>
                    <td>{{$content['element']['model']['category']['name']}}</td>
                </tr>
                <tr>
                    <td>Арендодатель:</td>
                    <td><a href="/admin/{{$content['element']['admin']['metadata']['alias']}}">{{$content['element']['admin']['name']}}</a></td>
                </tr>
                <tr>
                    <td>Бренд:</td>
                    <td>{{$content['element']['model']['brand']['name']}}</td>
                </tr>
                <tr>
                    <td>Модель:</td>
                    <td><a href="/catalog/{{$content['element']['model']['metadata']['alias']}}">{{$content['element']['model']['model']}}</a></td>
                </tr>
                <tr>
                    <td>Регион:</td>
                    <td>{{$content['element']['region']['name']}}</td>
                </tr>
                <tr>
                    <td>Cтатус:</td>
                    <td>{{$content['element']['status']['name']}}</td>
                </tr>
                <tr>
                    <td>Состояние:</td>
                    <td> {{$content['element']['opacity']['name']}}</td>
                </tr>

            </table>


            <!-- Параметры модели -->
            <h6>Характеристики модели</h6>
            <table class="Stripped">
                @foreach($content['element']['model']['params_values'] as $param)
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