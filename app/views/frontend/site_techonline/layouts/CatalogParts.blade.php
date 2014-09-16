@extends('frontend.site_techonline.'.$content['template'])

@section('main')

<section class="Node Grid">

    <h3 class="Section-Header">Запчасти и сервис Parts.Blade.Php</h3>
    <div class="Row Split">
        <!-- Фильтрация :: Общий блок -->
        <aside class="Sidebar-Filter Four">
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
        <article class="Eight">
            <ul class="Snippet-List">
                @foreach($content['list'] as $list_elem)
                <li class="Snippet-Item Row Split">
                    <header>
                        <h4 class="Item-Title">
                            <a href="/parts/{{$list_elem['metadata']['alias']}}">
                                {{$list_elem['name']}}
                            </a>
                            <p class="Item-Location">
                                {{$list_elem['category']['name']}}
                            </p>
                        </h4>
                        <ul class="Item-Values">
                            <li><h6>Статус:</h6>{{$list_elem['status']['name']}}</li>
                            <li><h6>Состояние:</h6>{{$list_elem['opacity']['name']}}</li>
                        </ul>
                    </header>

                    <div class="Item-Gallery Five">
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

                    <div class="Item-Content Seven">
                        {{$list_elem['description']}}

                        <!-- Параметры товара -->
                        <h6>Характеристики</h6>
                        <table>
                            <tr>
                                <td>Продавец:</td>
                                <td><a href="/sellers/{{$list_elem['admin']['metadata']['alias']}}">{{$list_elem['admin']['name']}}</a></td>
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


</section>


@endsection

@section('scripts')
<script src="/js/frontend/Accordion.js" type="text/javascript"></script>
@endsection