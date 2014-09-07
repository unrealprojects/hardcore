@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node Grid Split">
    <aside class="Sidebar-Filter Grid-Node-1-5">
        <!-- Фильтрация :: По брендам -->
        <h4>Производители</h4>
        <ul class="List-Filter">
            @foreach($content['brands'] as $brand)
            <li><a href="/catalog/?brand={{$brand['alias']}}&{{\Input::getQueryString()}}">{{$brand['name']}}</a></li>
            @endforeach
        </ul>
        <!-- Фильтрация :: По категориям -->
        <h4>Категории</h4>
        <ul class="List-Filter">
            @foreach($content['categories'] as $category)
            <li><a href="/catalog/?category={{$category['alias']}}&{{\Input::getQueryString()}}">{{$category['name']}}</a></li>
            @endforeach
        </ul>
    </aside>
    <article class="Grid-Node-4-5">
         <h3>Каталог строительной техники</h3>
        @foreach($content['list'] as $list_elem)
            <div class="Lot">
                <h4>{{$list_elem['model']}}</h4>

            {{$list_elem['description']}}
            {{$list_elem['logo']}}
            {{$list_elem['brand']['name']}}

                <ul class="Lot-Gallery Grid-Node-1-3">
                @foreach(json_decode($list_elem['photos'],true) as $photo)
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
    </article>
<!-- Пагинация -->
{{$content['pagination']}}



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