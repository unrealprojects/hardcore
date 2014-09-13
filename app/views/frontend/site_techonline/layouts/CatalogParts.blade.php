@extends('frontend.site_techonline.'.$content['template'])

@section('main')

<section class="Node Grid">

    <h3 class="Section-Header">Запчасти и сервис</h3>
    <div class="Grid-Row">
        <!-- Фильтрация :: Общий блок -->
        <aside class="Sidebar-Filter Grid-Node-1-5">
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
        </aside>
        <article class="Grid-Node-4-5">
            <ul class="Lot-List">
                @foreach($content['list'] as $list_elem)
                <li class="Lot">
                    <header>
                        <div>
                            <h4>
                                <a href="/parts/{{$list_elem['metadata']['alias']}}">
                                    {{$list_elem['name']}}
                                </a>
                            </h4>
                        </div>
                    </header>

                    <div class="Lot-Gallery Grid-Node-1-3">
                        @foreach(json_decode($list_elem['photos'],true) as $i=>$photo)
                        @if($i==1)
                        <img class="Lot-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}">

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

                    <div class="Lot-About Grid-Node-2-3">
                        <p>{{$list_elem['description']}}</p>

                        <!-- Параметры товара -->
                        <h6>Характеристики</h6>
                        <table class="Stripped">
                            <tr>
                                <td>Категория:</td>
                                <td>{{$list_elem['category']['name']}}</td>
                            </tr>
                            <tr>
                                <td>Продавец:</td>
                                <td><a href="/sellers/{{$list_elem['admin']['metadata']['alias']}}">{{$list_elem['admin']['name']}}</a></td>
                            </tr>
                            <tr>
                                <td>Состояние:</td>
                                <td> {{$list_elem['opacity']['name']}}</td>
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