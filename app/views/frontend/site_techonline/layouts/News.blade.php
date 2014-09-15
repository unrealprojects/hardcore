@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node Grid">

    <h3 class="Section-Header">Новости</h3>
    <div class="Grid-Row">
        <!-- Фильтрация :: Общий блок -->
        <aside class="Sidebar-Filter Grid-Node-2-7">
            <!-- Фильтрация :: По тегам -->
            <h4>Теги</h4>
            <ul class="List-Filter">
                @foreach($content['tags'] as $tag)
                <li><a href="/news/?tag={{$tag['alias']}}&{{\Input::getQueryString()}}">{{$tag['name']}}</a></li>
                @endforeach
            </ul>
        </aside>

        <article class="Grid-Node-5-7">
            <ul class="Lot-List">
            @foreach($content['list'] as $list_elem)
                <li class="Lot">

                    <header>
                        <h4>
                            <a href="/news/{{$list_elem['metadata']['alias']}}">{{$list_elem['name']}}</a>

                            <span>{{$list_elem['created_at']}}</span>
                        </h4>
                            @foreach($list_elem['tags'] as $tag)
                                <a href="/news/?tag={{$tag['alias']}}&{{\Input::getQueryString()}}">{{$tag['name']}} </a>
                            @endforeach
                    </header>

                    <div class="Lot-Gallery Grid-Node-3-7">
                        <img src="{{$list_elem['logo']}}" alt="{{$list_elem['name']}}" style="width: 100%;">
                    </div>

                    <div class="Lot-About Grid-Node-4-7">
                        <p>{{$list_elem['text_preview']}}</p>
                        {{$list_elem['rating']}}
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
