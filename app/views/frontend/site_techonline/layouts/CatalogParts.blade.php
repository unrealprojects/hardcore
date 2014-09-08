@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node Grid">

    <h3>Запчасти и сервис</h3>
    <div class="Grid-Row">
        <!-- Фильтрация :: Общий блок -->
        <aside class="Sidebar-Filter Grid-Node-1-5">
            <!-- Фильтрация :: По категориям -->
            <h4>Категории</h4>
            <ul class="List-Filter">
                @foreach($content['categories'] as $category)
                <li><a href="/parts/?category={{$category['alias']}}&{{\Input::getQueryString()}}">{{$category['name']}}</a></li>
                @endforeach
            </ul>
        </aside>
        <article class="Grid-Node-4-5">
            <ul class="Lot-List">
                @foreach($content['list'] as $list_elem)
                <li class="Lot">
                    <header>
                        <img src="/photo/techonline/{{$list_elem['logo']}}">
                        <div>
                            <h4><a href="/parts/{{$list_elem['alias']}}">
                                    {{$list_elem['name']}}</a></h4>

                        </div>
                    </header>
                    <ul class="Lot-Gallery Grid-Node-1-3">
                        @foreach(json_decode($list_elem['photos'],true) as $i=>$photo)
                        @if($i<4)
                        <li><img src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
                        @endif
                        @endforeach
                    </ul>

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
                                <td>Арендодатель:</td>
                                <td><a href="/admin/{{$list_elem['admin']['alias']}}">{{$list_elem['admin']['name']}}</a></td>
                            </tr>
                            <tr>
                                <td>Cтатус:</td>
                                <td>{{$list_elem['status']['name']}}</td>
                            </tr>
                            <tr>
                                <td>Состояние:</td>
                                <td> {{$list_elem['opacity']['name']}}</td>
                            </tr>
                            <tr>
                                <td>Цена:</td>
                                <td>{{$list_elem['price']}}</td>
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