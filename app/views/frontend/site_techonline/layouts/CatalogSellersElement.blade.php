@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Snippet-Item Row Split" itemscope itemtype="http://data-vocabulary.org/Product">
        <header>
            <h4 class="Section-Header">
                {{$content['item']['name']}}
            </h4>
        </header>

        <div class="Item-Gallery Five">
            @foreach(json_decode($content['item']['photos'],true) as $i=>$photo)
            @if($i==1)
            <img class="Item-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}" itemprop="image">

            <ul>
                @elseif($i>1 && $i<5)
                <li><img itemprop="image" src="{{$photo['src']}}" alt="{{$photo['name']}}"></li>
                @elseif($i>5)
                <li style="display: none">
                    <img itemprop="image" src="{{$photo['src']}}" alt="{{$photo['name']}}">
                </li>
                @endif
                @endforeach
            </ul>
        </div>

        <div class="Item-Content Seven">
            <p>{{$content['item']['description']}}</p>
            <h6>Контактная информация</h6>
            <table>
                <tr>
                    <td>Телефоны:</td>
                    <td>{{$content['item']['phone']}}</td>
                </tr>
                <tr>
                    <td>Регион:</td>
                    <td> {{$content['item']['region']['name']}}</td>
                </tr>
                <tr>
                    <td>Адрес:</td>
                    <td> {{$content['item']['adress']}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><a href="mailto:{{$content['item']['email']}}">{{$content['item']['email']}}</a></td>
                </tr>
                <tr>
                    <td>Skype:</td>
                    <td><a href="callto:{{$content['item']['skype']}}">{{$content['item']['skype']}}</a></td>
                </tr>
                <tr>
                    <td>Site:</td>
                    <td><a href="{{$content['item']['website']}}">{{$content['item']['website']}}</a></td>
                </tr>
            </table>
        </div>

        <!-- Список Техники -->

        <div class="CatalogTech">
            <header>
                <h4 class="Section-Header">
                    Аренда стройтехники
                </h4>
            </header>
            @foreach($content['item']['tech_list'] as $tech)
            <div class="Element">
                <h4> <a href="/rent/{{$tech['metadata']['alias']}}">{{$tech['name']}}</a></h4>
                <p>{{$tech['description']}}</p>
                <p>{{$tech['rate']}}</p>
            </div>
            @endforeach
        </div>

        <!-- Список Запчастей -->

        <div class="CatalogParts">
            <header>
                <h4 class="Section-Header">
                    Запчасти и сервис
                </h4>
            </header>
            @foreach($content['item']['parts_list'] as $part)
            <div class="Element">
                <h4> <a href="/parts/{{$part['metadata']['alias']}}">{{$part['name']}}</a></h4>
                <p>{{$part['description']}}</p>
                <p>{{$part['price']}}</p>
            </div>
            @endforeach
        </div>
</section>
@include('frontend.standard.layouts.comments.List')

@endsection