@extends('frontend.site_techonline.'.$content['template'])

@section('main')

<section class="Node">

    <h3 class="Section-Header">Запчасти и сервис</h3>
    <div class="Row Merge">
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
                            <li><h6>Состояние:</h6>{{$list_elem['opacity']['name']}}</li>
                            <li><h6>Цена:</h6>{{$list_elem['price']}}</li>
                        </ul>
                    </header>

                    <div class="Item-Gallery Grid Five">
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

                    <div class="Item-Content Grid Seven">
                        {{$list_elem['description']}}

                        <!-- Параметры товара -->
                        <h6>Информация</h6>
                        <table>
                            <tr>
                                <td>Продавец:</td>
                                <td><a href="/sellers/{{$list_elem['admin']['metadata']['alias']}}">{{$list_elem['admin']['name']}}</a></td>
                            </tr>
                        </table>
                    </div>
                    <a class="Edit" href="/cabinet/{{\Route::current()->parameter('alias')}}/parts/{{$list_elem['admin']['metadata']['alias']}}">Редактировать</a>
                </li>
                @endforeach
            </ul>
    </div>
    <!-- Пагинация -->
    {{$content['pagination']}}


</section>


@endsection