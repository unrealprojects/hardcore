@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot Element" itemscope itemtype="http://data-vocabulary.org/Product">
        <header>
            <h4 class="Section-Header">
                <!--<img src="/photo/techonline/{{$content['element']['logo']}}">--><span itemprop="brand">{{$content['element']['brand']['name']}}</span>
                    {{$content['element']['model']}}
            <p itemprop="category">{{$content['element']['category']['name']}}</p>
            </h4>
        </header>
        <ul class="Lot-Gallery Grid-Node-1-3">
            @foreach(json_decode($content['element']['photos'],true) as $i=>$photo)
            @if($i<1)
            <li><img itemprop="image" src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
            @endif
            @endforeach
        </ul>

        <div class="Lot-About Grid-Node-2-3">
            <p itemprop="description">{{$content['element']['description']}}</p>

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
@include('frontend.standard.layouts.comments.List')


@endsection