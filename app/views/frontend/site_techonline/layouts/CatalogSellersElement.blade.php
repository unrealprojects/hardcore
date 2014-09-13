@extends('frontend.site_techonline.'.$content['template'])

@section('main')
<section class="Node">
    <div class="Lot Item">
        <header>
            <h4 class="Section-Header">
               {{$content['element']['name']}}
            </h4>
        </header>

        <div class="Lot-Gallery Grid-Node-1-3">
            @foreach(json_decode($content['element']['photos'],true) as $i=>$photo)
            @if($i==1)
            <img itemprop="image" class="Lot-Main-Photo" src="{{$photo['src']}}" alt="{{$photo['name']}}">

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

        <div class="Lot-About Grid-Node-3-5">
            <p>{{$content['element']['description']}}</p>
            <table class="Stripped">
                <tr>
                    <td>Телефоны:</td>
                    <td>{{$content['element']['phone']}}</td>
                </tr>
                <tr>
                    <td>Регион:</td>
                    <td> {{$content['element']['region']['name']}}</td>
                </tr>
                <tr>
                    <td>Адрес:</td>
                    <td> {{$content['element']['adress']}}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><a href="mailto:{{$content['element']['email']}}">{{$content['element']['email']}}</a></td>
                </tr>
                <tr>
                    <td>Skype:</td>
                    <td><a href="callto:{{$content['element']['skype']}}">{{$content['element']['skype']}}</a></td>
                </tr>
                <tr>
                    <td>Site:</td>
                    <td><a href="{{$content['element']['website']}}">{{$content['element']['website']}}</a></td>
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
            @foreach($content['element']['tech_list'] as $tech)
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
            @foreach($content['element']['parts_list'] as $part)
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