@extends('frontend.site_techonline.'.$content['template'])

@section('main')

<section class="Node Grid">

    <h3 class="Section-Header">Каталог строительной техники</h3>
    <div class="Grid-Row">
        <!-- Фильтрация :: Общий блок -->
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
            <ul class="Lot-List">
            @foreach($content['list'] as $list_elem)
                <li class="Lot">

                    <header>
                        <h4>
                            <a href="/catalog/{{$list_elem['alias']}}">{{$list_elem['brand']['name']}}
                            {{$list_elem['model']}}</a>
                        </h4>
                        <p>{{$list_elem['category']['name']}}</p>
                    </header>

                    <ul class="Lot-Gallery Grid-Node-1-3">
                        @foreach(json_decode($list_elem['photos'],true) as $i=>$photo)
                            @if($i==1)
                                 <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
                            @elseif($i>1 && $i<5)
                                <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
                        @elseif($i>5)
                                <li style="display: none"><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
                            @endif
                        @endforeach
                    </ul>

                    <div class="Lot-About Grid-Node-2-3">
                        <p>{{$list_elem['description']}}</p>

                        <!-- Параметры товара -->
                        <h6>Характеристики</h6>
                        <table class="Stripped">
                            @foreach($list_elem['params_values'] as $param)
                            <tr>
                                <td>{{$param['param_data']['name']}}</td>
                                <td>{{$param['value']}}</td>
                                <td>{{$param['param_data']['dimension']}}   </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </li>
            @endforeach
            </ul>
        </article>
    </div>
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
