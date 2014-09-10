@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot Element">
        <header>
            <h4 class="Section-Header">
                {{$content['element']['name']}}
            </h4>
        </header>
        <ul class="Lot-Gallery Grid-Node-2-5">
            @foreach(json_decode($content['element']['photos'],true) as $i=>$photo)
            @if($i<1)
            <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
            @endif
            @endforeach
        </ul>

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
                    <td><a href="/admin/{{$content['element']['admin']['alias']}}">{{$content['element']['admin']['name']}}</a></td>
                </tr>
                <tr>
                    <td>Бренд:</td>
                    <td>{{$content['element']['model']['brand']['name']}}</td>
                </tr>
                <tr>
                    <td>Модель:</td>
                    <td><a href="/catalog/{{$content['element']['model']['alias']}}">{{$content['element']['model']['model']}}</a></td>
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
                <tr>
                    <td>Цена:</td>
                    <td>{{$content['element']['rate']}}</td>
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
@include('frontend.site_techonline.layouts.CatalogComments')


@endsection