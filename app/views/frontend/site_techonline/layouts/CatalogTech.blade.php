@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node Grid">

    <h3 class="Section-Header">Каталог строительной техники</h3>
    <div class="Grid-Row">
        <!-- Фильтрация :: Общий блок -->
        <aside class="Sidebar-Filter Grid-Node-2-7">
            <!-- Фильтрация :: По брендам -->
            <h4>Производители</h4>
            <ul class="List-Filter">
                @foreach($content['brands'] as $brand)
                <li><a href="/rent/?brand={{$brand['alias']}}&{{\Input::getQueryString()}}">{{$brand['name']}}</a></li>
                @endforeach
            </ul>
            <!-- Фильтрация :: По категориям -->
            <h4>Категории</h4>
            <ul class="List-Filter Accordion">
                @foreach($content['categories'] as $category)
                <li class="List-Filter-Subheader">
                    @if($category['subCategories'])
                    <img class='Accordion-Switch' src="/img/techonline/icon-dropdown.png" alt=""/>
                    @endif
                    <a href="/catalog/?category={{$category['alias']}}&{{\Input::getQueryString()}}">{{$category['name']}}</a>
                </li>

                @if($category['subCategories'])
                <li class="List-Filter-Subcategory">
                    <ul>
                        @foreach($category['subCategories'] as $subCategory)
                        <li><a href="/catalog/?category={{$subCategory['alias']}}&{{\Input::getQueryString()}}">{{$subCategory['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
            </ul>
            <h4>Регионы</h4>
            <ul class="List-Filter">
                @foreach($content['regions'] as $region)
                <li><a href="/rent/?region={{$region['alias']}}&{{\Input::getQueryString()}}">{{$region['name']}}</a></li>
                @endforeach
            </ul>
        </aside>

        <article class="Grid-Node-5-7">
            <ul class="Snippet-List">
            @foreach($content['list'] as $list_elem)
                <li class="Snippet-Item">

                    <header>
                        <h4 class="Item-Title">
                            <a href="/rent/{{$list_elem['metadata']['alias']}}">
                                {{$list_elem['name']}}
                            </a>
                            <span class="Item-Location">
                                {{$list_elem['model']['category']['name']}}
                            </span>
                        </h4>
                        <ul class="Item-Values">
                            <li><h6>Статус:</h6>{{$list_elem['status']['name']}}</li>
                            <li><h6>Состояние:</h6>{{$list_elem['opacity']['name']}}</li>
                            <li><h6>Цена:</h6>{{$list_elem['rate']}}</li>
                        </ul>
                    </header>
                    <div class="Item-Gallery">
                        @foreach(json_decode($list_elem['photos'],true) as $i=>$photo)
                        @if($i==1)
                        <img class="Item-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}">

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

                    <div class="Item-Content">
                        {{$list_elem['description']}}

                        <!-- Параметры товара -->
                        <h6>Характеристики</h6>
                        <table>
                            <tr>
                                <td>Арендодатель:</td>
                                <td><a href="/sellers/{{$list_elem['admin']['metadata']['alias']}}">{{$list_elem['admin']['name']}}</a></td>
                            </tr>
                            <tr>
                                <td>Бренд:</td>
                                <td>{{$list_elem['model']['brand']['name']}}</td>
                            </tr>
                            <tr>
                                <td>Модель:</td>
                                <td>{{$list_elem['model']['model']}}</td>
                            </tr>
                            <tr>
                                <td>Регион:</td>
                                <td>{{$list_elem['region']['name']}}</td>
                            </tr>
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

@section('scripts')
<script src="/js/frontend/Accordion.js" type="text/javascript"></script>
@endsection