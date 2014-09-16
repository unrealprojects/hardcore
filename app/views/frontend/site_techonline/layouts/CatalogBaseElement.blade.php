@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Snippet-Item Row Split" itemscope itemtype="http://data-vocabulary.org/Product">
        <header>
            <h4 class="Section-Header">
                <span itemprop="brand">{{$content['item']['brand']['name']}}</span>
                    {{$content['item']['model']}}
            </h4>
            <span class="Item-Category" itemprop="category">{{$content['item']['category']['name']}}</span>
        </header>

        <div class="Item-Gallery Five">
            @foreach(json_decode($content['item']['photos'],true) as $i=>$photo)
            @if($i==1)
            <img class="Item-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}" itemprop="image">

            <ul>
                @elseif($i>1 && $i<5)
                <li><img itemprop="image" src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
                @elseif($i>5)
                <li style="display: none">
                    <img itemprop="image" src="{{$photo['src']}}" alt="{{$photo['name']}}">
                </li>
                @endif
                @endforeach
            </ul>
        </div>

        <div class="Item-Content Seven">
            <p itemprop="description">{{$content['item']['description']}}</p>

        <!-- Параметры товара -->
        <h6>Характеристики</h6>
        <table>
            @foreach($content['item']['params_values'] as $param)
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