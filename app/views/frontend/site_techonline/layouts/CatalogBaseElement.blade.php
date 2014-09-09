@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot">
        <header>
            <h4 class="Section-Header">
                <!--<img src="/photo/techonline/{{$content['element']['logo']}}">-->{{$content['element']['brand']['name']}}
                    {{$content['element']['model']}}
            <p>{{$content['element']['category']['name']}}</p>
            </h4>
        </header>
        <ul class="Lot-Gallery Grid-Node-1-3">
            @foreach(json_decode($content['element']['photos'],true) as $photo)
            <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
            @endforeach
        </ul>

        <div class="Lot-About Grid-Node-2-3">
            <p>{{$content['element']['description']}}</p>

        <!-- Параметры товара -->
        <h6>Характеристики</h6>
        <table class="Stripped">
            @foreach($content['element']['params_values'] as $param)
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