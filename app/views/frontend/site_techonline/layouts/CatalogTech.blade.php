@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
 <h3>Каталог строительной техники</h3>
@foreach($content['list'] as $list_elem)
    <div class="Lot">
        <h4>{{$list_elem['model']}}</h4>

    {{$list_elem['description']}}
    {{$list_elem['logo']}}
    {{$list_elem['brand']['name']}}

        <ul class="Lot-Gallery Grid-Node-1-3">
        @foreach(json_decode($list_elem['photos'],true) as $photo)
            {{Route::getCurrentRoute()->getPath()}}
            <li><img src="/photo/techonline/{{$photo['src']}}" alt="{{$photo['name']}}"></li>

        @endforeach
        </ul>
        <!-- Параметры товара -->
        @foreach($list_elem['params_values'] as $param)
            {{$param['param_data']['name']}}
            {{$param['value']}}
            {{$param['param_data']['dimension']}}
        @endforeach
    </div>
@endforeach

<!-- Пагинация -->
{{$content['pagination']}}



<!-- Фильтрация :: По брендам -->
@foreach($content['brands'] as $brand)
    <a href="/catalog/?brand={{$brand['name']}}&{{\Input::getQueryString()}}">{{$brand['name']}}</a>
@endforeach

<!-- Фильтрация :: По категориям -->
@foreach($content['categories'] as $category)
    <a href="/catalog/?category={{$category['name']}}&{{\Input::getQueryString()}}">{{$category['name']}}</a>
@endforeach

<!-- Фильтрация :: По параметрам -->
@if($content['filters'])
    @foreach($content['filters']['filters'] as $filter)
        {{$filter['name']}}
        {{$filter['dimension']}}
        {{$filter['min_value']}}
        {{$filter['max_value']}}
    @endforeach
@endif
</section>

@endsection