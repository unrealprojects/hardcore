@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">

    <h3 class="Section-Header">Каталог строительной техники Base.blade.php</h3>
    <div class="Row Split">
        <!-- Фильтрация :: Общий блок -->
        <aside class="Sidebar-Filter Grid Three">
            <!-- Фильтрация :: По брендам -->
            <h4>Производители</h4>
            <ul class="List-Filter">
                @foreach($content['brands'] as $brand)
                <li><a href="/catalog/?brand={{$brand['alias']}}&{{\Input::getQueryString()}}">{{$brand['name']}}</a></li>
                @endforeach
            </ul>
            <!-- Фильтрация :: По категориям -->
            <!-- Фильтрация :: По категориям -->
            <h4>Категории</h4>
            <ul class="List-Filter Accordion">
                @foreach($content['categories'] as $category)
                <li class="List-Filter-Subheader Accordion-Subheader">
                    @if($category['subCategories'])
                    <img class='Accordion-Switch' src="/img/techonline/icon-dropdown.png" alt=""/>
                    @endif
                    <a href="/catalog/?category={{$category['alias']}}&{{\Input::getQueryString()}}">{{$category['name']}}</a>
                </li>

                @if($category['subCategories'])
                <li class="List-Filter-Subcategory Accordion-Subcategory">
                    <ul>
                        @foreach($category['subCategories'] as $subCategory)
                        <li><a href="/catalog/?category={{$subCategory['alias']}}&{{\Input::getQueryString()}}">{{$subCategory['name']}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
            </ul>
        </aside>

        <article class="Grid Eight End">
            <ul class="Snippet-List">
            @foreach($content['list'] as $item_key =>$list_elem)
                <li class="Snippet-Item Row Split">

                    <header>
                        <h4 class="Item-Title">
                            <a href="/catalog/{{$list_elem['metadata']['alias']}}">
                                {{$list_elem['brand']['name']}}
                            {{$list_elem['model']}}</a>

                            <span class="Item-Category">{{$list_elem['category']['name']}}</span>
                        </h4>
                    </header>

                    <div class="Item-Gallery Grid Five">
                        @foreach(json_decode($list_elem['photos'],true) as $i=>$photo)
                            @if($i==1)
                        <a href="{{$photo['src']}}" rel="Gallery-{{$item_key}}" class="fancybox"><img class="Item-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}"></a>

                        <ul>
                            @elseif($i>1 && $i<5)
                                <li>
                                    <a href="{{$photo['src']}}" rel="Gallery-{{$item_key}}" class="fancybox"><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></a>
                                </li>
                            @elseif($i>5)
                                <li style="display: none">
                                    <a href="{{$photo['src']}}" rel="Gallery-{{$item_key}}" class="fancybox"><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></a>
                                </li>
                            @endif
                        @endforeach
                        </ul>
                    </div>

                    <div class="Item-Content Grid Seven">
                        {{$list_elem['description']}}

                        <!-- Параметры товара -->
                        @if($list_elem['params_values'])
                        <h6>Характеристики</h6>
                        <table>
                            @foreach($list_elem['params_values'] as $param)
                            <tr>
                                <td>{{$param['param_data']['name']}}</td>
                                <td>{{$param['value']}} {{$param['param_data']['dimension']}}</td>
                            </tr>
                            @endforeach
                        </table>
                        @endif
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
    @parent
    <script src="/js/frontend/Accordion.js" type="text/javascript"></script>
@endsection
