@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node Grid">

    <h3 class="Section-Header">Каталог строительной техники</h3>
    <div class="Grid-Row">
        <!-- Фильтрация :: Общий блок -->
        <aside class="Sidebar-Filter Grid-Node-1-5">
            <!-- Фильтрация :: По регионам -->
            <h4>Регионы</h4>
            <ul class="List-Filter">
                @foreach($content['regions'] as $region)
                <li><a href="/sellers/?region={{$region['alias']}}&{{\Input::getQueryString()}}">{{$region['name']}}</a></li>
                @endforeach
            </ul>
        </aside>
        <article class="Grid-Node-4-5">
            <ul class="Lot-List">
            @foreach($content['list'] as $list_elem)
                <li class="Lot">

                    <header>
                    <div>
                        <h4><a href="/sellers/{{$list_elem['alias']}}">{{$list_elem['name']}}</a></h4>
                    </div>
                    </header>
                    <ul class="Lot-Gallery Grid-Node-1-3">
                        @foreach(json_decode($list_elem['photos'],true) as $i=>$photo)
                        @if($i<1)
                            <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
                        @endif
                    @endforeach
                    </ul>

                    <div class="Lot-About Grid-Node-2-3">
                        <p>{{$list_elem['description']}}</p>
                        <table class="Stripped">
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