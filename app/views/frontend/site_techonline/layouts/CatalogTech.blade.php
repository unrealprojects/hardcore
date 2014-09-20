@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<!-- ФИЛЬТР -->
@include('frontend.site_techonline.layouts.filter.MainPageFilter');
<section class="Node">
    <h3 class="Heading Primary">Каталог строительной техники</h3>
    @include('frontend.site_techonline.parts.breadcrumbs')

        <article>
            <ul class="Snippet-List">
            @foreach($content['list'] as $item_key => $list_elem)
                <li class="Snippet-Item Row Merge">

                    <header class="Row Merge">
                        <h4 class="Item-Title Six">
                            <a href="/rent/{{$list_elem['metadata']['alias']}}">
                                {{$list_elem['name']}}
                            </a>
                            <span class="Item-Location">
                                {{$list_elem['model']['category']['name']}}
                            </span>
                        </h4>
                        <ul class="Item-Values Six">
                            <li><h6>Статус:</h6>{{$list_elem['status']['name']}}</li>
                            <li><h6>Состояние:</h6>{{$list_elem['opacity']['name']}}</li>
                            <li><h6>Цена:</h6>{{$list_elem['rate']}}</li>
                        </ul>
                    </header>
                    <div class="Item-Gallery Grid XS-5">
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

                    <div class="Item-Content XS-7">
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
<!-- Пагинация -->
{{$content['pagination']}}
</section>


@endsection

@section('scripts')
    @parent
    <script src="/js/frontend/Accordion.js" type="text/javascript"></script>
@endsection