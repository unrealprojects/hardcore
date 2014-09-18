@extends('frontend.site_techonline.'.$content['template'])

@section('main')

<section class="Node">

    <h3 class="Section-Header">Каталог строительной техники</h3>
    <div class="Row Merge">
        <!-- Фильтрация :: Общий блок -->
        <aside class="Sidebar-Filter Grid XS-3">
            <!-- Фильтрация :: По регионам -->
            <h4>Регионы</h4>
            <ul class="List-Filter">
                @foreach($content['regions'] as $region)
                <li><a href="/sellers/?region={{$region['alias']}}&{{\Input::getQueryString()}}">{{$region['name']}}</a></li>
                @endforeach
            </ul>
        </aside>
        <article class="Grid XS-8 Push-One">
            <ul class="Snippet-List">
                @foreach($content['list'] as $item_key => $list_elem)
                <li class="Snippet-Item Row Merge">
                    <header>
                            <h4 class="Item-Title">
                                <a href="/sellers/{{$list_elem['metadata']['alias']}}">
                                    {{$list_elem['name']}}
                                </a>
                            </h4>
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

                    <div class="Item-Content Grid XS-7">
                        {{$list_elem['description']}}
                        <h6>Контактные данные</h6>
                        <table>
                            <tr>
                                <td>Телефоны:</td>
                                <td>{{$list_elem['phone']}}</td>
                            </tr>
                            <tr>
                                <td>Адрес:</td>
                                <td> {{$list_elem['adress']}}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td> {{$list_elem['email']}}</td>
                            </tr>
                            <tr>
                                <td>Skype:</td>
                                <td> {{$list_elem['skype']}}</td>
                            </tr>
                            <tr>
                                <td>Site:</td>
                                <td> {{$list_elem['website']}}</td>
                            </tr>
                            <tr>
                                <td>Регион:</td>
                                <td> {{$list_elem['region']['name']}}</td>
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