@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">

    <h3 class="Heading Primary">Каталог строительной техники</h3>

    @if(!empty($breadCrumbs))
    <div class="Breadcrumbs">
        <ul class="Breadcrumb-List">
            @foreach($breadCrumbs as $crumb)
            @if($crumb['link'])
            <li class="Breadcrumb-Item"itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="{{$crumb['link']}}" itemprop="url">
                    <span itemprop="title">{{$crumb['title']}}</span>
                </a>
            </li>
            @else
            <li class="Breadcrumb-Item">
                <span>{{$crumb['title']}}</span>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
    @endif

    <div class="Row Merge">
        <!-- Фильтрация :: Общий блок -->
        <aside class="Sidebar-Filter Grid XS3">
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

        <article class="Grid XS-8 End">
            <ul class="Snippet-List">
            @foreach($content['list'] as $list_elem)
                <li class="Snippet-Item Row Merge">

                    <header>
                        <h4 class="Item-Title">
                            <a href="/catalog/{{$list_elem['metadata']['alias']}}">
                                {{$list_elem['brand']['name']}}
                            {{$list_elem['model']}}</a>

                            <span class="Item-Category">{{$list_elem['category']['name']}}</span>
                        </h4>
                    </header>

                    <div class="Item-Gallery Grid XS-5">
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

                    <div class="Item-Content Grid XS-7">
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
    <script src="/js/frontend/Accordion.js" type="text/javascript"></script>
@endsection
